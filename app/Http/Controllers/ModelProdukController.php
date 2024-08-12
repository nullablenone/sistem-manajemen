<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ModelProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = ProdukModel::get();
        return view('ModelProduk.SepatuDanSendal.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ModelProduk.SepatuDanSendal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        $model = new ProdukModel;
        $model->nama = $request->input('nama');
        $model->save();

        return redirect()->route('modelProduk.index')->with('success', 'Data berhasil ditambahkan.');
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
        $model = ProdukModel::find($id);
        return view('ModelProduk.SepatuDanSendal.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required'
        ]);

        $model = ProdukModel::find($id);
        $model->nama = $request->input('nama');
        $model->save();

        return redirect()->route('modelProduk.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = ProdukModel::find($id);
        $model->delete();
        return redirect()->route('modelProduk.index')->with('success', 'Data berhasil dihapus');
    }
}
