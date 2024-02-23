@extends('layout.layout')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h3>Đổi mật khẩu</h3>
            <hr>
            <form action="{{ route('profile.edit_pass') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <input name="oldpassword" type="password"
                        class="form-control form-control-user @error('password')is-invalid @enderror"
                        id="exampleInputPassword" placeholder="Password">
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <input name="password" type="password"
                        class="form-control form-control-user @error('password')is-invalid @enderror"
                        id="exampleInputPassword" placeholder="New Password">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <input name="password_confirmation" type="password"
                        class="form-control form-control-user @error('password_confirmation')is-invalid @enderror"
                        id="exampleRepeatPassword" placeholder="Repeat New Password">
                    @error('password_confirmation')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type='submit' id="save" class='btn btn-success'>Change</button>
                </div>
            </form>
        </div>
    </div>
@endsection
