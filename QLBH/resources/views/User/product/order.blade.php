@extends('User.home.index')
@section('customer')
    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Checkout</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-dark" href="cart.html">Cart</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Checkout</h2>
            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <!-- CART TABLE-->
                    <div class="table-responsive mb-4">
                        <table class="table text-nowrap">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 p-3 text-center" scope="col"> <strong
                                            class="text-sm text-uppercase">Product</strong></th>
                                    <th class="border-0 p-3 text-center" scope="col"> <strong
                                            class="text-sm text-uppercase">Price</strong></th>
                                    <th class="border-0 p-3 text-center" scope="col"> <strong
                                            class="text-sm text-uppercase">Quantity</strong></th>
                                    <th class="border-0 p-3 text-center" scope="col"> <strong
                                            class="text-sm text-uppercase">Total</strong></th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
                                @foreach ($carts as $item)
                                    <tr>
                                        <th class="ps-0 py-3 border-0" scope="row">
                                            <div class="d-flex align-items-center"><a
                                                    class="reset-anchor d-block animsition-link" href="detail.html"><img
                                                        src="{{ Storage::url($item->image) }}" alt="..."
                                                        width="70" /></a>
                                                <div class="ms-3">
                                                    <strong class="h6">
                                                        <a class="reset-anchor animsition-link"
                                                            href="detail.html">{{ $item->name }}
                                                        </a>
                                                    </strong>
                                                    <p class="text-muted">Color: <span>{{ $item->color }}</span>, Size:
                                                        <span>{{ $item->size }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="p-3 align-middle border-0 text-center">
                                            <p class="price priceDisplay mb-0 small">{{ $item->price }}</p>
                                        </td>
                                        <td class="p-3 align-middle border-0 text-center">
                                            <p class="quantityText  mb-0 small">{{ $selectedQuantities[$loop->index] }}</p>
                                        </td>
                                        <td class="p-3 align-middle border-0 text-center">
                                            <p class="price_total priceDisplay mb-0 small"></p>
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
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-uppercase mb-4">Delivery Address</h5>
                                    <div class="row">
                                        <div class="col-sm-3 d-flex align-items-center">
                                            <p class="mb-0">Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0 content">
                                                {{ Auth::user()->fullname }}
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3 d-flex align-items-center">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0 content">{{ Auth::user()->email }}
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3 d-flex align-items-center">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0 content">{{ Auth::user()->phone }}
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3 d-flex align-items-center">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0 content">
                                                {{ Auth::user()->address }}
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <h5 class="text-uppercase mb-4">Cart total</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center justify-content-between"><strong
                                        class="text-uppercase small font-weight-bold">Total payment
                                        products</strong><span class="text-muted small" id="total_prod">0</span></li>
                                <li class="border-bottom my-2"></li>
                                <li class="d-flex align-items-center justify-content-between mb-4"><strong
                                        class="text-uppercase small font-weight-bold">Total</strong><span
                                        class="priceDisplay text-danger" id="totalPrice"></span>
                                </li>
                                <li>
                                    <form action="{{ route('order.create') }}" method="POST">
                                        @csrf
                                        @foreach ($carts as $item)
                                            <input type="hidden" name="products[{{ $loop->index }}][id]"
                                                value="{{ $item->idProduct }}">
                                            <input type="hidden" name="products[{{ $loop->index }}][quantity]"
                                                value="{{ $selectedQuantities[$loop->index] }}">
                                            <input type="hidden" name="products[{{ $loop->index }}][variant_id]"
                                                value="{{ $item->idVariant }}">
                                        @endforeach
                                        <div class="input-group mb-0">
                                            <button class="btn btn-warning btn-sm w-100 text-white fw-bold"
                                                type="submit"> <i class="fas fa-gift me-2 text-white"></i>Place
                                                Order</button>
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

    <script>
        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        window.addEventListener('DOMContentLoaded', function() {
            var elements = document.querySelectorAll(
                '.priceDisplay'); // Lấy tất cả các phần tử có class là 'priceDisplay'

            elements.forEach(function(element) {
                var inputNumber = element.innerText; // Lấy giá trị nội dung của phần tử
                var formattedNumber = formatNumber(inputNumber); // Định dạng số
                element.textContent = formattedNumber; // Gán nội dung đã định dạng vào phần tử
            });
        });
    </script>
    <script>
        var priceElements = document.querySelectorAll('.price');
        var prices = Array.from(priceElements).map(function(element) {
            return element.textContent; // or element.innerText
        });

        var quantityTexts = document.querySelectorAll('.quantityText');
        var quantities = Array.from(quantityTexts).map(function(p) {
            return p.textContent;
        });
        var totalPrices = quantities.map(function(quantity, i) {
            return Number(quantity) * Number(prices[i]);
        });

        var totalPriceElements = document.querySelectorAll('.price_total');

        totalPrices.forEach(function(totalPrice, i) {
            if (totalPriceElements[i]) {
                totalPriceElements[i].textContent = totalPrice;
            }
        });

        var total = totalPrices.reduce(function(sum, i) {
            return sum + Number(i);
        }, 0);
        document.getElementById('totalPrice').innerText = total + ' VNĐ';
    </script>
    <script>
        var quantities = {!! json_encode($selectedQuantities) !!};
        var total = quantities.reduce(function(sum, quantity) {
            return sum + Number(quantity);
        }, 0);
        document.getElementById('total_prod').innerText = total;
    </script>
@endsection
