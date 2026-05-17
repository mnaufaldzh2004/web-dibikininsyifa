<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Service;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services  = Service::all();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validatedData=   $request->validate([
            'service_name' => 'required|max:255|string',
            'description' => 'string|required|max:255',
            'base_price' => 'numeric|min:0|required'
        ],

        [
            'service_name.required' => 'Nama layanan harus Diisi',
            'service_name.max:255' => 'Karakter tidak boleh lebih dari 255',
            'base_price.required' =>  'harga harus diisi',
            'base_price.min:0' => 'harga minimal harus 0',
            'base_price.numeric' => 'harga harus berupa angka',
            'description.required' => 'deskripsi harus diisi',
            'description.string' => 'deskripsi harus berupa teks'
            ]
    );

    Service::create($validatedData);

    return redirect()->route('services.index')->with('success', 'Data Layanan Berhasil Ditambahkan');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $service = Service::findOrFail($id);

        return view('admin.services.edit' , compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData=   $request->validate([
            'service_name' => 'required|max:255|string',
            'description' => 'string|required|max:255',
            'base_price' => 'numeric|min:0|required'
        ],

        [
            'service_name.required' => 'Nama layanan harus Diisi',
            'service_name.max:255' => 'Karakter tidak boleh lebih dari 255',
            'base_price.required' =>  'harga harus diisi',
            'base_price.min:0' => 'harga minimal harus 0',
            'base_price.numeric' => 'harga harus berupa angka',
            'description.required' => 'deskripsi harus diisi',
            'description.string' => 'deskripsi harus berupa teks'
            ]
    );

       $service = Service::findOrFail($id);
        $service->update($validatedData);

        return redirect()->route('services.index')->with('success', 'Layanan telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        $service->delete();
        return redirect()->route('services.index')->with('success', 'Layanan Berhasil Dihapus');
    }
}
