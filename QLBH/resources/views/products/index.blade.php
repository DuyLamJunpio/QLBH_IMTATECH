@extends('layout.layout')

@section('content')
    <div class="container overflow-auto" style="max-height: 650px">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>QUẢN LÝ SẢN PHẨM</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('products.add') }}" class='btn btn-primary float-end'>Thêm mới</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Cost</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Categories</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Tool</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td class="text-center">{{ ++$i }}</td>
                                <td class="text-center">{{ $item->name }}</td>
                                <td class="text-center"><img src="{{ Storage::url($item->image) }}" width="50" alt=""></td>
                                <td class="text-center">{{ $item->cost }}</td>
                                <td class="text-center">{{ $item->price }}</td>
                                <td class="text-center">{{ $item->categories_name }}</td>
                                <td class="text-center description-cell clickable" style="max-width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                    <span class="description">{{ $item->description }}</span>
                                    <button class="toggle-description">Xem thêm</button>
                                </td>
                                <td class="text-center">
                                    <div class="d-grid gap-2">
                                        <div class="d-flex">
                                            <a href="{{ route('products.edit', ['id' => $item->id]) }}" class="btn btn-warning me-2">Sửa</a>
                                            <a href="{{ route('products.delete', ['id' => $item->id]) }}" class="btn btn-danger">Xoá</a>
                                        </div>
                                        <a href="{{ route('products.variant', ['id' => $item->id]) }}" class="btn btn-info mt-2">Biến thể</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
