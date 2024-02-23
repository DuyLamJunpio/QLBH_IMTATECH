<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart Interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/fontawesome-free-6.5.1-web/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<style>
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

.dialog {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    z-index: 1000;
}

</style>

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
                            <a class="nav-link" style="color: white" href="{{ route('trangchu') }}">
                                <i class='bx bx-home'></i>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('User.products')}}">
                                <i class='bx bx-package'></i>
                                Product
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart')}}">
                                <i class='bx bx-cart'></i>
                                Cart
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ Auth::check() ? route('user_profile') : route('login') }}">
                                <i class='bx bx-user'></i>
                                {{Auth::user()->fullname}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


    <div style="width: 100%; height: 100px;"></div>

    <div class="container mx-auto mt-4 p-4 border">
        <div class="flex items-center">
            <div class="mr-14 ml-5 mb-9 group">
                <input id="selectAll" type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" onclick="selectAll()">
            </div>
            <div class="mr-20 ml-10 mb-10 group">
                <span class="text-black ">Sản phẩm</span>
            </div>
            <div class="mr-20 ml-28 mb-10 group">
                <span class="text-black">Số lượng</span>
            </div>
            <div class="mr-10 mb-10 ml-12  group">
                <span class="text-black">Đơn giá</span>
            </div>
            <div class="mr-10 ml-10 mb-10 group">
                <span class="text-black">Số tiền</span>
            </div>
            <div class="mr-5 ml-14 mb-10 group">
                <span class="text-black">Thao tác</span>
            </div>
        </div>

        <div id="productList">
            <div class="product flex items-center justify-start mb-10">
                <div class="mr-14 ml-5 group">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" onclick="updateTotal()">
                </div>
                <div class="flex items-center space-x-1 ml-10">
                    <img src="./img/caycanh.jpg" alt="Product Image" class="w-20 h-20 object-cover">
                    <div>
                        <h2 class="text-lg font-bold">Cây cảnh</h2>
                    </div>
                </div>
                <div class="flex items-center space-x-2 ml-20">
                    <button class="decrementBtn px-2 py-1 border" onclick="decrementQuantity(this)">-</button>
                    <input type="text" value="1" class="quantityInput w-12 text-center border"
                        oninput="updateQuantity(this)">
                    <button class="incrementBtn px-2 py-1 border" onclick="incrementQuantity(this)">+</button>
                </div>

                <div class="font-bold mr-10 ml-24">
                    <div class="text-sm font-bold price">₫59.000</div>
                </div>
                <div class="text-sm font-bold ml-10 total">₫59.000</div>
                <div id="deleteDialog" class="dialog hidden">
                    <div class="dialog-content">
                        <h2 class="text-lg font-bold mb-4">Bạn có chắc chắn muốn xoá không?</h2>
                        <div class="flex justify-end">
                            <button onclick="deleteItem()" class="px-4 py-2 mr-2 bg-red-500 text-white rounded hover:bg-red-600">Có</button>
                            <button onclick="closeDialog()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Không</button>
                        </div>
                    </div>
                </div>
                <div id="overlay" class="overlay hidden"></div>
                <div class="flex flex-col mr-10 ml-10 space-y-1">
                    <i class="fas fa-trash ml-20 text-red-600" onclick="openDialog()"></i>
                </div>


            </div>
        </div>



    </div>
    <footer class="fixed bottom-0 left-0 right-0 bg-yellow-200 w-full">
        <div class="p-4 flex items-center justify-between">
            <div class="flex items-center">
                <span class="mr-2">Số lượng:</span>
                <span id="productCount">10</span>
            </div>
            <div id="totalAmount" class="justify-center">
                Tổng thanh toán: ₫0
            </div>

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg">
                Mua Hàng
            </button>
        </div>
    </footer>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<script>
    var priceElement = document.getElementById("price");
    var quantityInput = document.getElementById("quantityInput");

    var initialPrice = parseInt(priceElement.textContent.replace(/\D/g, ''));
    var selectAllCheckbox = document.getElementById("selectAll");
    var otherCheckboxes = document.querySelectorAll('input[type="checkbox"]:not(#selectAll)');

    function openDialog() {
    const dialog = document.getElementById('deleteDialog');
    const overlay = document.getElementById('overlay');
    dialog.classList.remove('hidden');
    overlay.classList.remove('hidden');
}

function closeDialog() {
    const dialog = document.getElementById('deleteDialog');
    const overlay = document.getElementById('overlay');
    dialog.classList.add('hidden');
    overlay.classList.add('hidden');
}

function deleteItem() {
    console.log("Xoá sản phẩm");
    closeDialog();
}


    function selectAll() {
        const selectAllCheckbox = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.form-checkbox');

        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });

        updateTotal();
    }

    function updateTotal() {
        const products = document.querySelectorAll('.product');
        let totalAmount = 0;

        products.forEach(product => {
            const checkbox = product.querySelector('input[type="checkbox"]');
            const priceText = product.querySelector('.price').innerText.replace('₫', '').replace('.', '');
            const price = parseInt(priceText);
            const quantity = parseInt(product.querySelector('.quantityInput').value);

            if (checkbox.checked) {
                const totalPrice = price * quantity;
                product.querySelector('.total').textContent = `₫${totalPrice.toLocaleString()}`;
                totalAmount += totalPrice;
            }
        });

        const totalAmountElement = document.getElementById('totalAmount');
        totalAmountElement.textContent = `Tổng thanh toán: ₫${totalAmount.toLocaleString()}`;
    }

    function decrementQuantity(button) {
        const product = button.closest('.product');
        const quantityInput = product.querySelector('.quantityInput');
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantity--;
            quantityInput.value = quantity;
            updateTotal();
            updatePrice(product, quantity);
        }
    }

    function incrementQuantity(button) {
        const product = button.closest('.product');
        const quantityInput = product.querySelector('.quantityInput');
        let quantity = parseInt(quantityInput.value);
        quantity++;
        quantityInput.value = quantity;
        updateTotal();
        updatePrice(product, quantity);
    }

    function updatePrice(product, quantity) {
        const priceText = product.querySelector('.price').innerText.replace('₫', '').replace('.', '');
        const price = parseInt(priceText);
        const totalPrice = price * quantity;
        product.querySelector('.total').textContent = `₫${totalPrice.toLocaleString()}`;
    }

    function changeQuantity(input) {
        const product = input.closest('.product');
        let quantity = parseInt(input.value);
        if (isNaN(quantity) || quantity == 0) {
            quantity = 1;
        }
        input.value = quantity;
        updateTotal();
        updatePrice(product, quantity);
    }

    selectAllCheckbox.addEventListener("click", function () {
        otherCheckboxes.forEach(function (checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
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
