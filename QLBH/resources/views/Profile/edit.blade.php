@extends('layout.layout')

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="card-body">
            <form action="{{ route('profile.edit_admin') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3 border-right">
                        {{-- <img src="{{ Storage::url(auth()->user()->image) }}" width="100" alt=""> --}}
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5" width="150px" src="{{ Storage::url(auth()->user()->image) }}">
                            <div class="form-group mt-3">
                                <input type="file" name="image" id="image" class="form-control">
                                <img id="preview-image" class="mt-3 " src="#" alt="ảnh đại diện"
                                    style="max-width: 300px; border-radius:5px; height:250px">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Hồ sơ của tôi</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12" style="margin-bottom: 15px">
                                    <label class="labels">Tài khoản:</label>
                                    <span class="font-weight-bold"
                                        style="margin-left: 20px">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom: 15px; display: flex; align-items: center;">
                                <label class="labels" style="margin-right: 10px;">Họ tên: </label>
                                <input type="text" class="form-control" style="flex: 1" name= "fullname"
                                    value="{{ auth()->user()->fullname }}" placeholder="fullname">
                            </div>

                            <div class="col-md-12" style="margin-bottom: 15px; display: flex; align-items: center;">
                                <label class="labels" style="margin-right: 10px;">Địa chỉ: </label>
                                <input type="text" class="form-control" style="flex: 1" name = "address"
                                    value="{{ auth()->user()->address }}" placeholder="address">
                            </div>

                            <div class="col-md-12" style="margin-bottom: 15px">
                                <label class="labels">Chức vụ:</label>
                                <span class="font-weight-bold"
                                    style="margin-left: 20px">{{ auth()->user()->role == 1 ? 'Admin' : 'Staff' }}</span>
                            </div>

                            <div class="col-md-12" style="margin-bottom: 15px; display: flex; align-items: center;">
                                <label for="labels" style="margin-right: 10px;">Số điện thoại:</label>
                                <input type="text" class="form-control" style="flex: 1" name = "phone"
                                    value="{{ auth()->user()->phone }}" placeholder="phone">
                            </div>

                            <div class="col-md-12" style="margin-bottom: 15px; display: flex; align-items: center;">
                                <label for="labels" style="margin-right: 10px;">Email: </label>
                                <input type="text" class="form-control" style="flex: 1" name = "email"
                                    value="{{ auth()->user()->email }}" placeholder="email">
                            </div>

                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type='submit'>Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
