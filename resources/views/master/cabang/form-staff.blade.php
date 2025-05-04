<form class="row g-3 p-4" action="{{ route('master_cabang_save_staff') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-4">
        <label class="form-label" for="inputAddress">Cabang</label>
        <input class="form-control" id="inputAddress" type="text" name="cabang" value="{{ $data->master_cabang_code }}"
            required />
    </div>
    <div class="col-md-8">
        <label class="form-label" for="inputAddress">Nama Lengkap</label>
        <input class="form-control" id="inputAddress" type="text" name="name" placeholder="Asep Setiawan"
            required />
    </div>
    <div class="col-md-6">
        <label class="form-label" for="inputAddress">NIK ( Nomor Induk Kependudukan )</label>
        <input class="form-control" id="inputAddress" type="text" name="nik" placeholder="123**********"
            required />
    </div>
    <div class="col-md-6">
        <label class="form-label" for="inputAddress">NIP ( Nomor Induk Pegawai )</label>
        <input class="form-control" id="inputAddress" type="text" name="nip" placeholder="123**********"
            required />
    </div>
    <div class="col-md-4">
        <label class="form-label" for="inputAddress">Tempat Lahir</label>
        <input class="form-control" id="inputAddress" type="text" name="ttl" placeholder="ABC" required />
    </div>
    <div class="col-md-4">
        <label class="form-label" for="inputAddress">Tanggal Lahir</label>
        <input class="form-control" id="inputAddress" type="date" name="bod" placeholder="ABC" required />
    </div>
    <div class="col-md-4">
        <label class="form-label" for="inputAddress">Jenis Kelamin</label>
        <select name="sex" class="form-control" required>
            <option value="">Choose Type</option>
            <option value="L">Laki- Laki</option>
            <option value="P">Perempuan</option>
            {{-- <option value="kitchen">Kitchen</option> --}}
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="inputAddress">Agama</label>
        <select name="agama" class="form-control" required>
            <option value="">Choose Type</option>
            <option value="Islam">Islam</option>
            <option value="Katolik">Katolik</option>
            <option value="Budha">Budha</option>
            <option value="Hindu">Hindu</option>
            {{-- <option value="kitchen">Kitchen</option> --}}
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="inputAddress">Nomor Handphone</label>
        <input class="form-control" id="inputAddress" type="text" name="no_hp" placeholder="089728xxxxxx"
            required />
    </div>
    <div class="col-md-4">
        <label class="form-label" for="inputAddress">Jabatan</label>
        <select name="job" class="form-control" required>
            <option value="">Choose Type</option>
            @foreach ($jobs as $job)
                <option value="{{ $job->master_jobs_code }}">{{ $job->master_jobs_name }}</option>
            @endforeach
        </select>
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
