<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use App\Models\SepatuSendal;
use Illuminate\Http\Request;

class SepatuSendalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('SepatuDanSendal.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $models = ProdukModel::get();
        return view('SepatuDanSendal.create', [
            'models' => $models
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_model' => 'required',
        ]);

        $produk = new SepatuSendal;
        $produk->models_id = $request->produk_model;
        $produk->save();
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
