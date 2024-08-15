@extends('layouts')
@section('title', 'Sepatu & Sendal')

@section('title-content')
    <div>
        <h3 class="fw-bold mb-3">Produk</h3>
        <h6 class="op-7 mb-2">Manajemen Produk Tas</h6>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        <a href="{{ route('tas.create') }}" class="btn btn-secondary"><span class="btn-label">
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
            <div class="card-title">Produk Tas</div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">

                {{-- head table --}}
                <thead class="bg-light">
                    <tr>
                        <th class="text-center align-middle">NO</th>
                        <th class="text-center align-middle">Model</th>
                        <th class="text-center align-middle">Stok</th>
                        <th class="text-center align-middle">Total Stok</th>
                        <th class="text-center align-middle">Sisa</th>
                        <th class="text-center align-middle">Action</th>
                    </tr>
                </thead>

                {{-- body table --}}
                <tbody>
                    @foreach ($tas as $index => $item)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="text-center align-middle">{{ $item->model->nama }}</td>
                            <td class="text-center align-middle">{{ $item->stok }}</td>
                            <td class="text-center align-middle">{{ $item->stok }}</td>
                            <!-- Total stok sama dengan stok karena tidak ada ukuran -->
                            <td class="text-center align-middle">{{ $item->stok }}</td>
                            <!-- Sementara diisi dengan stok -->
                            <td class="text-center align-middle">
                                <a class="" href="{{ route('tas.edit', $item->id) }}">Manage</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                {{-- footer table --}}
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-center">TOTAL</th>
                        <th class="text-center">{{ $tas->sum('stok') }}</th> <!-- Total semua stok -->
                        <th class="text-center">{{ $tas->sum('stok') }}</th>
                        <!-- Total sisa sementara sama dengan total stok -->
                        <th></th>
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
