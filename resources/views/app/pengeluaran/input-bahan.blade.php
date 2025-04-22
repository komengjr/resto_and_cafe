<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Input Bahan Baku</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('defisit_money_save') }}" method="post" enctype="multipart/form-data">
        @csrf

        {{-- FIELD --}}
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Nama Bahan</label>
            <input type="text" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Tipe Pengeluaran</label>
            <select id="organizerSingle" name="organizerSingle"
                data-options='{"removeItemButton":true,"placeholder":true}' class="form-control">
                <option data-id="">Pilih</option>
                <option data-id="small">Bahan Dapur</option>
                <option data-id="medium">Perabotan Rumah Tangga</option>
                <option data-id="large">Large</option>
            </select>
        </div>
        <span id="menu-defisit-tipe"></span>
        <div class="col-md-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
                <input id="link" type="text" name="link" class="form-control" value="no_image" hidden>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Input</button>
        </div>
    </form>
    <div class="p-4">
        <table id="examplebahan" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700">
                <tr>
                    <th>No</th>
                    <th>Token</th>
                    <th>Bahan</th>
                    <th>Banyaknya</th>
                    <th>Satuan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

            </tbody>
        </table>
    </div>
</div>
{{-- UPLOAD FILE  --}}

<script>
    new DataTable('#examplebahan', {
        responsive: true
    });
</script>
