<table id="examplebahan" class="table table-striped nowrap" style="width:100%">
    <thead class="bg-200 text-700">
        <tr>
            <th>No</th>
            <th>Bahan</th>
            <th>Banyaknya</th>
            <th>Harga</th>
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
                <td>{{ $datas->m_bahan_name }}</td>
                <td>{{ $datas->qty_detail }} {{ $datas->m_bahan_satuan }}</td>
                <td>@currency($datas->price_detail)</td>
                <td class="text-center">
                    <button class="btn btn-danger btn-sm" id="button-remove-bahan-invoice"
                        data-id="{{ $datas->id_inv_detail }}" data-code="{{ $datas->no_inv }}"><i
                            class="far fa-trash-alt"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    new DataTable('#examplebahan', {
        responsive: true
    });
</script>
