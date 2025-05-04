@extends('layouts.base')
@section('base.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendors/lottie/lottie.min.js') }}"></script>
    <script src="{{ asset('vendors/typed.js/typed.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center"><img class="ms-n2"
                            src="{{ asset('assets/img/illustrations/crm-bar-chart.png') }}" alt="" width="90" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-0">Resto <span class="text-info fw-medium">Data Inventaris &
                                    Aset</span></h4>
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
    <div class="row g-3">
        <div class="col-xl-12">
            <div class="card bg-light my-3">
                <div class="card-body p-3">
                    <p class="fs--1 mb-0"><a href="#!"><span class="fas fa-exchange-alt me-2"
                                data-fa-transform="rotate-90"></span>A payout for <strong>$921.42 </strong>was deposited 13
                            days ago</a>. Your next deposit is expected on <strong>Tuesday, March 13.</strong></p>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-xl-4">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card"
                            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-1.png);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="card-body position-relative">
                            <h6>Total Inventaris<span class="badge badge-soft-warning rounded-pill ms-2">0%</span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                                data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>{{ $data->count() }}</div>
                            <a class="fw-semi-bold fs--1 text-nowrap" href="#">See all<span
                                    class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card"
                            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-2.png);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="card-body position-relative">
                            <h6>Aset<span class="badge badge-soft-info rounded-pill ms-2">0.0%</span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                                data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>0</div><a
                                class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/orders/order-list.html">Show
                                Data<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card"
                            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-3.png);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="card-body position-relative">
                            <h6>Non Aset<span class="badge badge-soft-success rounded-pill ms-2">9.54%</span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif"
                                data-countup='{"endValue":43594,"prefix":"$"}'>0</div><a
                                class="fw-semi-bold fs--1 text-nowrap" href="#">Show Data<span
                                    class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card overflow-hidden">
                <div class="card-header d-flex flex-between-center bg-light py-2">
                    <h6 class="mb-0">Master Data</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-falcon-danger text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-transaction-summary" data-bs-toggle="dropdown"
                            data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2"
                            aria-labelledby="dropdown-transaction-summary">
                            <a class="dropdown-item" href="#!" data-bs-toggle="modal"
                                data-bs-target="#modal-inventaris" id="button-add-inventaris">Add Data Inventaris</a>
                            <a class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body py-0">
                    <table id="example" class="table table-striped nowrap" style="width:100%">
                        <thead class="bg-200 text-700">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Klasifikasi Barang</th>
                                <th>Harga Barang</th>
                                <th>Spesifikasi Barang</th>
                                <th>Lokasi Barang</th>
                                <th>Tanggal Beli</th>
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
                                    <td>{{ $datas->inventaris_data_name }}</td>
                                    <td>{{ $datas->inventaris_klasifikasi_name }}</td>
                                    <td>@currency($datas->inventaris_data_harga)</td>
                                    <td>{{ $datas->inventaris_data_merk }} / {{ $datas->inventaris_data_no_seri }}</td>
                                    <td>{{ $datas->master_location_name }}</td>
                                    <td>{{ $datas->inventaris_data_tgl_beli }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-primary dropdown-toggle"
                                                id="btnGroupVerticalDrop2" type="button" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><span
                                                    class="fas fa-align-left me-1"
                                                    data-fa-transform="shrink-3"></span>Option</button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#modal-inventaris" id="button-master-staff"
                                                    data-code="{{ $datas->inventaris_data_code }}"><i
                                                        class="fas fa-qrcode"></i></span> Cetak Barcode</button>
                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#modal-inventaris" id="button-master-staff"
                                                    data-code="123"><i class="fas fa-clipboard-check"></i>
                                                    Update Data</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-light py-2">
                    {{-- <div class="row flex-between-center">
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Last 7 days</option>
                                <option>Last Month</option>
                                <option>Last Year</option>
                            </select>
                        </div>
                        <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="#!">View All<span
                                    class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-inventaris" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-inventaris"></div>
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
        $(document).on("click", "#button-add-inventaris", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-inventaris').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('app_inventaris_add') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-inventaris').html(data);
            }).fail(function() {
                $('#menu-inventaris').html('eror');
            });

        });
        $(document).on("click", "#button-edit-category", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            console.log(code);

            $('#menu-category').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('app_category_edit') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-category').html(data);
            }).fail(function() {
                $('#menu-category').html('eror');
            });

        });
    </script>
@endsection
