<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class optionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::all();

        return view('admin.options.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.options.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'option_name' => 'required|string|max:255',
            'additional_price' =>  'required|numeric|min:0'
        ]);

        Option::create($validatedData);

        return redirect()->route('options.index')->with('success', 'Opsi tambahan berhasil ditambahkan');
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
        $option  = Option::findOrFail($id);

        return view('admin.options.edit', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $validatedData = $request->validate([
            'option_name' => 'required|string|max:255',
            'additional_price' =>  'required|numeric|min:0'
        ]);

        $option = Option::findOrFail($id);

        $option->update($validatedData);

        return redirect()->route('options.index')->with('success', 'Opsi  berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
        $option = Option::findOrFail($id);

        $option->delete();

        return redirect()->route('options.index')->with('success', 'Opsi berhasil dihapus');
    }
}
