<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Master Staff {{ $data->master_cabang_name }} </h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="card" id="form-master-staff">
        <div class="card-body px-4 pb-0 pt-2">
            <button class="btn btn-success" id="button-add-master-staff" data-code="{{$data->master_cabang_code}}"><span class="fas fa-user-plus" ></span> Add STaff</button>
        </div>
    </div>
    <div class="card px-2">
        <div class="card-body pt-2">
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
                                <img src="{{ asset($staffs->master_staff_file) }}" alt="" srcset=""
                                    width="50">
                            </td>
                            <td>{{ $staffs->master_staff_name }}</td>
                            <td>{{ $staffs->master_staff_nik }}</td>
                            <td>{{ $staffs->master_staff_nip }}</td>
                            <td>{{ $staffs->master_staff_ttl }}</td>
                            <td>{{ $staffs->master_staff_sex }}</td>
                            <td>{{ $staffs->master_staff_agama }}</td>
                            <td>{{ $staffs->master_staff_hp }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle"
                                        id="btnGroupVerticalDrop2" type="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">

                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-product" id="button-display-product"
                                            data-code="123"><span
                                                class="fas fa-chalkboard-teacher"></span>
                                            Detail</button>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-product" id="button-edit-product"
                                            data-code="123"><span
                                                class="far fa-edit"></span>
                                            Edit</button>
                                    </div>
                                </div>
                            </td>
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
