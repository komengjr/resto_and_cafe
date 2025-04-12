
<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Rekap Total</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <form class="row g-3 px-4 py-2" id="form-rekap-total" method="post">
        @csrf
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">First Date</label>
            <input class="form-control datetimepicker" id="firstdatepicker" name="first" type="text" placeholder="d/m/y" data-options='{"disableMobile":true}' />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">End Date</label>
            <input class="form-control datetimepicker" id="enddatepicker" name="end" type="text" placeholder="d/m/y" data-options='{"disableMobile":true}' />
        </div>
        {{-- <div class="col-12">
            <label class="form-label" for="inputAddress2">Category Description</label>
            <textarea class="form-control" name="desc" id="" rows="5" required></textarea>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required/>
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div> --}}
        <div class="col-12">
            <button class="btn btn-primary float-end" type="button" id="button-preview-rekap-total"><span class="fas fa-print"></span> Preview</button>
        </div>
    </form>
    <div id="preview-report"></div>
</div>
<script src="{{ asset('assets/js/flatpickr.js') }}"></script>
