@extends('layouts')
@section('title', 'Sepatu & Sendal')

@section('title-content')
    <div>
        <h3 class="fw-bold mb-3">Sepatu & Sendal</h3>
        <h6 class="op-7 mb-2">Manajemen Stok Sepatu Dan Sendal Gayata</h6>
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
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Model</th>
                        <th>Ukuran</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sepatuSendals as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->model->nama }}</td>
                            <td>
                                {{ $item->ukuran }}
                                {{-- @foreach ($item->ukuran as $ukuran)
                                    {{ $ukuran->ukuran }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach --}}
                            </td>
                            <td>
                                {{-- {{ $item->pivot->stok }} --}}
                                {{-- @foreach ($item->ukuran as $ukuran)
                                    {{ $ukuran->pivot->stok }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
