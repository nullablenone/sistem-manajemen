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
        // Query untuk mengambil semua data sepatu dengan model dan ukuran
        $sepatuSendals = SepatuSendal::with(['model', 'ukuran'])
            ->join('produk_models', 'sepatu_sendals.model_id', '=', 'produk_models.id')
            ->join('sepatu_sendal_ukuran', 'sepatu_sendals.id', '=', 'sepatu_sendal_ukuran.sepatusendal_id')
            ->join('ukurans', 'sepatu_sendal_ukuran.ukuran_id', '=', 'ukurans.id')
            ->select('sepatu_sendals.*', 'produk_models.nama as model_nama', 'ukurans.ukuran', 'sepatu_sendal_ukuran.stok')
            ->orderBy('produk_models.nama', 'asc')
            ->orderBy('ukurans.ukuran', 'asc')
            ->get();

        // Tambahkan fitur pencarian
        // if ($request->filled('search')) {
        //     $sepatu->where('model_produk.nama_model', 'like', '%' . $request->search . '%')
        //         ->orWhere('ukuran.ukuran', 'like', '%' . $request->search . '%');
        // }


        // Kirim data sepatu ke view
        return view('SepatuDanSendal.index', compact('sepatuSendals'));
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
        foreach ($validated['ukuran'] as $index => $ukuranId) {
            $sepatu->ukuran()->attach($ukuranId, ['stok' => $validated['stok'][$index]]);
        }

        return redirect()->route('sepatuSendal.index')->with('success', 'Sepatu berhasil ditambahkan.');
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
