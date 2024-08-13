<?php

namespace App\Http\Controllers;

use App\Models\ModelTas;
use Illuminate\Http\Request;

class ModelTasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = ModelTas::get();
        return view('ModelProduk.Tas.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ModelProduk.Tas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        $model = new ModelTas;
        $model->nama = $request->input('nama');
        $model->save();

        return redirect()->route('modelTas.index')->with('success', 'Data berhasil ditambahkan.');
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
        $model = MOdelTas::find($id);
        return view('ModelProduk.Tas.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required'
        ]);

        $model = ModelTas::find($id);
        $model->nama = $request->input('nama');
        $model->save();

        return redirect()->route('modelTas.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = ModelTas::find($id);
        $model->delete();
        return redirect()->route('modelTas.index')->with('success', 'Data berhasil dihapus');
    }
}
