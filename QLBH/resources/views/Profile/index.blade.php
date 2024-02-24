@extends('layout.layout')

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    {{-- <img src="{{ Storage::url(auth()->user()->image) }}" width="100" alt=""> --}}
                    <img class="rounded-circle mt-5" width="150px" src="{{ Storage::url(auth()->user()->image) }}">
                    <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
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
                            <span class="font-weight-bold" style="margin-left: 20px">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 15px; display: flex; align-items: center;">
                        <label class="labels" style="margin-right: 10px;">Họ tên: </label>
                        <span class="font-weight-bold" style="margin-left: 20px">{{ auth()->user()->fullname }}</span>
                    </div>

                    <div class="col-md-12" style="margin-bottom: 15px; display: flex; align-items: center;">
                        <label class="labels" style="margin-right: 10px;">Địa chỉ: </label>
                        <span class="font-weight-bold" style="margin-left: 20px">{{ auth()->user()->address }}</span>
                    </div>

                    <div class="col-md-12" style="margin-bottom: 15px">
                        <label class="labels">Chức vụ:</label>
                        <span class="font-weight-bold"
                            style="margin-left: 20px">{{ auth()->user()->role == 1 ? 'Admin' : 'Staff' }}</span>
                    </div>

                    <div class="col-md-12" style="margin-bottom: 15px;">
                        <label for="labels">Số điện thoại:</label>
                        <span class="font-weight-bold" style="margin: 15px 15px">*******774</span>
                    </div>

                    <div class="col-md-12" style="margin-bottom: 15px;">
                        <label for="labels">Email: </label>
                        <span class="font-weight-bold" style="margin: 15px 15px">dx******@gmail.com</span>
                    </div>

                    <div class="col-md-12">
                        <label for="labels">Mật khẩu:</label>
                        <span class="font-weight-bold" style="margin: 15px 15px">********</span>
                        <a href="{{ route('profile.edit_pass') }}">Thay đổi</a>
                    </div>

                    <div class="mt-5 text-center">
                        <a href="{{ route('profile.edit_admin') }}">
                            <button class="btn btn-primary profile-button" type='submit'>Sửa</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
