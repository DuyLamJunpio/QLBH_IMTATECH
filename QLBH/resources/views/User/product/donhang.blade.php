<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mua Hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/fontawesome-free-6.5.1-web/css/all.min.css">
</head>

<body>
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                        <div>
                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                    class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                        </div>
                    </div>

                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">

                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img src="{{ Storage::url($product->image) }}" class="img-fluid rounded-3"
                                        alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">{{ $product->name }}</p>
                                    <p><span class="text-muted">Categories: </span>{{ $product->categories_name }}</p>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="1" name="quantity" value="1" type="number"
                                        class="form-control form-control-sm" />
                                    <button class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="priceDisplay mb-0 text-red">{{ $product->price }}<span
                                            style='color:#fa0303'>
                                            VNĐ</span></h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                                    <div class="card-body p-4">

                                        <form action="{{ route('post_bill') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-lg-4 col-xl-8">
                                                    <div class="row">
                                                        <div class="col-sm-3 d-flex align-items-center">
                                                            <p class="mb-0">Full Name</p>
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
                                                </div>
                                                <div class="col-lg-4 col-xl-3">
                                                    <div class="d-flex justify-content-between"
                                                        style="font-weight: 500;">
                                                        <p class="mb-2">Subtotal</p>
                                                        <p class="priceDisplay mb-2">{{ $product->price }}<span
                                                                style='color:#fa0303'>
                                                                VNĐ</span></p>
                                                    </div>

                                                    <div class="d-flex justify-content-between"
                                                        style="font-weight: 500;">
                                                        <p class="mb-0">Shipping</p>
                                                        <p class="priceDisplay mb-0">50000<span style='color:#fa0303'>
                                                                VNĐ</span></p>
                                                    </div>

                                                    <hr class="my-4">

                                                    <div class="d-flex justify-content-between mb-4"
                                                        style="font-weight: 500;">
                                                        <p class="mb-2">Total (tax included)</p>
                                                        @php
                                                            $total = $product->price + 50000;
                                                        @endphp
                                                        <p class="priceDisplay mb-2" style="color: #fa0303">
                                                            {{ $total }}<span style='color:#fa0303'>
                                                                VNĐ</span></p>
                                                    </div>

                                                    <input type="number" name="user_id"
                                                        value="{{ Auth::user()->id }}" style="display: none">
                                                    <input type="text" name="list_id_product"
                                                        value="{{ $product->id }}" style="display: none">
                                                    <input type="text" name="quantity" value="1"
                                                        style="display: none">
                                                    <input type="text" name="total_payment"
                                                        value="{{ $total }}" style="display: none">

                                                    <div class="card-body">
                                                        <button type="submit"
                                                            class="btn btn-warning btn-block btn-lg">Proceed to
                                                            Pay</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

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


</html>
