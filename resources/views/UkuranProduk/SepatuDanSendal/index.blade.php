@extends('layouts')
@section('title', 'Sepatu & Sendal')

@section('title-content')
    <div>
        <h3 class="fw-bold mb-3">Ukuran</h3>
        <h6 class="op-7 mb-2">Manajemen Ukuran Sepatu Dan Sendal Gayata</h6>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        <a href="{{ route('ukuranProduk.create') }}" class="btn btn-secondary"><span class="btn-label">
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
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">

                {{-- head table --}}
                <thead class="bg-light">
                    <tr>
                        <th class="text-center align-middle">NO</th>
                        <th class="text-center align-middle">Model</th>
                        <th class="text-center align-middle">Action</th>
                    </tr>
                </thead>

                {{-- body table --}}
                <tbody>
                    @foreach ($ukurans as $index => $ukuran)
                        <tr>
                            <td class="text-center align-middle">{{ $index += 1 }}</td>
                            <td class="text-center align-middle">{{ $ukuran->ukuran }}</td>
                            <td class="text-center align-middle">
                                <a class="btn btn-success" href="{{ route('ukuranProduk.edit', $ukuran->id) }}"><span
                                        class="btn-label">
                                        <i class="fa fa-check"></i>
                                    </span>Edit</a>

                                <form action="{{ route('ukuranProduk.destroy', $ukuran->id) }}" method="POST"
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
                        text: "Data Yang Terkait Akan Ikut Terhapus",
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
