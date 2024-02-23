@extends('User.profile')

@section('content')
    <div class="row">

        <div class="col-lg">
            <h3 class="mb-3"></i>Đơn Mua Của Tôi</h3>
            <hr>
            @foreach ($records as $items)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div>
                                    <img src="{{ Storage::url($items->image) }}"
                                        class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                </div>
                                <div class="ms-3">
                                    <h5>{{ $items->name }}</h5>
                                    <p class="small mb-0">{{ $items->categories_name }}</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div style="width: 50px;">
                                    <h5 class="fw-normal mb-0">1</h5>
                                </div>
                                <div style="width: auto;" class="me-2">
                                    <h5 class="priceDisplay mb-0" style="color: #fa0303">
                                        {{ $items->total_payment }}<span style='color:#fa0303'>
                                            VNĐ</span></h5>
                                </div>
                                <a href="{{ route('user_purchase.delete', ['id' => $items->bill_id]) }}" style="color: #868686;"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
