<style>
    input[type="file"] {
        display: none;
    }
</style>
<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Input Pengeluaran Uang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <form class="row g-3 p-4" action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-xl-12">
            <a href="#" id="file-showing" data-fancybox="images" data-caption="" style="display: none;">
                <img src="{{ asset('no_img.jpeg') }}" alt="lightbox" class="lightbox-thumb img-thumbnail"
                    id="videoPreview">
            </a>
            <div class="progress  mt-3" style="height: 20px">
                <div class="progress-bar progress-bar-striped progress-bar-animated loading" role="progressbar"
                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">0%</div>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Upload File</label>
            <label class="custom-file-upload btn btn-falcon-primary form-control" id="upload-container">
                <input type="file" id="browseFile" class="form-control" />
                <span class="fa fa-cloud-upload-alt"></span> Upload
            </label>

        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Tipe Pengeluaran</label>
            <select id="organizerSingle" name="organizerSingle"
                data-options='{"removeItemButton":true,"placeholder":true}' class="form-control">
                <option data-id="">Pilih</option>
                <option data-id="small">Bahan Dapur</option>
                <option data-id="medium">Perabotan Rumah Tangga</option>
                <option data-id="large">Large</option>
            </select>
        </div>
        <span id="menu-defisit-tipe"></span>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
                <input id="link" type="text" name="link" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Save</button>
        </div>
    </form>
</div>
{{-- UPLOAD FILE  --}}
<script type="text/javascript">
    var browseFile = $('#browseFile');
    var resumable = new Resumable({
        target: "{{ route('defisit_upload_file') }}",
        query: {
            _token: '{{ csrf_token() }}'
        }, // CSRF token
        fileType: ['jpg', 'jpeg', 'png', 'mp4'],
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function(file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function(file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('#link').attr('value', response.filename);
        $('.card-footer').show();
        $('#browseFile').hide();
        document.getElementById("file-showing").style.display = "block";
    });

    resumable.on('fileError', function(file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    var progress = $('.progress');

    function showProgress() {
        progress.find('.loading').css('width', '0%');
        progress.find('.loading').html('0%');
        progress.find('.loading').removeClass('bg-info');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.loading').css('width', ` ${value}%`)
        progress.find('.loading').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }
</script>
<script>
    $('#organizerSingle').on("change", function() {
        var dataid = $("#organizerSingle option:selected").attr('data-id');
        if (dataid == "") {
            location.reload();
        } else {
            $.ajax({
                url: "{{ route('defisit_money_tipe_set') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": dataid,
                },
                dataType: 'html',
            }).done(function(data) {
                $("#menu-defisit-tipe").html(data);
            }).fail(function() {
                console.log('eror');
            });
        }

    });
</script>
