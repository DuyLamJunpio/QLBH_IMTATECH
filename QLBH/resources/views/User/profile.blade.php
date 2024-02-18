<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/fontawesome-free-6.5.1-web/css/all.min.css">
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

            <div class="collapse navbar-collapse mx-auto" id="navbarNav">
                <div class="mx-auto"></div>
                <ul class="navbar-nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('trangchu') }}">
                            <i class='bx bx-home text-white'></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class='bx bx-package text-white'></i>
                            Product
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class='bx bx-cart text-white'></i>
                            Cart
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ Auth::check() ? route('user_profile') : route('login') }}">
                            <i class='bx bx-user text-white'></i>
                            {{ Auth::user()->fullname }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="width: 100%; height: 100px;"></div>

    <section style="background-color: #eee;">
            <div class="container py-5 mt-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img id="preview-image" src="{{ Storage::url(Auth::user()->image) }}" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                                <input type="file" name="image" id="imageInput" class="form-control"
                                    style="display: none;">
                                <h5 class="my-3">{{ Auth::user()->fullname }}</h5>
                                <button type="button" id="chooseImage" style="display: none;"
                                    class="btn btn-primary mx-auto">Choose image</button>
                                <hr>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li id="btndropdown" class="list-group-item d-flex align-items-center p-3">
                                        <i class='bx bx-user me-2 text-primary'></i>
                                        <p class="mb-0 col">Tài khoản của tôi</p>
                                        <button type="button" style="border: none;background: white;"
                                            class="dropdown-toggle dropdown-toggle-split">
                                        </button>
                                    </li>
                                    <ul id="menudropdown" class="list-group-flush" style="display: none">
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class='bx bxs-user-rectangle text-info me-2'></i>
                                            <a href="{{ route('user_profile') }}" style="text-decoration: none;">Hồ sơ</a>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class='bx bx-lock text-warning-emphasis me-2'></i>
                                            <a href="{{ route('change_password') }}" style="text-decoration: none;">Đổi mật khẩu</a>
                                        </li>
                                    </ul>
                                    <li class="list-group-item d-flex align-items-center p-3">
                                        <i class='bx bx-task text-success me-2'></i>
                                        <p class="mb-0">Đơn mua</p>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center p-3">
                                        <i class='bx bx-log-out text-danger me-2'></i>
                                        <a href="{{ route('logout') }}" style="text-decoration: none;">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        @if (session('success'))
                            <div class="alert alert-primary">
                                {{ session('success') }}
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
    </section>
</body>

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
</script>
<script>
    var contentElements = document.querySelectorAll('.content');
    var editElements = document.querySelectorAll('.edit');
    document.getElementById('editButton').addEventListener('click', function() {
        document.getElementById('save').style.display = 'block';
        document.getElementById('cancel').style.display = 'block';
        document.getElementById('chooseImage').style.display = 'block';
        contentElements.forEach(function(element) {
            element.style.display = 'none';
        });
        editElements.forEach(function(element) {
            element.style.display = 'block';
        });
    });

    document.getElementById('cancel').addEventListener('click', function() {
        document.getElementById('save').style.display = 'none';
        document.getElementById('cancel').style.display = 'none';
        document.getElementById('chooseImage').style.display = 'none';
        contentElements.forEach(function(element) {
            element.style.display = 'block';
        });
        editElements.forEach(function(element) {
            element.style.display = 'none';
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy các phần tử DOM cần thiết
        var chooseImageButton = document.getElementById("chooseImage");
        var imageInput = document.getElementById("imageInput");
        var previewImage = document.getElementById("preview-image");

        // Sự kiện click cho button "Choose image"
        chooseImageButton.addEventListener("click", function() {
            imageInput.click(); // Kích hoạt sự kiện click trên input type=file
        });

        // Sự kiện khi có thay đổi trong input type=file
        imageInput.addEventListener("change", function() {
            var file = this.files[0]; // Lấy file đầu tiên từ danh sách các file được chọn
            if (file) {
                // Đọc file hình ảnh dưới dạng URL
                var reader = new FileReader();
                reader.onload = function(event) {
                    // Hiển thị hình ảnh đã chọn lên thẻ <img>
                    previewImage.src = event.target.result;
                };
                reader.readAsDataURL(file); // Đọc file dưới dạng URL Data
                console.log(reader);
            }
        });
    });
</script>
<script>
    var element = document.getElementById('menudropdown');
    document.getElementById('btndropdown').addEventListener('click', function() {
        var display = window.getComputedStyle(element).getPropertyValue('display');
        if (display === 'none') {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    });
</script>

</html>
