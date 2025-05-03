<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Add Staff {{ $data->master_cabang_name }} </h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('master_cabang_save_staff') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Cabang</label>
            <input class="form-control" id="inputAddress" type="text" name="cabang"
                value="{{ $data->master_cabang_code }}" required />
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
                <option value="MNGR">Manager</option>

                {{-- <option value="kitchen">Kitchen</option> --}}
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

    <div class="card p-1">
       <div class="card-body">
        <table id="examplestaff" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700">
                <tr>
                    <th>Foto</th>
                    <th>Nama Staff</th>
                    <th>NIK</th>
                    <th>NIP</th>
                    <th>Tempat / Tgl Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>No Handphone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($staff as $staffs)
                    <tr>
                        <td>
                            <img src="{{ asset($staffs->master_staff_file) }}" alt="" srcset="" width="50">
                        </td>
                        <td>{{$staffs->master_staff_name}}</td>
                        <td>{{$staffs->master_staff_nik }}</td>
                        <td>{{$staffs->master_staff_nip }}</td>
                        <td>{{$staffs->master_staff_ttl }}</td>
                        <td>{{$staffs->master_staff_sex }}</td>
                        <td>{{$staffs->master_staff_agama }}</td>
                        <td>{{$staffs->master_staff_hp }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       </div>
    </div>
</div>
<script>
    new DataTable('#examplestaff', {
        responsive: true
    });
</script>
