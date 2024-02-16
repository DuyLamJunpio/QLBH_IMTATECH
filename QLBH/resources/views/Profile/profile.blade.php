@extends('layout.layout')

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    {{-- <button type='submit' class='btn btn-success mt-2'>Chọn ảnh</button> --}}
                    <div class="form-group mt-3">
                        <input type="file" name="image" id="image" class="form-control">
                        <img id="preview-image" class="mt-3 " src="#" alt="ảnh đại diện"
                            style="max-width: 300px; border-radius:5px; height:250px">
                    </div>
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
                        <input type="text" class="form-control" style="flex: 1" value="{{ auth()->user()->name }}"
                            placeholder="surname">
                    </div>

                    <div class="col-md-12" style="margin-bottom: 15px; display: flex; align-items: center;">
                        <label class="labels" style="margin-right: 10px;">Địa chỉ: </label>
                        <input type="text" style="flex: 1" class="form-control" placeholder=""
                            value="{{ auth()->user()->add }}">
                    </div>

                    <div class="col-md-12" style="margin-bottom: 15px">
                        <label class="labels">Chức vụ:</label>
                        <span class="font-weight-bold" style="margin-left: 20px">{{ auth()->user()->role }}</span>
                    </div>

                    <div class="col-md-12" style="margin-bottom: 15px;">
                        <label for="labels">Số điện thoại:</label>
                        <span class="font-weight-bold" style="margin: 15px 15px">*******774</span>
                        <a href="">Thay đổi</a>
                    </div>

                    <div class="col-md-12" style="margin-bottom: 15px;">
                        <label for="labels">Email: </label>
                        <span class="font-weight-bold" style="margin: 15px 15px">dx******@gmail.com</span>
                        <a href="">Thay đổi</a>
                    </div>

                    <div class="col-md-12">
                        <label for="labels">Mật khẩu:</label>
                        <span class="font-weight-bold" style="margin: 15px 15px">********</span>
                        <a href="">Thay đổi</a>
                    </div>

                    <div class="mt-5 text-center">
                        <a href="{{ route('profile.index') }}"></a>
                        <button class="btn btn-primary profile-button" type="button">Lưu</button>
                    </div>


                </div>
            </div>
            {{-- <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                            Experience</span><span class="border px-3 p-1 add-experience"><i
                                class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text"
                            class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text"
                            class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div> --}}
        </div>
    </div>
    </div>
    </div>
@endsection
