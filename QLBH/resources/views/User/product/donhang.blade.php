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
                                <tr>
                                    <th class="ps-0 py-3 border-0" scope="row">
                                        <div class="d-flex align-items-center"><a
                                                class="reset-anchor d-block animsition-link" href="detail.html"><img
                                                    src="{{ Storage::url($product->image) }}" alt="..."
                                                    width="70" /></a>
                                            <div class="ms-3">
                                                <strong class="h6">
                                                    <a class="reset-anchor animsition-link"
                                                        href="detail.html">{{ $product->name }}
                                                    </a>
                                                </strong>
                                                <p class="text-muted">Color: <span>{{ $variant->color }}</span>, Size:
                                                    <span>{{ $variant->size }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="p-3 align-middle border-0 text-center">
                                        <p class="priceDisplay mb-0 small">{{ $product->price }}</p>
                                    </td>
                                    <td class="p-3 align-middle border-0 text-center">
                                        <p class="mb-0 small">{{ $quantity }}</p>
                                    </td>
                                    <td class="p-3 align-middle border-0 text-center">
                                        <p class="priceDisplay mb-0 small">{{ $product->price * $quantity }}</p>
                                    </td>
                                </tr>
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
                                        products</strong><span class="text-muted small">{{ $quantity }}</span></li>
                                <li class="border-bottom my-2"></li>
                                <li class="d-flex align-items-center justify-content-between mb-4"><strong
                                        class="text-uppercase small font-weight-bold">Total</strong><span
                                        class="priceDisplay text-danger">{{ $product->price * $quantity }} VNĐ</span>
                                </li>
                                <li>
                                    <form action="{{ route('order.create') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="products[0][id]" value="{{ $product->id }}">
                                        <input type="hidden" name="products[0][quantity]" value="{{ $quantity }}">
                                        <input type="hidden" name="products[0][variant_id]" value="{{ $variant->id }}">
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
@endsection
