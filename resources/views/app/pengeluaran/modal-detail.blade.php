<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Detail Invoice Pengeluaran</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <span id="loading-report-pengeluaran"></span>

</div>
{{-- UPLOAD FILE  --}}

<script>
    $.ajax({
        url: "{{ route('defisit_detail_print_invoice') }}",
        type: "POST",
        cache: false,
        data: {
            "_token": "{{ csrf_token() }}",
            "fix_order": "{{$code}}",
        },
        dataType: 'html',
    }).done(function(data) {
        $('#loading-report-pengeluaran').html(
            '<iframe src="data:application/pdf;base64, ' +
            data +
            '" style="width:100%; height:533px;" frameborder="0"></iframe>');
    }).fail(function() {
        $('#loading-fix-order').html('eror');
    });
</script>
