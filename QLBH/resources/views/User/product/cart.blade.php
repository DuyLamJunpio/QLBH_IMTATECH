@extends('User.home.index')

@section('customer')
    <!-- Modal -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <span id="itemNameToDelete"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger delete"><a id="btnDeleteModal"
                            style="color: white; text-decoration: none;">Delete</a></button>
                </div>
            </div>
        </div>
    </div>

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
                                <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
            <div class="row">
                <form action="{{ route('orders') }}" method="POST">
                    @csrf
                    <div class="container">
                        <!-- CART TABLE-->
                        <div class="table-responsive mb-4">
                            <table class="table text-nowrap">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="border-0 p-3" scope="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkall">
                                            </div>
                                        </th>
                                        <th class="border-0 p-3" scope="col"> <strong
                                                class="text-sm text-uppercase">Product</strong></th>
                                        <th class="border-0 p-3" scope="col"> <strong
                                                class="text-sm text-uppercase">Variations</strong></th>
                                        <th class="border-0 p-3" scope="col"> <strong
                                                class="text-sm text-uppercase">Price</strong></th>
                                        <th class="border-0 p-3" scope="col"> <strong
                                                class="text-sm text-uppercase">Quantity</strong></th>
                                        <th class="border-0 p-3" scope="col"> <strong
                                                class="text-sm text-uppercase">Total</strong></th>
                                        <th class="border-0 p-3" scope="col"> <strong
                                                class="text-sm text-uppercase"></strong></th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @foreach ($carts as $item)
                                        <tr>
                                            <th class="p-3 align-middle border-light">
                                                <div class="form-check">
                                                    <input class="checkitem form-check-input item"
                                                        data-item-id="{{ $item->cart_id }}" type="checkbox"
                                                        value="{{ $item->cart_id }}" id="checkitem">
                                                </div>
                                            </th>
                                            <th class="ps-0 py-3 border-light" scope="row">
                                                <div class="d-flex align-items-center"><a
                                                        class="reset-anchor d-block animsition-link"
                                                        href="{{ route('User.detailprod', ['id' => $item->idProduct]) }}"><img
                                                            src="{{ Storage::url($item->image) }}" alt="..."
                                                            width="70" /></a>
                                                    <div class="ms-3"><strong class="h6"><a
                                                                class="reset-anchor animsition-link"
                                                                href="{{ route('User.detailprod', ['id' => $item->idProduct]) }}">{{ Illuminate\Support\Str::limit($item->name, 30) }}</a></strong>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="p-3 align-middle border-light">
                                                <p class="mb-0 small"><span>Color: </span>{{ $item->color }}</p>
                                                <p class="mb-0 small"><span>Size: </span>{{ $item->size }}</p>
                                            </td>
                                            <td class="p-3 align-middle border-light">
                                                <p class="price mb-0 small">{{ $item->price }}</p>
                                            </td>
                                            <td class="p-3 align-middle border-light">
                                                <div class="border d-flex align-items-center justify-content-center px-3">
                                                    <div class="quantity col">
                                                        <input
                                                            class="quantityInput col form-control form-control-sm border-0 shadow-0 p-0 item"
                                                            type="number" id="{{ $item->id }}"
                                                            data-item-id="{{ $item->cart_id }}" name="quantity"
                                                            value="{{ $item->quantity }}" min="1"
                                                            aria-valuemin="1" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-3 align-middle border-light">
                                                <p class="totalPrice mb-0 small">{{ $item->price * $item->quantity }}</p>
                                            </td>
                                            <td class="p-3 align-middle border-light">
                                                <button type="button" class="deleteItemModal border border-0"
                                                    data-bs-toggle="modal" data-bs-target="#modalDelete"
                                                    data-item-id="{{ $item->cart_id }}">
                                                    <i class="fas fa-trash-alt small text-muted"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- CART NAV-->
                        <div class="bg-light px-4 py-3">
                            <div class="row align-items-center text-center">
                                <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a
                                        class="btn btn-link p-0 text-dark btn-sm" href="{{ route('User.products') }}"><i
                                            class="fas fa-long-arrow-alt-left me-2">
                                        </i>Continue shopping</a>
                                </div>
                                <div class="card border-0 rounded-0 p-lg-4 bg-light">
                                    <div class="card-body">
                                        <h5 class="text-uppercase mb-4">Cart total</h5>
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex align-items-center justify-content-between"><strong
                                                    class="text-uppercase small font-weight-bold">Total payment
                                                    products</strong><span class="text-muted small"
                                                    id="totalProduct">0</span>
                                            </li>
                                            <li class="border-bottom my-2"></li>
                                            <li class="d-flex align-items-center justify-content-between mb-4"><strong
                                                    class="text-uppercase small font-weight-bold">Total</strong><span
                                                    id="totalSum">0</span>
                                            </li>
                                            <li>
                                                <input type="hidden" id="selectedIds" name="selectedIds">
                                                <input type="hidden" id="selectedQuantities" name="selectedQuantities">
                                                <div class="input-group mb-0">
                                                    <div class="col text-md-end d-flex justify-content-center">
                                                        <button type="submit"
                                                            class="btn btn-outline-dark btn-sm">
                                                            Procceed to checkout
                                                            <i class="fas fa-long-arrow-alt-right ms-2"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Đối với mỗi input số lượng
            $('.quantityInput').on('input', function() {
                // Lấy giá trị số lượng
                var quantity = $(this).val();
                // Lấy giá trị giá của mặt hàng tương ứng
                var price = $(this).closest('tr').find('.price').text();
                // Tính toán tổng tiền
                var totalPrice = parseFloat(quantity) * parseFloat(price);
                // Hiển thị tổng tiền trong cùng một hàng
                $(this).closest('tr').find('.totalPrice').text(totalPrice);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Hàm tính tổng
            function calculateTotalSum() {
                var total = 0;
                // Lặp qua tất cả các ô checkbox được chọn
                $('.checkitem:checked').each(function() {
                    // Lấy giá trị totalPrice của mỗi ô được chọn và cộng vào tổng
                    var totalPrice = parseFloat($(this).closest('tr').find('.totalPrice').text());
                    total += totalPrice;
                });
                // Cập nhật tổng vào phần tử có id là "totalSum"
                $('#totalSum').text(total);
            }

            // Lắng nghe sự kiện change trên checkbox "checkall"
            $('#checkall').change(function() {
                // Lấy giá trị (checked hoặc không checked) của checkbox "checkall"
                var isChecked = $(this).prop('checked');

                // Set giá trị của tất cả các checkbox khác thành giá trị của checkbox "checkall"
                $('.checkitem').prop('checked', isChecked);
                var checkedCount = $('.checkitem:checked').length;

                // Đặt số lượng ô được chọn vào phần tử có id "totalProduct"
                $('#totalProduct').text(checkedCount);
                calculateTotalSum();
            });

            // Lắng nghe sự kiện thay đổi trên tất cả các ô checkbox
            $('.checkitem').change(function() {
                // Đếm số lượng ô checkbox được chọn
                var checkedCount = $('.checkitem:checked').length;

                // Đặt số lượng ô được chọn vào phần tử có id "totalProduct"
                $('#totalProduct').text(checkedCount);
                // Khi checkbox thay đổi, tính toán lại tổng
                calculateTotalSum();
            });

            // Lắng nghe sự kiện thay đổi trên tất cả các ô quantity
            $('.quantityInput').on('input', function() {
                // Khi quantity thay đổi, tính toán lại totalPrice của ô
                var quantity = parseFloat($(this).val());
                var price = parseFloat($(this).closest('tr').find('.price').text());
                var totalPrice = quantity * price;
                $(this).closest('tr').find('.totalPrice').text(totalPrice);

                // Sau đó tính toán lại tổng
                calculateTotalSum();
            });
        });
    </script>
    <script>
        $('.deleteItemModal').click(function() {
            var itemId = $(this).data('item-id');
            // Tạo đường dẫn sử dụng itemId
            var deleteUrl = "{{ route('cart.delete', ['id' => ':itemId']) }}";
            deleteUrl = deleteUrl.replace(':itemId', itemId);

            // Đặt thuộc tính href cho button
            $('#btnDeleteModal').attr('href', deleteUrl);
        });
    </script>
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            // Get all checked checkboxes
            var checkedCheckboxes = document.querySelectorAll('.checkitem:checked');

            // Get the IDs of the checked checkboxes
            var ids = Array.from(checkedCheckboxes).map(function(checkbox) {
                return checkbox.value;
            });

            // Get the quantities of the checked checkboxes
            var quantities = ids.map(function(id) {
                // Find the corresponding quantity input
                var quantityInput = document.querySelector('.quantityInput[data-item-id="' + id + '"]');
                return quantityInput ? quantityInput.value : null;
            });

            // Set the value of the hidden inputs to the IDs and quantities
            document.getElementById('selectedIds').value = JSON.stringify(ids);
            document.getElementById('selectedQuantities').value = JSON.stringify(quantities);
        });
    </script>
@endsection
