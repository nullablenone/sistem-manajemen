@extends('layouts')
@section('title', 'Sepatu & Sendal')

@section('title-content')
    <div>
        <h3 class="fw-bold mb-3">Produk</h3>
        <h6 class="op-7 mb-2">Manajemen Produk Tas Gayata</h6>
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
            <table class="table table-bordered table-hover">

                {{-- Head Table --}}
                <thead class="bg-light">
                    <tr>
                        <th class="text-center align-middle">NO</th>
                        <th class="text-center align-middle">Model</th>
                        <th class="text-center align-middle">Stok</th>
                        <th class="text-center align-middle">Action</th>
                    </tr>
                </thead>

                {{-- Body Table --}}
                <tbody>
                    @foreach ($tas as $index => $item)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="text-center align-middle">{{ $item->model->nama }}</td>
                            <td class="text-center align-middle">{{ $item->stok }}</td>
                            <td class="text-center align-middle">
                                <a class="btn btn-success" href="{{ route('tas.manage', $item->id) }}"><span
                                        class="btn-label">
                                        <i class="fa fa-check"></i>
                                    </span>Manage</a>

                                <form action="{{ route('tas.destroy', $item->id) }}" method="POST"
                                    class="delete-form d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn">
                                        <span class="btn-label"><i class="fa fa-exclamation-circle"></i></span>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                {{-- Footer Table --}}
                <tfoot>
                    <tr>
                        <th colspan="" class="text-center align-middle">TOTAL</th>
                        <th colspan="2" class="text-center align-middle">{{ $tas->sum('stok') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.delete-btn').click(function(e) {
                    e.preventDefault();

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
                            form.submit();
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
