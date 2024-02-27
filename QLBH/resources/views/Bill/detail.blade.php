@extends('layout.layout')

@section('content')
    <div class="container mt-5 overflow-auto" style="max-height: 600px">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Chi tiết hóa đơn - ID: {{ $bills->id }}</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle float-end" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Trạng thái đơn hàng
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Hoàn thành</a></li>
                                <li><a class="dropdown-item" href="#">Chưa hoàn thành</a></li>
                            </ul>
                        </div>
                        {{-- <a href="{{ route('products.add') }}" class='btn btn-primary float-end'>Trạng thái</a> --}}
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h2 class="my-3">Thông tin khách hàng</h5>
                                    <img src="{{ Storage::url($users->image) }}" width="50" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3">Họ tên: {{ $users->fullname }}</h5>
                                    <h5 class="my-3">Email: {{ $users->email }}</h5>
                                    <h5 class="my-3">Địa chỉ: {{ $users->address }}</h5>
                                    <h5 class="my-3">SĐT: {{ $users->phone }}</h5>
                                    {{-- <a href="{{ route('profile.edit_admin') }}">
                                        <div class="d-flex justify-content-center mb-2">
                                            <button type="submit" class="btn btn-primary profile-button">Trạng thái đơn
                                                hàng</button>
                                        </div>
                                    </a> --}}
                            </div>
                        </div>
                    </div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="col-lg-8">
                        <table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th class="text-center">Tên sản phẩm</th>
                                    <th class="text-center">Loại sản phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Thành tiền</th>
                                    <th class="text-center">Tạo ngày</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bill_detail as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->product_name }}</td>
                                        <td class="text-center">{{ $item->category_name }}</td>
                                        <td class="text-center">{{ $item->quantity }}</td>
                                        <td class="text-center">{{ $item->product_price }}</td>
                                        <td class="text-center">{{ $item->total_payment }}</td>
                                        {{-- <td class="text-center">{{ $item->create_at }}</td>

                                        <td class="text-center">
                                            {{-- <a href="{{ route('products.delete', ['id' => $item->id]) }}"
                                                class="btn btn-danger">Xoá</a>
                                            <a href="" class="btn btn-danger">Xoá</a> --}}

                                        {{-- <a href="{{ route('bill.detail', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Chi
                                                tiết</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>




            </div>
        </div>
    </div>
@endsection
