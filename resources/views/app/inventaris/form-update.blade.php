<style>
    input[type="file"] {
        display: none;
    }
</style>
<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Update Inventaris</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>

    <form class="row g-3 p-4" action="{{ route('app_inventaris_save_update') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Nama Barang</label>
            <input class="form-control" id="inputAddress" type="text" name="name"
                value="{{ $data->inventaris_data_name }}" required />
            <input class="form-control" id="inputAddress" type="text" name="code"
                value="{{ $data->inventaris_data_code }}" hidden />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Klasifikasi</label>
            <select class="form-control choices-single-klasifikasi" name="klasifikasi" id="klasifikasi">
                <option value="{{ $data->inventaris_klasifikasi_code }}">{{ $data->inventaris_klasifikasi_name }}
                </option>

            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Lokasi</label>
            <select class="form-control choices-single" name="lokasi" id="lokasi">
                <option value="{{ $data->master_location_code }}">{{ $data->master_location_name }}</option>

            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Harga Barang</label>
            <input class="form-control" id="inputAddress" type="text" name="harga" value="@currency($data->inventaris_data_harga)"
                required />
        </div>

        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Merek</label>
            <input class="form-control" id="inputAddress" type="text" name="merk"
                value="{{ $data->inventaris_data_merk }}" required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Tanggal Beli</label>
            <input class="form-control" id="inputAddress" type="date" name="tgl_beli"
                value="{{ $data->inventaris_data_tgl_beli }}" required />
        </div>

        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Jenis Barang</label>
            <select name="jenis" class="form-control" required>
                @if ($data->inventaris_data_jenis == 0)
                    <option value="0">Aset</option>
                    <option value="1">Non Aset</option>
                @else
                    <option value="1">Non Aset</option>
                    <option value="0">Aset</option>
                @endif
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Type Barang</label>
            <input class="form-control" id="inputAddress" type="text" name="type"
                value="{{ $data->inventaris_data_type }}" required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Nomor Seri</label>
            <input class="form-control" id="inputAddress" type="text" name="seri"
                value="{{ $data->inventaris_data_no_seri }}" required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Suplier</label>
            <input class="form-control" id="inputAddress" type="text" name="suplier"
                value="{{ $data->inventaris_data_suplier }}" required />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Upload</label>
            <label class="custom-file-upload btn btn-falcon-primary form-control" id="upload-container">
                <input type="file" id="browseFile" class="" />
                <span class="fa fa-cloud-upload-alt"></span> Upload Ulang
            </label>
            <a href="#" id="file-showing" data-fancybox="images" data-caption="">
                <img src="{{ asset($data->inventaris_data_file) }}" alt="lightbox" class="lightbox-thumb img-thumbnail"
                    id="videoPreview" width="100">
            </a>
        </div>
        <div class="col-xl-12">
            <div class="progress  mt-3" style="height: 20px">
                <div class="progress-bar progress-bar-striped progress-bar-animated loading" role="progressbar"
                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">0%</div>
            </div>
        </div>

        <input id="link" type="text" name="link" class="form-control" value="{{$data->inventaris_data_file}}" hidden>
        <div class="col-12 mt-4">
            <button class="btn btn-primary" style="float: right;" type="submit"><span class="fas fa-save"></span>
                Save</button>
        </div>
    </form>


</div>
<script>
    new window.Choices(document.querySelector(".choices-single"));
    new window.Choices(document.querySelector(".choices-single-klasifikasi"));
    new DataTable('#examplebahan', {
        responsive: true
    });
</script>
{{-- UPLOAD FILE  --}}
<script type="text/javascript">
    var browseFile = $('#browseFile');
    var resumable = new Resumable({
        target: "{{ route('app_inventaris_upload_file') }}",
        query: {
            _token: '{{ csrf_token() }}'
        }, // CSRF token
        fileType: ['jpeg', 'png'],
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
