@extends('layout.layout')

@section('content')
    {{-- <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                    alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                <h5>Marie Horwitz</h5>
                                <p>Web Designer</p>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <h6>Projects</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Recent</h6>
                                            <p class="text-muted">Lorem ipsum</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Most Viewed</h6>
                                            <p class="text-muted">Dolor sit amet</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <button type='submit' class='btn btn-success mt-2'>Chọn ảnh</button>
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
                        <div class="col-md-6" style="margin-bottom: 15px"><label class="labels">Tài khoản: </label><input
                                type="text" class="form-control" placeholder="first name"
                                value="{{ auth()->user()->email }}"></div>

                    </div>
                    <div class="col-md-6" style="margin-bottom: 15px"><label class="labels">Họ tên: </label><input
                            type="text" class="form-control" value="{{ auth()->user()->name }}" placeholder="surname">
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12" style="margin-bottom: 15px"><label class="labels">Số điện thoại</label><input
                                type="text" class="form-control" placeholder="enter phone number"
                                value="{{ auth()->user()->phone }}">
                        </div>
                        <div class="col-md-12" style="margin-bottom: 15px"><label class="labels">Địa chỉ: </label><input
                                type="text" class="form-control" placeholder="" value="{{ auth()->user()->add }}"></div>

                        <div class="col-md-12" style="margin-bottom: 15px">
                            <label class="labels">Chức vụ:</label>
                            <span class="font-weight-bold" style="margin-left: 20px">{{ auth()->user()->role }}</span>

                            {{-- <input type="text" class="form-control" placeholder="" value="{{ auth()->user()->role }}"> --}}
                        </div>
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
