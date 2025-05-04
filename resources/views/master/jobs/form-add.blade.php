<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Add Master Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('master_jobs_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <label class="form-label" for="inputAddress">Nama Jabatan</label>
            <input class="form-control" id="inputAddress" type="text" name="name" placeholder="Manager Pemasaran"
                required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Kode Jabatan</label>
            <input class="form-control" id="inputAddress" type="text" name="code" placeholder="ABC" required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Pilih Cabang</label>
            <select name="cabang" class="form-control" required>
                <option value="">Choose Cabang</option>
                @foreach ($cabang as $cabangs)
                    <option value="{{$cabangs->master_cabang_code}}">{{$cabangs->master_cabang_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Save</button>
        </div>
    </form>
</div>
