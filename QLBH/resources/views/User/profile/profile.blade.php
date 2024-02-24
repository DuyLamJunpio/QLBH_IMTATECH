@extends('User.home.index')
@section('customer')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <form action="{{ route('profile') }}" enctype="multipart/form-data" method="POST">
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
                        </form>
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
                                        <a href="{{ route('change_password') }}" style="text-decoration: none;">Đổi mật
                                            khẩu</a>
                                    </li>
                                </ul>
                                <li class="list-group-item d-flex align-items-center p-3">
                                    <i class='bx bx-task text-success me-2'></i>
                                    <a href="{{ route('user_purchase') }}" style="text-decoration: none;">Đơn mua</a>
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
                }
            });
        });
    </script>

    <script>
        var element = document.getElementById('menudropdown');

        document.getElementById('btndropdown').addEventListener('click', function() {
            var display = window.getComputedStyle(element).getPropertyValue('display');
            if (display === 'none') {
                element.style.display = 'block'; // Hiển thị phần tử nếu nó đang ẩn
            } else {
                element.style.display = 'none'; // Ẩn phần tử nếu nó đang hiển thị
            }
        });
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
@endsection
