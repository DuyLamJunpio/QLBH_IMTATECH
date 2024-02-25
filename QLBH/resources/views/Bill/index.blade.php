@extends('layout.layout')

@section('content')
    <div class="container mt-5 overflow-auto" style="max-height: 600px">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Danh sách hóa đơn</h3>
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
                            <th class="text-center">Mã hóa đơn</th>
                            <th class="text-center">Khách hàng</th>
                            <th class="text-center">Thành tiền</th>
                            <th class="text-center">Tool</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bills as $item)
                            <tr>
                                <td class="text-center">{{ ++$i }}</td>
                                <td class="text-center">{{ $item->id }}</td>
                                <td class="text-center">{{ $item->user_name }}</td>
                                <td class="text-center">{{ $item->total_payment }}</td>

                                <td class="text-center">
                                    {{-- <a href="{{ route('products.delete', ['id' => $item->id]) }}"
                                        class="btn btn-danger">Xoá</a> --}}
                                    <a href="" class="btn btn-danger">Xoá</a>

                                    <a href="{{ route('bill.detail', ['id' => $item->id]) }}" class="btn btn-primary">Chi
                                        tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
