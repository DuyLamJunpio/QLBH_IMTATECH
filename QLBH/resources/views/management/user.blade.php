@extends('layout.layout')

@section('content')
    <div class="container mt-5 overflow-auto" style="max-height: 600px">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Danh sách khách hàng</h3>
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
                            <th class="text-center">Fullname</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Tool</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td class="text-center">{{ ++$i }}</td>
                                <td class="text-center">{{ $item->fullname }}</td>
                                <td class="text-center">{{ $item->email }}</td>
                                <td class="text-center">
                                    <a href="{{ route('user_management.detail', ['id' => $item->id]) }}"
                                        class="btn btn-primary">Chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
