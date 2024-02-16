<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Detail Product
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontawesome-free-6.5.1-web/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>


<body>
    <!-- Navbar  -->
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3 bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">IMTA TECH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto"></div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/sanpham">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="width: 100%; height: 100px;"></div>

    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <div class="container">
        <div class="row py-2 ">
            <h3 class="">Detail Product</h3>
        </div>
        <div class="card">
            <div class="container">
                <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                    action="/php/twig/frontend/giohang/themvaogiohang">
                    <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                    <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                    <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                    <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

                    <div class="wrapper row">
                        <div class="col-md-6 col-lg-5 d-none d-md-block ">
                            <img src="{{ Storage::url($product->image) }}" style="width: 400px; height: 400px;"
                                alt="login form" class="img-fluid mt-5 ms-2" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="details col-md-6">
                            <h2 class="fw-bold text-dark">{{ $product->name }}</h2>
                            <div class="rating">
                                <div class="stars">
                                    <i class='bx bxs-star' style='color:#2345de'></i>
                                    <i class='bx bxs-star' style='color:#2345de'></i>
                                    <i class='bx bxs-star' style='color:#2345de'></i>
                                    <i class='bx bx-star' style='color:#2345de'></i>
                                    <i class='bx bx-star' style='color:#2345de'></i>
                                </div>
                                <span class="review-no">999 reviews</span>
                            </div>
                            <small class="text-muted">Giá cũ: <s><span>10,990,000.00 vnđ</span></s></small>
                            <h4 class="price">Giá hiện tại: <span id="priceDisplay"
                                    style='color:#2345de'>{{ $product->price }}</span><span style='color:#2345de'>
                                    VNĐ</span></h4>
                            <h5 class="colors">colors:
                                <span class="color orange not-available" data-toggle="tooltip"
                                    title="Hết hàng"></span>
                                <span class="color green"></span>
                                <span class="color blue"></span>
                            </h5>
                            <h5 class="colors">Số lượng : </h5>
                            <div class="row" style="width: 140px;">
                                <div class="input-group ">
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="subtract-btn">-</button>
                                    <input type="text" class="form-control text-center" id="counter-input"
                                        value="0" readonly>
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="add-btn">+</button>
                                </div>
                            </div>
                            <p>{{ $product->inventory }} sản phẩm có sẵn</p>
                            <div class="action" style="width: 400px;">
                                <a class="btn btn-outline-primary w-50 mt-2" >Thêm vào giỏ hàng</a>
                                <a class="btn btn-danger w-50 mt-2">Mua ngay</a>
                                <a class="btn btn-danger mt-2" href="#"><i class='bx bxs-heart'
                                        style='color:#ffffff'></i></a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-2">
            <div class="container-fluid ">
                <h3 class="m-3">MÔ TẢ SẢN PHẨM</h3>
                <div class="row">
                    <div class="col m-3">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 100) {
                nav.classList.add('bg-light', 'shadow');
                nav.classList.remove('bg-dark', 'shadow');
            } else {
                nav.classList.add('bg-dark', 'shadow');
                nav.classList.remove('bg-light', 'shadow');
            }
        });

        var counter = 0;
        var counterInput = document.getElementById('counter-input');
        var addBtn = document.getElementById('add-btn');
        var subtractBtn = document.getElementById('subtract-btn');

        addBtn.addEventListener('click', function() {
            counter++;
            counterInput.value = counter;
        });

        subtractBtn.addEventListener('click', function() {
            if (counter > 0) {
                counter--;
                counterInput.value = counter;
            }
        });

        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        window.addEventListener('DOMContentLoaded', function() {
            var inputNumber = document.getElementById('priceDisplay').innerText; // Số bạn muốn hiển thị
            console.log(inputNumber);
            var formattedNumber = formatNumber(inputNumber);
            document.getElementById('priceDisplay').textContent = formattedNumber;
        });
    </script>

</body>

</html>
