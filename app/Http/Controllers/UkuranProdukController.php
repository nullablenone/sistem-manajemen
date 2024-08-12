<?php

namespace App\Http\Controllers;

use App\Models\Ukuran;
use Illuminate\Http\Request;

class UkuranProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ukurans = Ukuran::get();
        return view('UkuranProduk.SepatuDanSendal.index', compact('ukurans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('UkuranProduk.SepatuDanSendal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ukuran' => 'required|numeric'
        ]);

        $ukuran = new Ukuran;
        $ukuran->ukuran = $request->input('ukuran');
        $ukuran->save();

        return redirect()->route('ukuranProduk.index')->with('success', 'Data berhasil ditambahkan.');
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
        $ukuran = Ukuran::find($id);
        return view('UkuranProduk.SepatuDanSendal.edit', compact('ukuran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'ukuran' => 'required'
        ]);

        $ukuran = Ukuran::find($id);
        $ukuran->ukuran = $request->input('ukuran');
        $ukuran->save();

        return redirect()->route('ukuranProduk.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ukuran = Ukuran::find($id);
        $ukuran->delete();
        return redirect()->route('ukuranProduk.index')->with('success', 'Data berhasil dihapus');
    }
}
