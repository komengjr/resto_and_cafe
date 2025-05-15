<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.3/css/buttons.dataTables.css">
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
                    <th>Harga Sebelum Diskon</th>
                    <th>Diskon</th>
                    <th>Harga Setelah Diskon</th>
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
                        <td>{{ $datas->t_product_type }}</td>
                        <td class="text-end">@currency($datas->t_product_price)</td>
                        <td>{{ $datas->t_product_disc }} %</td>
                        <td class="text-end">@currency($datas->t_product_price - ($datas->t_product_price*$datas->t_product_disc/100))</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<script>
    new DataTable('#example-product', {
        responsive: true,
        layout: {
            topStart: {
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            }
        }
    });
</script>
