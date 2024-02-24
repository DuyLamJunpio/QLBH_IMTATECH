@extends('User.profile.profile')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <h3 class="col">Hồ Sơ Của Tôi</h3>
                <div class="col d-flex flex-row-reverse mb-2">
                    <button id="editButton" type="button" style="border: none"><i class='bx bx-edit'></i></button>
                </div>
            </div>
            <hr>
            <form action="{{ route('profile') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-3 d-flex align-items-center">
                        <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0 content">{{ Auth::user()->fullname }}</p>
                        <input type="text" name="fullname" class="form-control text-muted mb-0 edit"
                            value="{{ Auth::user()->fullname }}" style="display: none;">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3 d-flex align-items-center">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0 content">{{ Auth::user()->email }}</p>
                        <input type="email" name="email" class="form-control text-muted mb-0 edit"
                            value="{{ Auth::user()->email }}" style="display: none;">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3 d-flex align-items-center">
                        <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0 content">{{ Auth::user()->phone }}</p>
                        <input type="text" name="phone" class="form-control text-muted mb-0 edit"
                            value="{{ Auth::user()->phone }}" style="display: none;">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3 d-flex align-items-center">
                        <p class="mb-0">Age</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0 content">{{ Auth::user()->age }}</p>
                        <input type="text" name="age" class="form-control text-muted mb-0 edit"
                            value="{{ Auth::user()->age }}" style="display: none;">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3 d-flex align-items-center">
                        <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0 content">{{ Auth::user()->address }}</p>
                        <input type="text" name="address" class="form-control text-muted mb-0 edit"
                            value="{{ Auth::user()->address }}" style="display: none;">
                    </div>
                </div>
                <div class="d-flex flex-row-reverse mt-2">
                    <button type='submit' id="save" class='btn btn-success ms-2' style="display: none;">Save</button>
                    <button type="button" id="cancel" class='btn btn-secondary' style="display: none;">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
