<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ilustrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class portofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

      $ilustrators = Ilustrator::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();

    

        return view('ilustrator.portofolio', compact('ilustrators'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ilustrator.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $user = Auth::user();
        $validatedData = $request->validate([
            'portofolio_name' => 'required|max:255|string',
            'portofolio_description' => 'string|nullable',
           'image_portofolio'       => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            
         
        ]);

        $validatedData['user_id'] = $user->id;
        if ($request->hasFile('image_portofolio')) {
        $path = $request->file('image_portofolio')->store('portofolio', 'public');
        $validatedData['image_portofolio'] = $path;
    }
        Ilustrator::create($validatedData);


        return redirect()->route('portofolio.index')->with('success', 'Portofolio Berhasil Ditambahkan');


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
        $ilustrator  = Ilustrator::findOrFail($id);

        if($ilustrator->user_id !== Auth::id()){
           abort(403, 'Kamu dilarang mengedit karya orang lain!');
        }
        return view('ilustrator.edit', compact('ilustrator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $user = Auth::user();
    $ilustrator = Ilustrator::findOrFail($id);


    $validatedData = $request->validate([
        'portofolio_name'        => 'required|max:255|string',
        'portofolio_description' => 'string|nullable',
        'image_portofolio'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    if ($request->hasFile('image_portofolio')) {
        
       
        if ($ilustrator->image_portofolio) {
            Storage::disk('public')->delete($ilustrator->image_portofolio);
        }

       
        $path = $request->file('image_portofolio')->store('portofolio', 'public');
        $validatedData['image_portofolio'] = $path;
    }

    $ilustrator->update($validatedData);

    return redirect()->route('portofolio.index')->with('success', 'Portofolio Berhasil Diubah');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ilustrator = Ilustrator::findOrFail($id);

        if($ilustrator->user_id !== Auth::id()){
             abort(403, 'Kamu dilarang menghapus karya ini');
        }

        $ilustrator->delete();

        return redirect()->route('portofolio.index')->with('success', 'Data Berhasil Dihapus');
    }
}
