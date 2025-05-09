<style>
    input[type="file"] {
        display: none;
    }
</style>
<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Add Inventaris</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>

    <form class="row g-3 p-4" action="{{ route('app_inventaris_save_klasifikasi') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Pilih Category</label>
            <select class="form-control choices-single-klasifikasi" name="klasifikasi" id="klasifikasi">
                <option value="">Pilih Klasifikasi</option>
                @foreach ($cat as $cats)
                    <option value="{{ $cats->inventaris_cat_code }}">{{ $cats->inventaris_cat_code }} -
                        {{ $cats->inventaris_cat_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Kode Klasifikasi</label>
            <input class="form-control" id="inputAddress" type="text" name="code" placeholder="01.01" required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Nama Klasifikasi</label>
            <input class="form-control" id="inputAddress" type="text" name="name" placeholder="Barang Antik"
                required />
        </div>
        <div class="col-12 mt-4">
            <button class="btn btn-primary" style="float: right;" type="submit"><span class="fas fa-save"></span>
                Save</button>
        </div>
    </form>

    <div class="card-body pb-4 px-4">
        <table id="exampleklasifikasi" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700">
                <tr>
                    <th>No</th>
                    <th>Kode Klasifikasi</th>
                    <th>Nama Klasifikasi</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($klasifikasi as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->inventaris_klasifikasi_code}}</td>
                        <td>{{$item->inventaris_klasifikasi_name}}</td>
                        <td>{{$item->inventaris_cat_name}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<script>
    new window.Choices(document.querySelector(".choices-single-klasifikasi"));
    new DataTable('#exampleklasifikasi', {
        responsive: true
    });
</script>
{{-- UPLOAD FILE  --}}
