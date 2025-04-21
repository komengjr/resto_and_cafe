<h4>Your Order</h4>
<div class="checkout__order__products">Products <span>Total</span></div>
<ul>
    @php
        $total = 0;
    @endphp
    @foreach ($data as $datas)
        <li>{{ $datas->t_product_name }} <span>@currency($datas->t_product_qty * ($datas->t_product_price - ($datas->t_product_price * $datas->t_product_disc) / 100))</span></li>
        @php
            $total = $total + $datas->t_product_qty * ($datas->t_product_price - ($datas->t_product_price * $datas->t_product_disc) / 100);
        @endphp
    @endforeach
</ul>
<div class="checkout__order__subtotal">Subtotal <span>@currency($total)</span></div>
<div class="checkout__order__total">Cupon <span>@currency(40000)</span></div>
<div class="checkout__order__total">Total <span>@currency($total - 40000)</span></div>
<div class="checkout__input__checkbox">
    <label for="acc-or">
        Mengirim Notifikasi
        <input type="checkbox" id="acc-or">
        <span class="checkmark"></span>
    </label>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
    ut labore et dolore magna aliqua.</p>
{{-- <div class="checkout__input__checkbox">
    <label for="payment">
        Check Payment
        <input type="checkbox" id="payment">
        <span class="checkmark"></span>
    </label>
</div>
<div class="checkout__input__checkbox">
    <label for="paypal">
        Paypal
        <input type="checkbox" id="paypal">
        <span class="checkmark"></span>
    </label>
</div> --}}
<button type="button" class="site-btn" id="button-payment-token" data-id="123">PAYMENT ORDER</button>
