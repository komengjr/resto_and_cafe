<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Product Found</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>

    <div class="card-body border-top p-3">
        <table id="example" class="table table-striped nowrap" style="width:100%" border="1">
            <thead class="bg-200 text-700">
                <tr>
                    <th>No</th>
                    <th>Nama Product</th>
                    <th>Code Product</th>
                    <th>Status</th>
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
                        <td>{{ $datas->t_product_name }}</td>
                        <td>{{ $datas->t_product_code }}</td>
                        <td>
                            @if ($datas->t_product_status == 1)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <button class="btn btn-falcon-primary" data-bs-dismiss="modal" id="button-detail-product"
                                data-code="{{ $datas->t_product_code }}">Detail</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>

</div>
