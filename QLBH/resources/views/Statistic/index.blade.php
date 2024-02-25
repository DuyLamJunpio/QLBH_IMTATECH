@extends('layout.layout')

@section('content')
    <section class="py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8 col-xxl-7">
                    <div class="row gy-4">
                        <div class="col-12 col-sm-6">
                            <div class="card widget-card border-light shadow-sm">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="card-title widget-card-title mb-3">Tồn kho -
                                                {{ $totalInventory }}
                                            </h5>
                                            <h4 class="card-subtitle text-body-secondary m-0">{{ $totalCost }}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div
                                                    class="lh-1 text-white bg-info rounded-circle p-3 d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-file-earmark-text fs-4"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center mt-3">
                                                <div>
                                                    <a href="{{ route('products.index') }}"
                                                        style="text-decoration: none; color: blue;">
                                                        <p class="fs-7 mb-0 text-secondary">Nhấn để xem chi tiết</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card widget-card border-light shadow-sm">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="card-title widget-card-title mb-3">Hóa đơn - {{ $billCount }}</h5>
                                            <h4 class="card-subtitle text-body-secondary m-0">{{ $totalPayment }}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div
                                                    class="lh-1 text-white bg-info rounded-circle p-3 d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-currency-dollar fs-4"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center mt-3">
                                                <div>
                                                    <a href="{{ route('bill.index') }}"
                                                        style="text-decoration: none; color: blue;">
                                                        <p class="fs-7 mb-0 text-secondary">Nhấn để xem chi tiết</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card widget-card border-light shadow-sm">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="card-title widget-card-title mb-3">Đã bán - {{ $totalQuantity }}</h5>
                                            <h4 class="card-subtitle text-body-secondary m-0"> {{ $totalPayment }}</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div
                                                    class="lh-1 text-white bg-info rounded-circle p-3 d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-currency-dollar fs-4"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center mt-3">
                                                <div>
                                                    <p class="fs-7 mb-0 text-secondary">Nhấn để xem chi tiết</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card widget-card border-light shadow-sm">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="card-title widget-card-title mb-3">Thu - chi</h5>
                                            <h4 class="card-subtitle text-body-secondary m-0">
                                                {{ $totalPayment }} - {{ $totalCost }} </h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div
                                                    class="lh-1 text-white bg-info rounded-circle p-3 d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-cash-stack fs-4"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center mt-3">

                                                <div>
                                                    <p class="fs-7 mb-0 text-secondary">Nhấn để xem chi tiết</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
