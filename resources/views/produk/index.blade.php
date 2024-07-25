@extends('layouts')
@section('title', 'Produk')
@section('title-heading', 'Produk')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Basic</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">

                        {{-- show table --}}
                        {{-- <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="basic-datatables_length"><label>Show <select
                                        name="basic-datatables_length" aria-controls="basic-datatables"
                                        class="form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label>
                                </div>
                        </div> --}}

                        {{-- search table --}}
                        {{-- <div class="col-sm-12 col-md-6">
                            <div id="basic-datatables_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="form-control form-control-sm" placeholder=""
                                        aria-controls="basic-datatables"></label></div>
                        </div> --}}

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                                role="grid" aria-describedby="basic-datatables_info">
                                <thead>
                                    <tr role="row">
                                        <th class="" tabindex="0" aria-controls="basic-datatables"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 117.26px;">
                                            Foto</th>
                                        <th class="" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 183.427px;">Nama</th>
                                        <th class="" tabindex="0" aria-controls="basic-datatables" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 88.3438px;">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        {{-- jumlah table --}}
                        {{-- <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="basic-datatables_info" role="status" aria-live="polite">
                                Showing 1 to 10 of 57 entries
                            </div>
                        </div> --}}

                        {{-- halaman table --}}
                        {{-- <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="basic-datatables_previous">
                                        <a href="#" aria-controls="basic-datatables" data-dt-idx="0" tabindex="0"
                                            class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="basic-datatables" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="basic-datatables" data-dt-idx="2" tabindex="0"
                                            class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="basic-datatables" data-dt-idx="3" tabindex="0"
                                            class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="basic-datatables" data-dt-idx="4" tabindex="0"
                                            class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="basic-datatables" data-dt-idx="5" tabindex="0"
                                            class="page-link">5</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="basic-datatables" data-dt-idx="6" tabindex="0"
                                            class="page-link">6</a></li>
                                    <li class="paginate_button page-item next" id="basic-datatables_next"><a
                                            href="#" aria-controls="basic-datatables" data-dt-idx="7"
                                            tabindex="0" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
