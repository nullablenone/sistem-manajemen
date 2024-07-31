@extends('layouts')
@section('content')
    <form action="{{ route('sepatuSendal.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Produk</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md">

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group form-group-default">
                                        <label>Model</label>
                                        <select class="form-select" id="formGroupDefaultSelect" name="produk_model">
                                            @foreach ($models as $model)
                                                <option value="{{ $model->id }}">{{ $model->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group form-group-default">
                                        <label>Ukuran</label>
                                        <select class="form-select" id="formGroupDefaultSelect" name="ukuran">
                                            @foreach ($ukurans as $ukuran)
                                                <option value="{{ $ukuran->id }}">{{ $ukuran->ukuran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success">Submit</button>
                        <button class="btn btn-danger">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
