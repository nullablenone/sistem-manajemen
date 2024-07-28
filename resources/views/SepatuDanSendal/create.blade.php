@extends('layouts')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Form Elements</div>
                </div>
                <div class="card-body">
                    <div class="row">

                        {{-- <div class="col-md-6 col-lg-4"> --}}
                        <div class="col-md">
                            {{-- <label class="mb-3"><b>Form Group Default</b></label>
                            <div class="form-group form-group-default">
                                <label>Input</label>
                                <input id="Name" type="text" class="form-control" placeholder="Fill Name">
                            </div> --}}
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group form-group-default">
                                    <label>Select</label>
                                    <select class="form-select" id="formGroupDefaultSelect" name="produk_model">
                                        @foreach ($models as $model)
                                            <option value="{{ $model->id }}">{{ $model->nama }}</option>
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
@endsection
