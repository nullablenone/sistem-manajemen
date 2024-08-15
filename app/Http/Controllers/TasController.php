<?php

namespace App\Http\Controllers;

use App\Models\ModelTas;
use App\Models\Tas;
use Illuminate\Http\Request;

class TasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tas = Tas::get();
        $models = ModelTas::get();
        return view('Produk.Tas.index', compact('tas', 'models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $models = ModelTas::get();
        return view('Produk.Tas.create', compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'model' => 'required',
            'stok' => 'required',
        ]);

        $tas = new Tas;
        $tas->model_id = $request->input('model');
        $tas->stok = $request->input('stok');
        $tas->save();

        return redirect()->route('tas.index')->with('success', 'Data berhasil ditambahkan.');
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
        $tas = Tas::with('model')->find($id);
        $models = ModelTas::get();
        return view('Produk.Tas.edit', compact('tas', 'models'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'model' => 'required',
            'stok' => 'required',
        ]);

        $tas = Tas::find($id);
        $tas->model_id = $request->input('model');
        $tas->stok = $request->input('stok');
        $tas->save();

        return redirect()->route('tas.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
