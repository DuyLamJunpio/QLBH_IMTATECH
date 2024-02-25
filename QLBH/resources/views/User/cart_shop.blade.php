<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/fontawesome-free-6.5.1-web/css/all.min.css">

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

    .product h5 {
        max-width: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
    }

    .product {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .quantityInput,
    .price,
    .total {
        min-width: 80px;
    }

    @media (max-width: 768px) {
        .product h5 {
            max-width: 150px;
        }

    }

    .text-sm {
        max-width: 50px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
    }
</style>

<body>
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3 bg-dark">
        <div class="container">
            <a class="navbar-brand" href="https://www.imtatech.com/gioi-thieu">IMTA TECH</a>

            <ul class="navbar-nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('trangchu') }}">
                        <i class='bx bx-home text-white'></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/sanpham">
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

    </nav>



    <div style="width: 100%; height: 100px;"></div>

    <div class="container mt-4 p-4 border justify-center al">
        <div class="flex items-center">
            <div class="mr-14 ml-5 mb-9 group">
                <input id="selectAll" type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"
                    onclick="selectAll() ">
            </div>
            <div class="mr-20 ml-20 mb-10 group">
                <span class="text-black ">Sản phẩm</span>
            </div>
            <div class="mr-20 ml-28 mb-10 group">
                <span class="text-black">Số lượng</span>
            </div>
            <div class="mr-16 mb-10 ml-10  group">
                <span class="text-black">Đơn giá</span>
            </div>
            <div class="mr-10 ml-12 mb-10 group">
                <span class="text-black">Số tiền</span>
            </div>
            <div class="mr-5 ml-16 mb-10 group">
                <span class="text-black">Thao tác</span>
            </div>
        </div>

        <div id="productList">
            @foreach ($cart as $product)
                <div class="product flex items-center justify-start mb-10 ">
                    <div class="mr-14 ml-5 group">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 product-checkbox"
                            value="{{ $product['id'] }}" data-price="{{ $product['price'] }}"
                            data-quantity="{{ $product['quantity'] }}">
                    </div>
                    <div class="flex items-center space-x-1 ml-10">
                        <img src="{{ Storage::url($product['image']) }}" alt="Product Image"
                            class="w-20 h-20 object-cover">
                        <div class="w-full max-w-md">
                            <h5 class="whitespace-truncate">{{ $product['name'] }}</h5>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 ml-20">
                        <button class="decrementBtn px-2 py-1 border" data-product-id="{{ $product['id'] }}">-</button>
                        <input type="text" value="{{ $product['quantity'] }}"
                            class="quantityInput w-12 text-center border" data-product-id="{{ $product['id'] }}"
                            data-price="{{ $product['price'] }}">
                        <button class="incrementBtn px-2 py-1 border" data-product-id="{{ $product['id'] }}">+</button>
                    </div>

                    <div class="font-bold mr-10 ml-24">
                        <div class="text-sm font-bold price">${{ $product['price'] }}</div>
                    </div>


                    <div class="text-sm font-bold ml-10 total whitespace-truncate"
                        data-product-id="{{ $product['id'] }}">
                        ${{ $product['price'] * $product['quantity'] }}
                    </div>


                    <div class="cart-item" id="product-{{ $product['id'] }}">
                        <i class="fas fa-trash ml-20 text-red-600" data-id="{{ $product['id'] }}"
                            onclick="deleteItem(this)"></i>
                    </div>

                </div>
            @endforeach
        </div>


    </div>

    <footer class="fixed bottom-0 left-0 right-0 bg-yellow-200 w-full">
        <div class="p-4 flex items-center justify-between">
            <div class="flex items-center">
                <span class="mr-2">Số lượng:</span>
                <span id="productCount">10</span>
            </div>
            <div id="totalAmount" class="justify-center">
                Tổng thanh toán: $0
            </div>

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg">
                Mua Hàng
            </button>
        </div>
    </footer>



</body>


<script>
    let currentProductId = null;

    function openDialog(element) {
        var productId = element.getAttribute('data-id');
        currentProductId = productId;
        document.getElementById('deleteDialog-' + productId).classList.remove('hidden');
        document.getElementById('overlay-' + productId).classList.remove('hidden');
    }

    function deleteItem(element) {
        var productId = element.getAttribute('data-id');
        fetch(`/cart/${productId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(response => response.json()).then(data => {
            if (data.success) {
                var productElement = document.getElementById('product-' + productId);
                if (productElement) {
                    var parentProductElement = productElement.closest('.product');
                    if (parentProductElement) {
                        parentProductElement.remove();
                    }
                }
            } else {
                console.error('Error:', data.error);
            }
        }).catch(error => {
            console.error('Error:', error);
        });
    }

    function closeDialog(elsment) {
        document.getElementById('deleteDialog').classList.add('hidden');
        document.getElementById('overlay').classList.add('hidden');
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        function calculateTotals() {
            let totalAmount = 0;
            let productCount = 0;
            document.querySelectorAll('.product-checkbox:checked').forEach(function(checkbox) {
                const quantity = parseInt(checkbox.parentElement.nextElementSibling.nextElementSibling
                    .querySelector('.quantityInput').value);
                const price = parseFloat(checkbox.parentElement.nextElementSibling.nextElementSibling
                    .nextElementSibling.querySelector('.price').textContent.replace('$', ''));
                productCount += quantity;
                totalAmount += price * quantity;
            });
            document.getElementById('productCount').textContent = productCount;
            document.getElementById('totalAmount').textContent = 'Tổng thanh toán: $' + totalAmount.toFixed(2);
        }

        document.querySelectorAll('.product-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', calculateTotals);
        });


        calculateTotals();
    });
</script>

<script>
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('incrementBtn') || event.target.classList.contains(
            'decrementBtn')) {

            const productId = event.target.getAttribute('data-product-id');
            const quantityInput = document.querySelector(`input.quantityInput[data-product-id="${productId}"]`);
            let quantity = parseInt(quantityInput.value);
            if (event.target.classList.contains('incrementBtn')) {
                quantity++;
            } else {
                quantity = Math.max(1, quantity - 1);
            }
            quantityInput.value = quantity;


            const price = parseFloat(quantityInput.getAttribute('data-price'));


            const total = quantity * price;


            const totalElement = document.querySelector(`.total[data-product-id="${productId}"]`);
            if (totalElement) {
                totalElement.textContent = '$' + total.toFixed(2);
            }
        }
    });
</script>

<script>
    var priceElement = document.getElementById("price");
    var quantityInput = document.getElementById("quantityInput");

    var initialPrice = parseInt(priceElement.textContent.replace(/\D/g, ''));
    var selectAllCheckbox = document.getElementById("selectAll");
    var otherCheckboxes = document.querySelectorAll('input[type="checkbox"]:not(#selectAll)');



    // function closeDialog() {
    //     const dialog = document.getElementById('deleteDialog');
    //     const overlay = document.getElementById('overlay');
    //     if (dialog && overlay) {
    //         dialog.classList.add('hidden');
    //         overlay.classList.add('hidden');
    //     }
    // }



    function selectAll() {
        const selectAllCheckbox = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.form-checkbox');

        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });

        updateTotal();
    }

    function updateTotal() {
        let totalAmount = 0;
        let productCount = 0;
        document.querySelectorAll('.product-checkbox:checked').forEach(function(checkbox) {
            const quantity = parseInt(checkbox.parentElement.nextElementSibling.nextElementSibling
                .querySelector('.quantityInput').value);
            const price = parseFloat(checkbox.parentElement.nextElementSibling.nextElementSibling
                .nextElementSibling.querySelector('.price').textContent.replace('$', ''));
            productCount += quantity;
            totalAmount += price * quantity;
        });
        document.getElementById('productCount').textContent = productCount;
        document.getElementById('totalAmount').textContent = 'Tổng thanh toán: $' + totalAmount.toFixed(2);
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
</script>

</html>
