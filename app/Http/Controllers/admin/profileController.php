<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $profile = Auth::user();

        
        if(!$profile){
            abort(404);
        }
        

        return view('admin.profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //edit profile 
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|max:255|string',
            
            'phone' => 'string|nullable',
            'description' => 'string|nullable',
            'profile_image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'string|nullable',
        ]);
        
         if ($request->hasFile('profile_image')) {
        
        if ($user->profile_image && \Storage::disk('public')->exists($user->profile_image)) {
            \Storage::disk('public')->delete($user->profile_image);
        }

        $path = $request->file('profile_image')->store('profile', 'public');
        $validatedData['profile_image'] = $path;
    }

        $user->update($validatedData);

        return redirect()->route('profile.index')->with('success', 'Profile Berhasil Diperbarui');


    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


   
}
