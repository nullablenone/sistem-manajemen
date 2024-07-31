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
        $produks = SepatuSendal::with('model', 'ukuran')->get();

        return view('SepatuDanSendal.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $models = ProdukModel::get();
        $ukurans = Ukuran::get();
        return view('SepatuDanSendal.create', compact('models', 'ukurans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_model' => 'required|exists:produk_models,id',
            'ukuran' => 'required|numeric',
        ]);

        $produk = new SepatuSendal;

        $produk->model_id = $request->produk_model;
        $produk->ukuran_id = $request->ukuran;
        $produk->save();

        return redirect()->route('sepatuSendal.index')->with('success', 'Produk berhasil ditambahkan.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
