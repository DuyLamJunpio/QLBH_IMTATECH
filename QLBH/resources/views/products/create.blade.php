@extends('layout.layout')

@section('content')
    <div class="container overflow-auto" style="max-height: 500px">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm sản phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('products.index') }}" class='btn btn-primary float-end'>Danh sách sản phẩm</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('products.add') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <strong>Product name</strong>
                                <input type="text" name="name" class="form-control" placeholder="enter product name">
                            </div>
                            <div class="form-group mt-3">
                                <label for="my-input">Ảnh:</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <img id="preview-image" class="mt-3 " src="#" alt="Ảnh sản phẩm"
                                    style="max-width: 300px; border-radius:5px; height:250px">
                            </div>
                            <div class="form-group">
                                <strong>Cost</strong>
                                <input type="number" name="cost" class="form-control" placeholder="enter cost">
                            </div>
                            <div class="form-group">
                                <strong>Price</strong>
                                <input type="number" name="price" class="form-control" placeholder="enter price">
                            </div>
                            <div class="form-group">
                                <strong>Inventory</strong>
                                <input type="number" name="inventory" class="form-control" placeholder="enter inventory">
                            </div>
                            <div class="form-group">
                                <strong>Description</strong>
                                <input type="text" name="description" class="form-control"
                                    placeholder="enter description">
                            </div>
                            <strong>Categories</strong>
                            <select class="form-select mt-2" aria-label="Default select example" name="cat_id">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            {{-- <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    @foreach ($categories as $item)
                                        <input type="radio" class="btn-check" name="cat_id" id="{{ $item->id }}"
                                            autocomplete="off" value="{{ $item->id }}" {{ $item->id == 1 ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary"
                                            for="{{ $item->id }}">{{ $item->name }}</label>
                                    @endforeach
                                </div>
                            </div> --}}
                        </div>
                        <button type='submit' class='btn btn-success mt-2'>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
