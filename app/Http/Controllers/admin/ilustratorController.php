<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ilustrator;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class ilustratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       $ilustrators = Ilustrator::with(['user'])
    ->join('users', 'ilustrators.user_id', '=', 'users.id')
    ->orderBy('ilustrators.user_id', 'asc')
    ->orderBy('users.name', 'asc')
    ->select('ilustrators.*') 
    ->get();
        return view('admin.ilustrator.index', compact('ilustrators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $roles = Role::all();
        return view('admin.ilustrator.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
{
    $validatedData = $request->validate(
        [
            'name' => 'string|max:255|required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:255|unique:users,phone',
            'role_id' => 'required|exists:roles,id',
            'profile_image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required',
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah dipakai',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Ketidakcocokan dengan password',
            'phone.required' => 'Nomor telepon wajib diisi',
            'phone.unique' => 'Nomor telepon sudah dipakai',
            'profile_image.image' => 'Harus berupa gambar',
           
            'profile_image.mimes' => 'Gambar hanya boleh berupa file jpeg, png, dan webp',
            'profile_image.max' => 'Ukuran gambar maksimal 2MB',
        ]
    );
    if ($request->hasFile('profile_image')) {
    $path = $request->file('profile_image')->store('profile', 'public');
    $validatedData['profile_image'] = $path;
}

    
    DB::transaction(function () use ($validatedData) {


        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);

      
        if ($user->role_id == 3) { 
            Ilustrator::create([
                'user_id' => $user->id
            
            ]);
        }
    });

    return redirect()->route('ilustrator.index')->with('success', 'User telah dibuat');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
           $user = User::findOrFail($id);
           $roles = Role::all();
           $ilustrator = Ilustrator::with(['user'])->get();

           return view('admin.ilustrator.edit', compact('user', 'roles', 'ilustrator'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    $validatedData = $request->validate(
        [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:255|unique:users,phone,' . $id,
          
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
           
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required',
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah dipakai',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Ketidakcocokan dengan konfirmasi password',
            'phone.required' => 'Nomor telepon wajib diisi',
            'phone.unique' => 'Nomor telepon sudah dipakai',
            'profile_image.image' => 'Harus berupa gambar',
            'profile_image.mimes' => 'Gambar hanya boleh berupa file jpeg, png, dan webp',
            'profile_image.max' => 'Ukuran gambar maksimal 2MB',
        ]
    );

    
    if ($request->hasFile('profile_image')) {
        
        if ($user->profile_image && \Storage::disk('public')->exists($user->profile_image)) {
            \Storage::disk('public')->delete($user->profile_image);
        }

        $path = $request->file('profile_image')->store('profile', 'public');
        $validatedData['profile_image'] = $path;
    }

    DB::transaction(function () use ($validatedData, $user, $request) {
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->role_id = $validatedData['role_id'];
        $user->status = $validatedData['status']; 

        
        if ($request->hasFile('profile_image')) {
            $user->profile_image = $validatedData['profile_image'];
        }

        
        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();
    });

    return redirect()->route('ilustrator.index')->with('success', 'User telah diubah');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $ilustrator = Ilustrator::findOrFail($id);

    \DB::transaction(function () use ($ilustrator) {
       
        $user = $ilustrator->user;

      
        $ilustrator->delete();

        
        if ($user) {
            $user->delete();
        }
    });

    return redirect()->route('ilustrator.index')->with('success', 'Data Ilustrator dan User berhasil dihapus');
}
    }

