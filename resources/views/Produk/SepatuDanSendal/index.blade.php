@extends('layouts')
@section('title', 'Sepatu & Sendal')

@section('title-content')
    <div>
        <h3 class="fw-bold mb-3">Produk</h3>
        <h6 class="op-7 mb-2">Manajemen Produk Sepatu Dan Sendal Gayata</h6>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        <a href="{{ route('sepatuSendal.create') }}" class="btn btn-secondary"><span class="btn-label">
                <i class="fa fa-plus"></i>
            </span>
            Tambah</a>
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

                {{-- head table --}}
                <thead>
                    <tr>
                        <th rowspan="2" class="text-center align-middle">NO</th>
                        <th rowspan="2" class="text-center align-middle">Model</th>
                        <th colspan="{{ count($ukurans) }}" class="text-center">Ukuran</th>
                        <th rowspan="2" class="text-center align-middle">Total Stok</th>
                        <th rowspan="2" class="text-center align-middle">Sisa</th>
                        <th rowspan="2" class="text-center align-middle">Action</th>
                    </tr>
                    <tr>
                        @foreach ($ukurans as $ukuran)
                            <th class="text-center">{{ $ukuran->ukuran }}</th>
                        @endforeach
                    </tr>
                </thead>

                {{-- body table --}}
                <tbody>
                    @foreach ($sepatuSendals as $index => $item)
                        @php
                            $totalStok = 0;
                        @endphp
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->model->nama }}</td>

                            @foreach ($ukurans as $ukuran)
                                @php
                                    $stok = $item->ukuran->where('id', $ukuran->id)->first()->pivot->stok ?? 0;
                                    $totalStok += $stok;
                                @endphp
                                <td class="text-center">{{ $stok }}</td>
                            @endforeach
                            <td class="text-center">{{ $totalStok }}</td>
                            <td class="text-center">{{ $totalStok }}</td> <!-- sementara diisi total stok -->
                            <td><a href="{{ route('sepatuSendal.edit', $item->id) }}">Manage</a></td>
                        </tr>
                    @endforeach
                </tbody>

                {{-- footer table --}}
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-center">TOTAL</th>
                        @foreach ($ukurans as $ukuran)
                            <th class="text-center">
                                {{ $sepatuSendals->sum(fn($item) => $item->ukuran->where('id', $ukuran->id)->first()->pivot->stok ?? 0) }}
                            </th>
                        @endforeach
                        <th class="text-center">{{ $sepatuSendals->sum(fn($item) => $item->ukuran->sum('pivot.stok')) }}
                        </th>
                        <th class="text-center">{{ $sepatuSendals->sum(fn($item) => $item->ukuran->sum('pivot.stok')) }}
                        </th> <!-- sementara diisi total stok -->
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
