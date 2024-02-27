@foreach ($bills as $bill)
    <section class="mb-2" style="background-color: #eee;">
        <div class="container py-2" style="background-color: white">
            <div class="column d-flex justify-content-between align-items-center">
                <div>
                    <h5>BOUTIQUE</h5>
                </div>
                <div class="column d-flex">
                    <strong class="text-info-emphasis">Đang chuẩn bị hàng</strong>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card rounded-3 mb-0">
                        @foreach ($bill->billDetails as $billDetail)
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-3">
                                        <img src="{{ Storage::url($billDetail->product->image) }}"
                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-6">
                                        <p class="lead fw-normal mb-2">{{ $billDetail->product->name }}</p>
                                        <div class="column"><span class="text-muted">Size: </span>
                                            {{ $billDetail->variant->size }}<span class="ms-2"
                                                class="text-muted">Color:
                                            </span>{{ $billDetail->variant->color }}</div>
                                    </div>
                                    <div class="row col-md-3 col-lg-3 col-xl-3 d-flex">
                                        <p><span class="text-muted">Quantity: </span>{{ $billDetail->quantity }}
                                        </p>
                                        <h5 class="priceDisplay mb-0">{{ $billDetail->product->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="column d-flex justify-content-end align-items-center col mt-2 me-5">
                <div class="column d-flex">
                    <span class="text-dark me-2 fw-bold ">Thành tiền: </span>
                    <p class="priceDisplay text-danger fw-bold">
                        {{ $billDetail->product->price * $billDetail->quantity }}</p>
                </div>
            </div>
        </div>
    </section>
@endforeach
