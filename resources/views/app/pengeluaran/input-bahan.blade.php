{{-- <link href="{{ asset('vendors/prism/prism-okaidia.css') }}" rel="stylesheet"> --}}

<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Input Bahan Baku</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <form class="row g-3 p-4" id="form-input-bahan" method="post" enctype="multipart/form-data">
        @csrf
        {{-- FIELD --}}
        <input type="text" name="no_inv" value="{{ $code }}" hidden>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Pilih Bahan</label>
            <select class="form-control choices-single" name="bahan" id="bahan">
                <option value="">Pilih Bahan</option>
                @foreach ($data as $datas)
                    <option value="{{ $datas->m_bahan_code }}">{{ $datas->m_bahan_name }} / {{ $datas->m_bahan_satuan }}
                    </option>
                @endforeach
            </select>

        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Banyaknya</label>
            <input type="text" class="form-control" name="qty" id="qty">
        </div>
        <div class="col-md-12">
            <label class="form-label" for="inputAddress">Harga</label>
            <input type="text" class="form-control" name="harga" id="harga">
        </div>
        {{-- <span id="menu-defisit-tipe"></span>
        <div class="col-md-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
                <input id="link" type="text" name="link" class="form-control" value="no_image" hidden>
            </div>
        </div> --}}
        <div class="col-12">
            <button class="btn btn-primary" type="button" id="button-save-bahan-detail"><span
                    class="fas fa-save"></span> Input</button>
        </div>
    </form>
    <div class="p-4" id="table-bahan-invoice">
        <table id="examplebahan" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700">
                <tr>
                    <th>No</th>
                    <th>Bahan</th>
                    <th>Banyaknya</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($bahan as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->m_bahan_name }}</td>
                        <td>{{ $datas->qty_detail }} {{ $datas->m_bahan_satuan }}</td>
                        <td>@currency($datas->price_detail)</td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm" id="button-remove-bahan-invoice" data-id="{{$datas->id_inv_detail}}" data-code="{{$datas->no_inv}}"><i class="far fa-trash-alt"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- UPLOAD FILE  --}}

<script>
    new window.Choices(document.querySelector(".choices-single"));
    new DataTable('#examplebahan', {
        responsive: true
    });
</script>


{{-- <script src="{{ asset('vendors/prism/prism.js') }}"></script> --}}
