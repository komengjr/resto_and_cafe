<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">View Product Category</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="card p-3">
        <table id="example-product" class="table table-striped nowrap" style="width:100%">
        <thead class="bg-200 text-700">
            <tr>
                <th>No</th>
                <th>Nama Product</th>
                <th>Type</th>
                <th>Harga</th>
                <th>Diskon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $datas)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$datas->t_product_name}}</td>
                    <td>{{$datas->t_product_type}}</td>
                    <td>{{$datas->t_product_price}}</td>
                    <td>{{$datas->t_product_disc}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
<script>
        new DataTable('#example-product', {
            responsive: true
        });
    </script>
