@extends('layouts')
@section('content')
    <form id="productForm" action="{{ route('sepatuSendal.update', $sepatuSendal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Produk</div>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning">
                            <div class="text-muted">Semua Form Harus di Isi!</div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group form-group-default">
                                        {{-- form input model --}}
                                        <label>Model</label>
                                        <select class="form-select" id="formGroupDefaultSelect" name="produk_model"
                                            required>

                                            <option value="">Pilih Model</option>
                                            @foreach ($models as $model)
                                                <option value="{{ $model->id }}"
                                                    {{ $sepatuSendal->model_id == $model->id ? 'selected' : '' }}>
                                                    {{ $model->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Ukuran dan Stok</label>
                                    @foreach ($ukurans as $ukuran)
                                        @php
                                            $stok =
                                                $sepatuSendal->ukuran->where('id', $ukuran->id)->first()->pivot->stok ??
                                                0;
                                        @endphp
                                        <div class="form-check mb-3">
                                            <input class="form-check-input ukuran-checkbox" type="hidden" name="ukuran[]"
                                                value="{{ $ukuran->id }}" id="ukuran-{{ $ukuran->id }}">

                                            <label class="form-check-label" for="ukuran-{{ $ukuran->id }}">
                                                Ukuran {{ $ukuran->ukuran }}
                                            </label>

                                            <input type="number" name="stok[]" class="form-control mt-2 stok-input"
                                                placeholder="Jumlah stok" value="{{ old('stok.' . $loop->index, $stok) }}"
                                                min="0" required>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success" id="alert_demo_3_3">
                            Submit
                        </button>
                        <button class="btn btn-danger" type="button"
                            onclick="window.location.href='{{ route('sepatuSendal.index') }}';">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('scripts')
        <script>
            //== Class definition
            var SweetAlert2Demo = (function() {
                //== Demos          
                var initDemos = function() {

                    $("#alert_demo_3_3").click(function(e) {
                        e.preventDefault(); // Mencegah form submit otomatis
                        let formValid = true;

                        const modelSelect = document.querySelector("select[name='produk_model']");
                        const stokInputs = document.querySelectorAll('.stok-input');

                        // Cek jika model dipilih
                        if (modelSelect.value === '') {
                            formValid = false;
                            swal("Error!", "Silahkan pilih model produk.", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-danger",
                                    },
                                },
                            });
                            return; // Keluar dari fungsi jika model belum dipilih
                        }

                        // Cek jika semua stok diisi
                        let allStokFilled = true;
                        stokInputs.forEach(input => {
                            if (input.value === '') {
                                allStokFilled = false;
                            }
                        });

                        if (!allStokFilled) {
                            formValid = false;
                            swal("Error!", "Semua stok harus diisi.", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-danger",
                                    },
                                },
                            });
                            return; // Keluar dari fungsi jika stok belum diisi
                        }

                        // Jika form valid, tampilkan alert sukses dan submit form
                        if (formValid) {
                            swal("Good job!", "Berhasil di Perbarui", {
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
                    //== Init
                    init: function() {
                        initDemos();
                    },
                };
            })();

            //== Class Initialization
            jQuery(document).ready(function() {
                SweetAlert2Demo.init();
            });
        </script>
    @endpush
@endsection
