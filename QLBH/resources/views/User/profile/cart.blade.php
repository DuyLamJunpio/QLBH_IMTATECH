@extends('User.home.index')

@section('customer')
    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Cart</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                <li class="breadcrumb-item active" href="index.html" aria-current="page">Home</li>
                                <li class="breadcrumb-item"><a class="text-dark" href="cart">Cart</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <!-- CART TABLE-->

                    <div class="table-responsive mb-4">
                        <table class="table text-nowrap">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 p-3" scope="col">
                                        <input type="checkbox" id="select-all" onchange="toggleCheckboxes()" />
                                    </th>
                                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Product</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Price</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Quantity</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Total</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                                </tr>
                            </thead>
                    
                            <tbody class="border-0">
                                @foreach ($cart as $id => $details)
                                    <tr>
                                        <th class="border-0 p-3" scope="col">
                                            <input type="checkbox" id="check-{{ $id }}" onchange="updateProductTotal(this, {{ $details['price'] }}, {{ $id }})" />
                                        </th>
                                        <th class="ps-0 py-3 border-0" scope="row">
                                            <div class="d-flex align-items-center">
                                                <a class="reset-anchor d-block" href="detail.html">
                                                    <img src="{{ Storage::url($details['image']) }}" alt="..." width="70" />
                                                </a>
                                                <div class="ms-3">
                                                    <strong class="h6">
                                                        {{ $details['name'] }}
                                                    </strong>
                                                </div>
                                            </div>
                                        </th>
                    
                                        <td class="p-3 align-middle border-0">
                                            <p class="mb-0 small">${{ $details['price'] }}</p>
                                        </td>
                                        <td class="p-3 align-middle border-0">
                                            <div class="border d-flex align-items-center justify-content-between px-3">
                                                <div class="quantity">
                                                    <button class="dec-btn p-0" onclick="changeQuantity(this, -1, {{ $details['price'] }}, {{ $details['id'] }})">
                                                        <i class="fas fa-caret-left"></i>
                                                    </button>
                                                    <input class="form-control form-control-sm border-0 shadow-0 p-0 quantity-input" type="text" id="quantity-input-{{ $details['id'] }}" value="{{ $details['quantity'] }}" />
                                                    <button class="inc-btn p-0" onclick="changeQuantity(this, 1, {{ $details['price'] }}, {{ $details['id'] }})">
                                                        <i class="fas fa-caret-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3 align-middle border-0">
                                            <p class="mb-0 small total-price" id="total-price-{{ $details['id'] }}">
                                                ${{ $details['price'] * $details['quantity'] }}</p>
                                        </td>
                                        <td class="p-3 align-middle border-0">
                                            <a class="reset-anchor" href="javascript:void(0)"><i class="fas fa-trash-alt small text-muted" onclick="deleteItem(this, {{ $id }})"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    

                    <!-- CART NAV-->
                    <div class="bg-light px-4 py-3">
                        <div class="row align-items-center text-center">
                            <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm"
                                    href="shop.html"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ORDER TOTAL-->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                        <div class="card-body">
                            <h5 class="text-uppercase mb-4">Cart total</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center justify-content-between mb-4">
                                    <strong class="text-uppercase small font-weight-bold">Tổng</strong>
                                    <span class="total-cost">$0</span>

                                </li>
                                <li>
                                    <form action="#">
                                        <div class="input-group mb-0">
                                            <button class="btn btn-dark btn-sm w-100" type="submit"> <i
                                                    class="fas fa-gift me-2" href="checkout.html"></i>Procceed to
                                                checkout</button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
<script>

// Hàm để chọn tất cả các hộp kiểm
function toggleCheckboxes() {
    var selectAllCheckbox = document.getElementById('select-all');
    var checkboxes = document.querySelectorAll('input[type="checkbox"][id^="check-"]');

    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = selectAllCheckbox.checked;
        updateProductTotal(checkboxes[i], parseFloat(checkboxes[i].getAttribute('data-price')), checkboxes[i].getAttribute('data-id'));
    }

    updateTotalCost();
}

// Hàm để cập nhật tổng giá của tất cả các sản phẩm đã chọn
function updateProductTotal(checkbox, price, id) {
    var quantityInput = document.getElementById('quantity-input-' + id);
    var quantity = quantityInput ? parseInt(quantityInput.value) : 0;
    var totalElement = document.getElementById('total-price-' + id);
    var total = checkbox.checked ? price * quantity : 0;

    if (totalElement) {
        totalElement.innerText = '$' + total.toFixed(2);
    }

    updateTotalCost();
}

// Hàm để cập nhật tổng giá của tất cả các sản phẩm đã chọn
function updateTotalCost() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"][id^="check-"]:checked');
    var totalCost = 0;

    checkboxes.forEach(function(checkbox) {
        var price = parseFloat(checkbox.getAttribute('data-price'));
        var id = checkbox.getAttribute('data-id');
        var quantity = parseInt(document.getElementById('quantity-input-' + id).value);
        totalCost += price * quantity;
    });

    var totalCostElement = document.querySelector('.total-cost');
    if (totalCostElement) {
        totalCostElement.textContent = '$' + totalCost.toFixed(2);
    }
}

// Bổ sung thuộc tính data-price và data-id vào các checkbox khi khởi tạo trang
document.addEventListener('DOMContentLoaded', function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"][id^="check-"]');
    checkboxes.forEach(function(checkbox) {
        var id = checkbox.id.split('-')[1];
        var price = document.getElementById('total-price-' + id).innerText.replace('$', '');
        checkbox.setAttribute('data-price', price);
        checkbox.setAttribute('data-id', id);
    });
});





    // xoá sản phẩm !!!
    function deleteItem(button, id) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '/remove-from-cart/' + id;

        var csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';

        form.appendChild(csrfInput);

        document.body.appendChild(form);
        form.submit();
    }
</script>
