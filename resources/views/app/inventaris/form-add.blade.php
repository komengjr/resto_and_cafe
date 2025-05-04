<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Add Inventaris</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>

    <form class="row g-3 p-4" action="{{ route('app_inventaris_save') }}" method="post"
        enctype="multipart/form-data">
        @csrf

        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Nama Barang</label>
            <input class="form-control" id="inputAddress" type="text" name="name" placeholder="Asep Setiawan"
                required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Klasifikasi</label>
            <select class="form-control choices-single-klasifikasi" name="bahan" id="bahan">
                <option value="">Pilih Klasifikasi</option>

            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Lokasi</label>
            <select class="form-control choices-single" name="bahan" id="bahan">
                <option value="">Pilih Lokasi</option>
                @foreach ($lokasi as $lokasis)
                    <option value="{{$lokasis->master_location_code}}">{{$lokasis->master_location_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Harga Barang</label>
            <input class="form-control" id="inputAddress" type="text" name="harga" placeholder="@currency(0)"
                required />
        </div>

        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Merek</label>
            <input class="form-control" id="inputAddress" type="text" name="ttl" placeholder="ABC" required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Tanggal Beli</label>
            <input class="form-control" id="inputAddress" type="date" name="bod" placeholder="ABC" required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Jenis Barang</label>
            <select name="sex" class="form-control" required>
                <option value="">Choose Type</option>
                <option value="0">Aset</option>
                <option value="1">Non Aset</option>
                {{-- <option value="kitchen">Kitchen</option> --}}
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Type Barang</label>
            <input class="form-control" id="inputAddress" type="text" name="type" placeholder="Meja"
                required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Nomor Seri</label>
            <input class="form-control" id="inputAddress" type="text" name="seri" placeholder="XX-090029"
                required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Suplier</label>
            <input class="form-control" id="inputAddress" type="text" name="suplier" placeholder="PT ANGIN RIBUT"
                required />
        </div>

        <div class="col-12">
            <label class="form-label" for="inputAddress">Alamat</label>
            <textarea name="alamat" class="form-control" id=""></textarea>
        </div>
        <div class="col-12">
            <label for="">File Foto</label>
            <input type="file" name="file" id="file">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Save</button>
        </div>
    </form>


</div>
<script>
    new window.Choices(document.querySelector(".choices-single"));
    new window.Choices(document.querySelector(".choices-single-klasifikasi"));
    new DataTable('#examplebahan', {
        responsive: true
    });
</script>
