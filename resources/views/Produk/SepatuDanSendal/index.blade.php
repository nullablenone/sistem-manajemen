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
            <i class="fas fa-check"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Statistics</div>
                @if (Auth::user()->hasRole('super admin'))
                    <div class="card-tools">
                        <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                                <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a>
                        <button class="btn btn-label-info btn-round btn-sm" onclick="window.print()"> <span
                                class="btn-label">
                                <i class="fa fa-print"></i>
                            </span>Print</button>
                    </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            <table id="table-to-print" class="table table-bordered table-hover">
                {{-- head table --}}
                <thead>
                    <tr>
                        <th rowspan="2" class="text-center align-middle">NO</th>
                        <th rowspan="2" class="text-center align-middle">Model</th>
                        <th colspan="{{ count($ukurans) }}" class="text-center">Ukuran</th>
                        <th rowspan="2" class="text-center align-middle">Total Stok</th>
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
                            <td><a class="btn btn-success btn-sm" href="{{ route('sepatuSendal.edit', $item->id) }}"><span
                                        class="btn-label">
                                        <i class="fa fa-check"></i>
                                    </span>Manage</a>

                                <form action="{{ route('sepatuSendal.destroy', $item->id) }}" method="POST"
                                    class="delete-form d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn btn-sm">
                                        <span class="btn-label"><i class="fa fa-exclamation-circle"></i></span>
                                        Hapus
                                    </button>
                                </form>
                            </td>
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
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.delete-btn').click(function(e) {
                    e.preventDefault(); // Prevent default button behavior

                    const form = $(this).closest('.delete-form');

                    swal({
                        title: "Apakah kamu yakin?",
                        text: "Kamu tidak dapat mengembalikan ini!",
                        icon: "warning",
                        buttons: {
                            cancel: {
                                visible: true,
                                text: "Tidak, Batalkan!",
                                className: "btn btn-danger",
                            },
                            confirm: {
                                text: "Ya, Hapus!",
                                className: "btn btn-success",
                            },
                        },
                    }).then((willDelete) => {
                        if (willDelete) {
                            form.submit(); // Submit the form
                            swal("Dihapus!", "Data kamu sudah dihapus.", {
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-success",
                                    },
                                },
                            });
                        } else {
                            swal("Data kamu Aman!", {
                                buttons: {
                                    confirm: {
                                        className: "btn btn-success",
                                    },
                                },
                            });
                        }
                    });
                });
            });
        </script>
    @endpush

@endsection
