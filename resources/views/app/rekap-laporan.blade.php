@extends('layouts.base')
@section('base.css')
    <link href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0" id="followers">Rekap Report <span class="d-none d-sm-inline-block"></span></h5>
                </div>
                <div class="col">
                    <form>
                        <div class="row g-0">
                            <div class="col">
                                <input class="form-control form-control-sm" type="text" placeholder="Search..." />
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body bg-light px-1 py-0">
            <div class="row g-0 text-center fs--1">
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                    <div class="bg-white dark__bg-1100 p-3 h-100"><a href="#"><img
                                class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                src="{{ asset('img/icon/FInance.png') }}" alt="" width="100" /></a>
                        <h6 class="mb-1">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-laporan"
                                id="button-laporan-rekap-total">Rekap Total</a>
                        </h6>
                        <p class="fs--2 mb-1"><a class="text-700" href="#!">Management</a></p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                    <div class="bg-white dark__bg-1100 p-3 h-100"><a href="#"><img
                                class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                src="{{ asset('img/icon/pemasukan.png') }}" alt="" width="100" /></a>
                        <h6 class="mb-1"><a href="#" data-bs-toggle="modal" data-bs-target="#modal-laporan"
                            id="button-laporan-rekap-pemasukan">Pemasukan</a>
                        </h6>
                        <p class="fs--2 mb-1"><a class="text-700" href="#!">Management</a></p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                    <div class="bg-white dark__bg-1100 p-3 h-100"><a href="#"><img
                                class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                src="{{ asset('img/icon/pengeluaran.png') }}" alt="" width="100" /></a>
                        <h6 class="mb-1"><a href="#" data-bs-toggle="modal" data-bs-target="#modal-laporan"
                            id="button-laporan-rekap-pembelanjaan">Pembelanjaan</a>
                        </h6>
                        <p class="fs--2 mb-1"><a class="text-700" href="#!">Lorem ipsum, dolor sit amet</a></p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                    <div class="bg-white dark__bg-1100 p-3 h-100"><a href="#"><img
                                class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                src="{{ asset('img/icon/bank.png') }}" alt="" width="100" /></a>
                        <h6 class="mb-1"><a href="#" data-bs-toggle="modal" data-bs-target="#modal-laporan"
                            id="button-laporan-rekap-pembelanjaan">Transaksi Bank</a>
                        </h6>
                        <p class="fs--2 mb-1"><a class="text-700" href="#!">Lorem ipsum, dolor sit amet</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- <button class="btn btn-primary" id="liveToastBtn" type="button" style="display: none;">Show live toast</button> --}}
@endsection

@section('base.js')
    <div class="modal fade" id="modal-laporan" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl mt-6" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-laporan"></div>
            </div>
        </div>
    </div>

    <div class="position-absolute top-0 end-0 p-3 pt-7" style="z-index: 9999999">
        <div class="toast fade" id="liveToastwarning" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white"><strong class="me-auto">Notification</strong><small>2 Sec
                    ago</small>
                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body">Hello, Pastikan Pilih dengan benar.</div>
        </div>
    </div>

    <script>
        $(document).on("click", "#button-laporan-rekap-total", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-laporan').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('rekap_laporan_total') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-laporan').html(data);
            }).fail(function() {
                $('#menu-laporan').html('eror');
            });
        });
        $(document).on("click", "#button-laporan-rekap-pemasukan", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-laporan').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('rekap_laporan_pemasukan') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-laporan').html(data);
            }).fail(function() {
                $('#menu-laporan').html('eror');
            });
        });
        $(document).on("click", "#button-laporan-rekap-pembelanjaan", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-laporan').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('rekap_laporan_pembelanjaan') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-laporan').html(data);
            }).fail(function() {
                $('#menu-laporan').html('eror');
            });
        });

    </script>

    <script>
        $(document).on("click", "#button-preview-rekap-total", function(e) {
            e.preventDefault();
            var x = document.getElementById("firstdatepicker").value;
            var y = document.getElementById("enddatepicker").value;
            var data = $("#form-rekap-total").serialize();
            console.log(data);
            if (x == "" || y == "") {
                $('#liveToastwarning').toast('show');
            } else {
                $('#preview-report').html(
                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('rekap_laporan_total_preview') }}",
                    type: "POST",
                    cache: false,
                    data: data,
                    dataType: 'html',
                }).done(function(data) {
                    $('#preview-report').html(
                        '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%; height:533px;" frameborder="0"></iframe>');
                }).fail(function() {
                    $('#preview-report').html('eror');
                });
            }
        });
        $(document).on("click", "#button-preview-rekap-pemasukan", function(e) {
            e.preventDefault();
            var x = document.getElementById("firstdatepicker").value;
            var y = document.getElementById("enddatepicker").value;
            var data = $("#form-rekap-pemasukan").serialize();
            console.log(data);
            if (x == "" || y == "") {
                $('#liveToastwarning').toast('show');
            } else {
                $('#preview-report').html(
                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('rekap_laporan_pemasukan_preview') }}",
                    type: "POST",
                    cache: false,
                    data: data,
                    dataType: 'html',
                }).done(function(data) {
                    $('#preview-report').html(
                        '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%; height:533px;" frameborder="0"></iframe>');
                }).fail(function() {
                    $('#preview-report').html('eror');
                });
            }
        });
        $(document).on("click", "#button-preview-rekap-pembelanjaan", function(e) {
            e.preventDefault();
            var x = document.getElementById("firstdatepicker").value;
            var y = document.getElementById("enddatepicker").value;
            var data = $("#form-rekap-pembelanjaan").serialize();
            console.log(data);
            if (x == "" || y == "") {
                $('#liveToastwarning').toast('show');
            } else {
                $('#preview-report').html(
                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('rekap_laporan_pembelanjaan_preview') }}",
                    type: "POST",
                    cache: false,
                    data: data,
                    dataType: 'html',
                }).done(function(data) {
                    $('#preview-report').html(
                        '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%; height:533px;" frameborder="0"></iframe>');
                }).fail(function() {
                    $('#preview-report').html('eror');
                });
            }
        });
    </script>
@endsection
