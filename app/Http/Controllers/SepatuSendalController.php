<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use App\Models\Ukuran;
use App\Models\SepatuSendal;
use Illuminate\Http\Request;

class SepatuSendalController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $sepatuSendals = SepatuSendal::with('model', 'ukuran')->get();
        $ukurans = Ukuran::all();

        return view('Produk.SepatuDanSendal.index', compact('sepatuSendals', 'ukurans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $models = ProdukModel::get();
        $ukurans = Ukuran::get();
        return view('Produk.SepatuDanSendal.create', compact('models', 'ukurans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'produk_model' => 'required|exists:produk_models,id',
            'ukuran' => 'required|array',
            'ukuran.*' => 'exists:ukurans,id',
            'stok' => 'required|array',
            'stok.*' => 'integer|min:0'
        ]);

        // Instansiasi objek Sepatu
        $sepatu = new SepatuSendal;
        $sepatu->model_id = $request->input('produk_model');

        // Simpan data sepatu
        $sepatu->save();

        // Relasi dengan pivot table
        foreach ($request->input('ukuran') as $index => $ukuranId) {
            $sepatu->ukuran()->attach($ukuranId, ['stok' => $request->input('stok')[$index]]);
        }

        return redirect()->route('sepatuSendal.index')->with('success', 'Data berhasil ditambahkan.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sepatuSendal = SepatuSendal::with('model', 'ukuran')->find($id);
        $models = ProdukModel::get();
        $ukurans = Ukuran::get();
        return view('Produk.SepatuDanSendal.edit', compact('sepatuSendal', 'models', 'ukurans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validated = $request->validate([
            'produk_model' => 'required|exists:produk_models,id',
            'ukuran' => 'required|array',
            'ukuran.*' => 'exists:ukurans,id',
            'stok' => 'required|array',
            'stok.*' => 'integer|min:0'
        ]);

        $sepatu = SepatuSendal::with('model', 'ukuran')->find($id);
        // Instansiasi objek yang di edit
        $sepatu->model_id = $request->input('produk_model');
        // Simpan data sepatu dan Sendal
        $sepatu->save();

        // Update ukuran dan stok pada pivot table
        foreach ($request->input('ukuran') as $index => $ukuranId) {
            $sepatu->ukuran()->updateExistingPivot($ukuranId, ['stok' => $request->input('stok')[$index]]);
        }

        return redirect()->route('sepatuSendal.index')->with('success', 'Data berhasil diperbarui : )');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sepatu = SepatuSendal::find($id);
        $sepatu->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
