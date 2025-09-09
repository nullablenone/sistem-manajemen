@extends('layouts')
@section('title', 'Dashboard')

@section('title-content')
    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check"></i> {{ session('success') }}

        </div>
    @endif

    <div class="d-flex align-items-center ms-md-auto py-2 py-md-0 gap-2">
        <div class="dropdown">
            <button class="btn btn-label-info btn-round me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Manage
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('sepatuSendal.index') }}">Sepatu & Sendal</a></li>
                <li><a class="dropdown-item" href="{{ route('tas.index') }}">Tas</a></li>
                @if (Auth::user()->hasRole('super admin'))
                    <li><a class="dropdown-item" href="{{ route('managementUsers.index') }}">admin</a></li>
                @endif
            </ul>
        </div>
    </div>

@endsection

@section('content')
    <div>
        @if (Auth::user()->hasRole('super admin'))
            <h3 class="fw-bold mb-3">Selamat Datang Super Admin</h3>
        @endif

        @if (Auth::user()->hasRole('admin'))
            <h3 class="fw-bold mb-3">Selamat Datang Admin</h3>
        @endif

        <h6 class="op-7 mb-2">Manajemen Stok Sepatu Dan Sendal Gayata</h6>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-warning bubble-shadow-small">
                                <i class="fas fa-archive"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Sepatu Sendal</p>
                                <h4 class="card-title">{{ $sepatuSendal->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-archive"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Tas</p>
                                <h4 class="card-title">{{ $tas->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fas fa-luggage-cart"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Model Sepatu</p>
                                <h4 class="card-title">{{ $modelSepatu->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="fas fa-luggage-cart"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Model Tas</p>
                                <h4 class="card-title">{{ $modelTas->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->hasRole('super admin'))
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Admin</p>
                                    <h4 class="card-title">{{ $admin->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
