@extends('layouts.base')
@section('base.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendors/lottie/lottie.min.js') }}"></script>
    <script src="{{ asset('vendors/typed.js/typed.js') }}"></script>
    <link href="{{ asset('vendors/dropzone/dropzone.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendors/dropzone/dropzone.min.js') }}"></script>
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center"><img class="ms-n2"
                            src="{{ asset('assets/img/illustrations/crm-bar-chart.png') }}" alt="" width="90" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-0">Resto <span class="text-info fw-medium">Pengeluaran
                                    Uang</span></h4>
                        </div><img class="ms-n4 d-md-none d-lg-block"
                            src="{{ asset('assets/img/illustrations/crm-line-chart.png') }}" alt=""
                            width="150" />
                    </div>
                    <div class="col-md-auto p-3">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 g-3">
        <div class="col-xl-12 col-xxl-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 pb-3 pb-lg-0">
                            <div class="d-flex flex-between-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-primary">
                                        <span class="fs--2 fas fa-table text-primary"></span>
                                    </div>
                                    <h6 class="mb-0">Total Pengeluaran</h6>
                                </div>
                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button
                                        class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                        type="button" id="dropdown-new-contact" data-bs-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-new-contact"><a class="dropdown-item"
                                            href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <p class="font-sans-serif lh-1 mb-1 fs-3 pe-4">@currency($total)</p>
                                </div>
                                {{-- <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true"
                                    data-echarts='{"series":[{"type":"line","data":[220,230,150,175,200,170,70,160],"color":"#2c7be5","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#2c7be53A"},{"offset":1,"color":"#2c7be50A"}]}}}],"grid":{"bottom":"-10px"}}'>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 border-lg-end border-bottom border-lg-0 py-3 py-lg-0">
                            <div class="d-flex flex-between-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info"><span
                                            class="fs--2 far fa-file-alt text-info"></span></div>
                                    <h6 class="mb-0">Pengeluaran Diterima</h6>
                                </div>
                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button
                                        class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                        type="button" id="dropdown-new-users" data-bs-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-new-users"><a class="dropdown-item"
                                            href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <p class="font-sans-serif lh-1 mb-1 fs-3 pe-2">@currency($totalterima)</p>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 pt-3 pt-lg-0">
                            <div class="d-flex flex-between-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-item icon-item-sm bg-soft-danger shadow-none me-2 bg-soft-success">
                                        <span class="fs--2 far fa-file-excel text-danger"></span>
                                    </div>
                                    <h6 class="mb-0">Pengeluaran Belum diterima</h6>
                                </div>
                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button
                                        class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                        type="button" id="dropdown-new-leads" data-bs-toggle="dropdown"
                                        data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-new-leads"><a class="dropdown-item"
                                            href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <p class="font-sans-serif lh-1 mb-1 fs-3 pe-4">@currency($total - $totalterima)</p>
                                    {{-- <div class="d-flex flex-column"> <span
                                            class="me-1 text-success fas fa-caret-down text-danger"></span>
                                        <p class="fs--2 mb-0 text-nowrap">1 </p>
                                    </div> --}}
                                </div>
                                {{-- <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true"
                                    data-echarts='{"series":[{"type":"line","data":[200,150,175,130,150,115,130,100],"color":"#00d27a","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#00d27a3A"},{"offset":1,"color":"#00d27a0A"}]}}}],"grid":{"bottom":"-10px"}}'>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Data Pengeluaran</h5>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-falcon-primary btn-sm" href="#!" data-bs-toggle="modal"
                                data-bs-target="#modal-product" id="button-add-pengeluaran">
                                <span class="far fa-plus-square fs--2 me-1"></span>Input Pengeluaran</a>

                        </div>
                    </div>
                </div>
                <div class="card-body border-top p-2">
                    <table id="example" class="table table-striped nowrap" style="width:100%">
                        <thead class="bg-200 text-700">
                            <tr>
                                <th>No</th>
                                <th>Nota Pembelian</th>
                                <th>Kebutuhan</th>
                                <th>User Create</th>
                                <th>Total Biaya</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $datas)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $datas->no_inv }}</td>
                                    <td>{{ $datas->name_inv }}</td>
                                    <td>{{ $datas->user_created }}</td>
                                    <td>@currency($datas->price_inv)</td>
                                    <td>
                                        @if ($datas->status_inv == 0)
                                            <span class="badge bg-danger">Prosess</span>
                                        @elseif($datas->status_inv == 1)
                                            <span class="badge bg-warning">Menunggu Verification</span>
                                        @elseif($datas->status_inv == 2)
                                            <span class="badge bg-success">Diterima</span>
                                        @else
                                            <span class="badge bg-success">Diterima</span>
                                        @endif
                                    </td>
                                    <td>{{ $datas->date_inv }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-primary dropdown-toggle"
                                                id="btnGroupVerticalDrop2" type="button" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><span
                                                    class="fas fa-align-left me-1"
                                                    data-fa-transform="shrink-3"></span>Option</button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                                @if ($datas->status_inv == 0)
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal-invoice" id="button-input-bahan-inv"
                                                        data-code="{{ $datas->no_inv }}"><i
                                                            class="fas fa-download"></i></span> Input Bahan</button>
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal-invoice" id="button-verification-inv"
                                                        data-code="{{ $datas->no_inv }}"><i
                                                            class="fas fa-clipboard-check"></i>
                                                        Verification Invoice</button>
                                                @elseif($datas->status_inv == 1)
                                                <button class="dropdown-item" disabled><i
                                                            class="fas fa-business-time"></i>
                                                        Mohon Menunggu</button>
                                                @else
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal-invoice" id="button-show-file-inv"
                                                        data-code="{{ $datas->no_inv }}"><i
                                                            class="far fa-file-image"></i></span> Bukti invoice</button>
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal-invoice" id="button-show-detail-inv"
                                                        data-code="{{ $datas->no_inv }}"><i class="fas fa-file-alt"></i>
                                                        Detail Invoice</button>
                                                @endif

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        {{-- <div class="col-xl-3">
            <div class="card">
                <div class="card-header d-flex flex-between-center py-2 border-bottom">
                    <h6 class="mb-0">Analis Product</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-most-leads" data-bs-toggle="dropdown" data-boundary="viewport"
                            aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-most-leads"><a
                                class="dropdown-item" href="#!">View</a><a class="dropdown-item"
                                href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="row align-items-center">
                        <div class="col-md-5 col-xl-12 mb-xl-3">
                            <div class="position-relative">
                                <!-- Find the JS file for the following chart at: src/js/charts/echarts/most-leads.js-->
                                <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                                <div class="echart-most-leads my-2" data-echart-responsive="true"></div>
                                <div class="position-absolute top-50 start-50 translate-middle text-center">
                                    <p class="fs--1 mb-0 text-400 font-sans-serif fw-medium">Total</p>
                                    <p class="fs-3 mb-0 font-sans-serif fw-medium mt-n2">15.6k</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-7">
                            <hr class="mx-ncard mb-0 d-md-none d-xxl-block" />
                            <div class="d-flex flex-between-center border-bottom py-3 pt-md-0 pt-xxl-3">
                                <div class="d-flex"><img class="me-2" src="../assets/img/crm/email.svg "
                                        width="16" height="16" alt="..." />
                                    <h6 class="text-700 mb-0">Data </h6>
                                </div>
                                <p class="fs--1 text-500 mb-0 fw-semi-bold">5200 vs 1052</p>
                                <h6 class="text-700 mb-0">12%</h6>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light p-0"><a class="btn btn-sm btn-link d-block py-2"
                        href="#!">Primary<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
            </div>
        </div> --}}
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-product" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-pengeluaran"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-invoice" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-invoice"></div>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('online/resumable.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/img/animated-icons/loading.json') }}"></script> --}}
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
    <script>
        $(document).on("click", "#button-input-bahan-inv", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-invoice').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('defisit_input_bahan_invoice') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-invoice').html(data);
            }).fail(function() {
                $('#menu-invoice').html('eror');
            });

        });
        $(document).on("click", "#button-add-pengeluaran", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-pengeluaran').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('defisit_money_add') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-pengeluaran').html(data);
            }).fail(function() {
                $('#menu-pengeluaran').html('eror');
            });

        });
        $(document).on("click", "#button-show-file-inv", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-invoice').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('defisit_detail_file_invoice') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-invoice').html(data);
            }).fail(function() {
                $('#menu-invoice').html('eror');
            });

        });
        $(document).on("click", "#button-show-detail-inv", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-invoice').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('defisit_detail_invoice') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-invoice').html(data);
            }).fail(function() {
                $('#menu-invoice').html('eror');
            });

        });
        $(document).on("click", "#button-verification-inv", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-invoice').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('defisit_verification_invoice') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-invoice').html(data);
            }).fail(function() {
                $('#menu-invoice').html('eror');
            });

        });
        $(document).on("click", "#button-save-bahan-detail", function(e) {
            e.preventDefault();
            var data = $("#form-input-bahan").serialize();
            $('#table-bahan-invoice').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('defisit_save_bahan_invoice') }}",
                type: "POST",
                cache: false,
                data: data,
                dataType: 'html',
            }).done(function(data) {
                document.getElementById("bahan").value = "";
                document.getElementById("qty").value = "";
                document.getElementById("harga").value = "";
                $('#table-bahan-invoice').html(data);
            }).fail(function() {
                $('#table-bahan-invoice').html('eror');
            });

        });
        $(document).on("click", "#button-remove-bahan-invoice", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var id = $(this).data("id");
            $('#table-bahan-invoice').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('defisit_remove_bahan_invoice') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "id": id,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#table-bahan-invoice').html(data);
            }).fail(function() {
                $('#table-bahan-invoice').html('eror');
            });

        });
        $(document).on("click", "#button-send-verification", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#loading-send-verification').html(
                '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('defisit_send_verification_invoice') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }).fail(function() {
                $('#loading-send-verification').html('eror');
            });

        });
    </script>
@endsection
