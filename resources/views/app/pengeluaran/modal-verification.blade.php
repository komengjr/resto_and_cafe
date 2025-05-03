<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Menu Verification Invoice</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>

</div>
{{-- UPLOAD FILE  --}}

<div class="card m-3">
    <div class="card-body">
        <div class="row justify-content-between align-items-center">
            <div class="col-md">
                <h5 class="mb-2 mb-md-0">{{$inv->no_inv}}</h5>
            </div>
            <div class="col-auto" id="loading-send-verification">
                <button class="btn btn-falcon-success btn-sm mb-2 mb-sm-0" type="button" id="button-send-verification" data-code="{{$inv->no_inv}}"><i
                        class="fas fa-mail-bulk"></i> Send Verification</button>
            </div>
        </div>
    </div>
</div>
<div class="card m-3">
    <div class="card-body">
        <div class="row align-items-center text-center mb-3">
            <div class="col-sm-6 text-sm-start"><img src="{{ asset('logox.png') }}" alt="invoice" width="150"></div>
            <div class="col text-sm-end mt-3 mt-sm-0">
                <h2 class="mb-3">Invoice</h2>
                <h5>Resto & Caffe</h5>
                <p class="fs--1 mb-0">156 University Ave, Toronto<br>On, Pontianak, M5H 2H7</p>
            </div>
            <div class="col-12">
                <hr>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col">
                <h6 class="text-500">Send To</h6>
                <h5>Manager Verification</h5>
                <p class="fs--1">1954 Bloor Street West<br>Torronto ON, M6P 3K9<br>Canada</p>
            </div>
            <div class="col-sm-auto ms-auto">
                <div class="table-responsive">
                    <table class="table table-sm table-borderless fs--1">
                        <tbody>
                            <tr>
                                <th class="text-sm-end">Invoice No:</th>
                                <td>{{$inv->no_inv}}</td>
                            </tr>
                            <tr>
                                <th class="text-sm-end">Order For:</th>
                                <td>{{$inv->name_inv}}</td>
                            </tr>
                            <tr>
                                <th class="text-sm-end">Invoice Date:</th>
                                <td>{{$inv->date_inv}}</td>
                            </tr>
                            <tr class="alert-success fw-bold">
                                <th class="text-sm-end">Amount Due:</th>
                                <td>@currency($inv->price_inv)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="table-responsive scrollbar mt-4 fs--1">
            <table class="table table-striped border-bottom">
                <thead class="light">
                    <tr class="bg-primary text-white dark__bg-1000">
                        <th class="border-0">Bahan</th>
                        <th class="border-0 text-center">Jumlah</th>
                        <th class="border-0 text-end">Satuan</th>
                        <th class="border-0 text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                        $total = 0;
                    @endphp
                    @foreach ($data as $datas)
                        <tr>
                            <td class="align-middle">
                                <h6 class="mb-0 text-nowrap">{{$datas->m_bahan_name}}</h6>
                                <p class="mb-0">Down 35mb, Up 100mb</p>
                            </td>
                            <td class="align-middle text-center">{{$datas->qty_detail}}</td>
                            <td class="align-middle text-end">{{$datas->m_bahan_satuan}}</td>
                            <td class="align-middle text-end">@currency($datas->price_detail)</td>
                        </tr>
                        @php
                            $total = $total + $datas->price_detail;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row justify-content-end">
            <div class="col-auto">
                <table class="table table-sm table-borderless fs--1 text-end">
                    <tbody>
                        <tr>
                            <th class="text-900">Subtotal:</th>
                            <td class="fw-semi-bold">@currency($total)</td>
                        </tr>
                        <tr>
                            <th class="text-900">Tax 8%:</th>
                            <td class="fw-semi-bold">0</td>
                        </tr>
                        <tr class="border-top border-top-2 fw-bolder text-900">
                            <th>Amount Due:</th>
                            <td>@currency($total)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer bg-light">
        <p class="fs--1 mb-0"><strong>Notes: </strong>We really appreciate your business and if there’s anything else
            we can do, please let us know!</p>
    </div>
</div>
