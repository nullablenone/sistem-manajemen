@extends('layouts')
@section('content')
    <form action="{{ route('ukuranProduk.update', $ukuran->id) }}" method="POST" id="productForm">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Ukuran Produk</div>
                    </div>
                    <div class="card-body">
                        <div class="form-group form-group-default">
                            <label>Ukuran</label>
                            <input id="ukuran" name="ukuran" type="text" class="form-control" placeholder="......"
                                value="{{ $ukuran->ukuran }}">
                        </div>
                    </div>

                    <div class="card-action">
                        <button type="submit" class="btn btn-success" id="alert_demo_3_3">
                            Submit
                        </button>
                        <button class="btn btn-danger" type="button"
                            onclick="window.location.href='{{ route('ukuranProduk.index') }}';">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('scripts')
        <script>
            var SweetAlert2Demo = (function() {
                var initDemos = function() {

                    $("#alert_demo_3_3").click(function(e) {
                        e.preventDefault(); // Mencegah form submit otomatis
                        let formValid = true;

                        const namaUkuranInput = document.getElementById("ukuran");

                        // Cek jika nama model diisi
                        if (namaUkuranInput.value.trim() === '') {
                            formValid = false;
                            swal("Error!", "Silahkan isi ukuran.", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-danger",
                                    },
                                },
                            });
                            return; // Keluar dari fungsi jika nama model belum diisi
                        }

                        // Jika form valid, tampilkan alert sukses dan submit form
                        if (formValid) {
                            swal("Good job!", "Berhasil diupdate", {
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-success",
                                    },
                                },
                            }).then(() => {
                                document.getElementById('productForm')
                            .submit(); // Submit form setelah alert
                            });
                        }
                    });
                };

                return {
                    init: function() {
                        initDemos();
                    },
                };
            })();

            jQuery(document).ready(function() {
                SweetAlert2Demo.init();
            });
        </script>
    @endpush
@endsection
