@extends('layouts')
@section('content')
    <form id="productForm" action="{{ route('tas.update', $tas->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Manage Produk</div>
                    </div>
                    <div class="card-body">

                        <div class="form-group form-group-default">
                            <label>Model</label>
                            <select class="form-select" id="formGroupDefaultSelect" name="model" required>
                                <option>Pilih Model</option>
                                @foreach ($models as $model)
                                    <option value="{{ $model->id }}"
                                        {{ $tas->model_id == $model->id ? 'selected' : '' }}>
                                        {{ $model->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group form-group-default">
                            <label>Stok</label>
                            <input id="stok" type="number" name="stok" class="form-control"
                                placeholder="masukan jumlah stok">
                        </div>

                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success" id="alert_demo_3_3">
                            Simpan
                        </button>
                        <button class="btn btn-danger" type="button"
                            onclick="window.location.href='{{ route('tas.index') }}';">Batal</button>
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

                        const modelSelect = document.getElementById("formGroupDefaultSelect");
                        const stokInput = document.getElementById("stok");

                        // Cek jika model dipilih
                        if (modelSelect.value === 'Pilih Model') {
                            formValid = false;
                            swal("Error!", "Silahkan pilih model.", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-danger",
                                    },
                                },
                            });
                            return; // Keluar dari fungsi jika model belum dipilih
                        }

                        // Cek jika stok diisi dengan angka (termasuk 0)
                        if (stokInput.value.trim() === '' || isNaN(stokInput.value)) {
                            formValid = false;
                            swal("Error!", "Silahkan isi jumlah stok", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-danger",
                                    },
                                },
                            });
                            return; // Keluar dari fungsi jika stok tidak valid
                        }

                        // Jika form valid, tampilkan alert sukses dan submit form
                        if (formValid) {
                            swal("Good job!", "Berhasil ditambahkan", {
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
