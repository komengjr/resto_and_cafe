<div class="card-body" id="refresh-order">
    <table class="table table-borderless fs--1 mb-0">
        <thead>
            <tr class="border-bottom">
                <th class="float-start">Name</th>
                <th class="text-center">Quantity</th>
                <th class="float-end">Price</th>
            </tr>
        </thead>
        @php
            $total = 0;
        @endphp
        @foreach ($data as $item)
            <tr class="border-bottom">
                <td class="ps-0">{{ $item->t_product_name }}
                    <div class="text-400 fw-normal fs--2">{{ $item->t_product_code }}</div>
                </td>
                <td>
                    <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                        <button class="btn btn-sm btn-outline-secondary border-300 px-2" id="button-qty-order" data-code="{{$item->t_product_code}}" data-type="minus">-</button>
                        <input class="form-control text-center px-2 input-spin-none" type="number" min="1" id="input-value-cart{{ $item->t_product_code }}"
                            value="{{ $item->quantity }}" style="width: 40px" />
                        <button class="btn btn-sm btn-outline-secondary border-300 px-2" id="button-qty-order" data-code="{{$item->t_product_code}}" data-type="plus">+</button>
                    </div>
                </td>
                <td class="pe-0 text-end" id="shoping__cart__total{{ $item->t_product_code }}">@currency(($item->t_product_price - ($item->t_product_disc * $item->t_product_price) / 100) * $item->quantity)</td>
            </tr>
            @php
                $total =
                    ($item->t_product_price - ($item->t_product_disc * $item->t_product_price) / 100) *
                        $item->quantity +
                    $total;
            @endphp
        @endforeach
    </table>
</div>
<div class="card-footer d-flex justify-content-between bg-light">
    {{-- <div class="fw-semi-bold">Payable Total</div>
    <div class="fw-bold">@currency($total)</div> --}}
</div>
{{-- <script src="{{ asset('assets/js/theme.js') }}"></script> --}}
<script>
    docReady(quantityInit);
    var quantityInit = function quantityInit() {
        var Selector = {
            DATA_QUANTITY_BTN: "[data-quantity] [data-type]",
            DATA_QUANTITY: "[data-quantity]",
            DATA_QUANTITY_INPUT: '[data-quantity] input[type="number"]',
        };
        var Events = {
            CLICK: "click",
        };
        var Attributes = {
            MIN: "min",
        };
        var DataKey = {
            TYPE: "type",
        };
        var quantities = document.querySelectorAll(Selector.DATA_QUANTITY_BTN);
        quantities.forEach(function(quantity) {
            quantity.addEventListener(Events.CLICK, function(e) {
                var el = e.currentTarget;
                var type = utils.getData(el, DataKey.TYPE);
                var numberInput = el
                    .closest(Selector.DATA_QUANTITY)
                    .querySelector(Selector.DATA_QUANTITY_INPUT);
                var min = numberInput.getAttribute(Attributes.MIN);
                var value = parseInt(numberInput.value, 10);

                if (type === "plus") {
                    value += 1;
                } else {
                    value = value > min ? (value -= 1) : value;
                }

                numberInput.value = value;
            });
        });
    };
</script>

<script>
    $(document).on("click", "#button-qty-order", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            // document.getElementById("menu-cart-payment").style.display = "none";
            // var qty = $(this).data("qty");
            var qty = document.getElementById('input-value-cart'+code).value;
            var order = document.getElementById('no_order').value;
            $.ajax({
                url: "{{ route('menu_edit_cart_order') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "qty": qty,
                    "order": order,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#shoping__cart__total' + code).html(data);
                // window.location.href = "{{ route('list_menu_cart') }}";
            }).fail(function() {
                console.log(err);
            });

        });
</script>
