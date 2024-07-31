@extends('layouts')
@section('title', 'Sepatu & Sendal')

@section('title-content')
    <div>
        <h3 class="fw-bold mb-3">Sepatu & Sendal</h3>
        <h6 class="op-7 mb-2">Manajemen Stok Sepatu Dan Sendal Gayata</h6>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        {{-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> --}}
        <a href="{{ route('sepatuSendal.create') }}" class="btn btn-primary btn-round">Tambah Produk</a>
    </div>
@endsection


@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="card-title">Stok</div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Model</th>
                        <th scope="col">Ukuran</th>
                        {{-- <th scope="col">Ukuran 39</th>
                        <th scope="col">Ukuran 38</th>
                        <th scope="col">Ukuran 37</th>
                        <th scope="col">Ukuran 36</th> --}}
                        <th scope="col">Total Stok</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($produks as $index => $produk)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $produk->model->nama }}</td>
                            <td>{{ $produk->ukuran->ukuran }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
