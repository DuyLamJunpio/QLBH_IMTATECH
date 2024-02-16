@extends('layout.layout')

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px"
                    @if ($users->image)
                        src="{{ $users->image }}"
                    @else
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Breezeicons-actions-22-im-user.svg/1200px-Breezeicons-actions-22-im-user.svg.png"
                    @endif
                >
                </div>
            </div>

            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Hồ sơ khách hàng</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12" style="margin-bottom: 15px">
                            <label class="labels">Email: </label><input type="text" class="form-control" placeholder=""
                                value="{{ $users->email }}" disabled>
                        </div>

                    </div>
                    <div class="col-md-12" style="margin-bottom: 15px"><label class="labels">Họ tên: </label><input
                            type="text" class="form-control" value="{{ $users->fullname }}" placeholder="" disabled>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12" style="margin-bottom: 15px"><label class="labels">Số điện thoại: </label><input
                                type="text" class="form-control" placeholder="" value="{{ $users->phone }}" disabled>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 15px"><label class="labels">Địa chỉ: </label><input
                                type="textaria" class="form-control" placeholder="" value="{{ $users->address }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
