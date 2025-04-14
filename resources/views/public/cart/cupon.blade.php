<div class="card bg-danger text-white mb-4">
    <div class="card-body">
        <h5 class="card-title text-white mb-1">Cupon Potongan Harga</h5>
        <p class="card-text">Kode : {{$id}}
            <br>
            Potongan Harga : @currency($disc)
        </p>
        <input type="text" name="cupon" id="cupon" value="{{$id}}" hidden>
    </div>
</div>
{{-- <li>Total <span>@currency($payment)</span></li> --}}
