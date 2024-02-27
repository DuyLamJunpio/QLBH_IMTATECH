@extends('layout.layout')

@section('content')
    {{-- variant layout --}}
    <div class="container overflow-auto" style="max-height: 650px">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Sửa biến thể</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('products.variant', ['id' => $variant->product_id]) }}" class='btn btn-primary float-end'>Danh sách biến thể</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('products.variant.edit', ['id' => $variant->id,'idProduct' => $variant->product_id]) }}" method="POST">
                    @csrf
                    <div class="container">
                        <label for="dynamic-color" class="fw-bold">Select color:</label>
                        <div class="input-group">
                            <select class="form-control" id="dynamic-color" name="color">
                                @php
                                    $seenColors = [];
                                @endphp
                                @foreach ($variants_With_IdProduct as $item)
                                    @if (!in_array($item->color, $seenColors))
                                        <option {{ $item->color == $variant->color ? 'selected' : '' }} value="{{ $item->color }}">{{ $item->color }}</option>
                                        @php
                                            $seenColors[] = $item->color;
                                        @endphp
                                    @endif
                                @endforeach
                                <!-- Add a special option for adding new item -->
                                <option value="add-new-color">Add New Color</option>
                            </select>
                            <!-- Input field for adding new item -->
                            <input type="text" class="form-control d-none" id="new-item-color"
                                placeholder="Enter New Color">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary rounded-0 rounded-end-1 d-none" type="button"
                                    id="button-add-color">Add</button>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <label for="dynamic-sz" class="fw-bold">Select size:</label>
                        <div class="input-group">
                            <select class="form-control" id="dynamic-sz" name="size">
                                @php
                                    $seenSizes = [];
                                @endphp
                                @foreach ($variants_With_IdProduct as $item)
                                    @if (!in_array($item->size, $seenSizes))
                                        <option {{ $item->size == $variant->size ? 'selected' : '' }} value="{{ $item->size }}">{{ $item->size }}</option>
                                        @php
                                            $seenSizes[] = $item->size;
                                        @endphp
                                    @endif
                                @endforeach
                                <!-- Add a special option for adding new item -->
                                <option value="add-new-sz">Add New Size</option>
                            </select>
                            <!-- Input field for adding new item -->
                            <input type="text" class="form-control d-none" id="new-item-sz"
                                placeholder="Enter New Size">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary rounded-0 rounded-end-1 d-none" type="button"
                                    id="button-add-sz">Add</button>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-2">
                        <label class="fw-bold">Quantity:</label>
                        <div class="input-group">
                            <input type="number" class="form-control col" placeholder="Enter quantity"
                                name="stock_quantity" value="{{ $variant->stock_quantity }}" min="1">
                            <button class="btn btn-outline-success col" type="submit" id="button-addon2">Sửa biến
                                thể</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dynamic-color').change(function() {
                if ($(this).val() == 'add-new-color') {
                    $('#new-item-color').removeClass('d-none').focus();
                    $('#button-add-color').removeClass('d-none').focus();
                } else {
                    $('#new-item-color').addClass('d-none').val('');
                    $('#button-color').addClass('d-none').val('');
                }
            });

            if ($('#dynamic-color option').length === 1 && $('#dynamic-color option:first-child').val() ===
                'add-new-color') {
                // Nếu chỉ có một tùy chọn và giá trị đầu tiên là 'add-new-color', hiển thị ô input và nút
                $('#new-item-color').removeClass('d-none');
                $('#button-add-color').removeClass('d-none');
            }

            $('#button-add-color').click(function() {
                // Lấy giá trị đã nhập từ ô input
                var newItemValue = $('#new-item-color').val().trim()
            .toUpperCase(); // Chuyển về chữ thường để so sánh

                // Kiểm tra nếu giá trị đã nhập không rỗng
                if (newItemValue !== '') {
                    // Tìm xem giá trị đã nhập có tồn tại trong select hay không
                    var existingOption = $('#dynamic-color option').filter(function() {
                        return $(this).text().trim().toUpperCase() === newItemValue;
                    });

                    // Nếu không tìm thấy, thêm mới giá trị
                    if (existingOption.length === 0) {
                        // Tạo một option mới với giá trị đã nhập
                        var newOption = $('<option>').attr('value', newItemValue).text(newItemValue);
                        // Thêm option mới vào select trước option "Add New Item"
                        $('#dynamic-color option[value="add-new-color"]').before(newOption);
                        // Chọn option mới thêm vào
                        newOption.prop('selected', true);
                    } else {
                        // Nếu tìm thấy, chọn giá trị đó
                        existingOption.prop('selected', true);
                    }

                    // Ẩn ô input
                    $('#new-item-color').addClass('d-none').val('');
                    // Ẩn nút "Add"
                    $('#button-add-color').addClass('d-none').val('');
                }
            });



        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dynamic-sz').change(function() {
                if ($(this).val() == 'add-new-sz') {
                    $('#new-item-sz').removeClass('d-none').focus();
                    $('#button-add-sz').removeClass('d-none').focus();
                } else {
                    $('#new-item-sz').addClass('d-none').val('');
                    $('#button-sz').addClass('d-none').val('');
                }
            });

            if ($('#dynamic-sz option').length === 1 && $('#dynamic-sz option:first-child').val() ===
                'add-new-sz') {
                // Nếu chỉ có một tùy chọn và giá trị đầu tiên là 'add-new-color', hiển thị ô input và nút
                $('#new-item-sz').removeClass('d-none');
                $('#button-add-sz').removeClass('d-none');
            }

            $('#button-add-sz').click(function() {
                // Lấy giá trị đã nhập từ ô input
                var newItemValue = $('#new-item-sz').val().trim()
            .toUpperCase(); // Chuyển về chữ thường để so sánh

                // Kiểm tra nếu giá trị đã nhập không rỗng
                if (newItemValue !== '') {
                    // Tìm xem giá trị đã nhập có tồn tại trong select hay không
                    var existingOption = $('#dynamic-sz option').filter(function() {
                        return $(this).text().trim().toUpperCase() === newItemValue;
                    });

                    // Nếu không tìm thấy, thêm mới giá trị
                    if (existingOption.length === 0) {
                        // Tạo một option mới với giá trị đã nhập
                        var newOption = $('<option>').attr('value', newItemValue).text(newItemValue);
                        // Thêm option mới vào select trước option "Add New Item"
                        $('#dynamic-sz option[value="add-new-sz"]').before(newOption);
                        // Chọn option mới thêm vào
                        newOption.prop('selected', true);
                    } else {
                        // Nếu tìm thấy, chọn giá trị đó
                        existingOption.prop('selected', true);
                    }

                    // Ẩn ô input
                    $('#new-item-sz').addClass('d-none').val('');
                    // Ẩn nút "Add"
                    $('#button-add-sz').addClass('d-none').val('');
                }
            });
        });
    </script>
@endsection
