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
                                            <h5 class="card-title widget-card-title mb-3">Tồn kho - {{ $totalInventory }}
                                            </h5>
                                            <h4 class="card-subtitle text-body-secondary m-0">{{ $totalCost }}vnd</h4>
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
                                                {{-- <span
                                                    class="lh-1 me-3 bg-danger-subtle text-danger rounded-circle p-1 d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-arrow-right-short bsb-rotate-45"></i>
                                                </span> --}}
                                                <div>
                                                    {{-- <p class="fs-7 mb-0">-9%</p> --}}
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
                                            <h5 class="card-title widget-card-title mb-3">Doanh thu</h5>
                                            <h4 class="card-subtitle text-body-secondary m-0">$21,900</h4>
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
                                                <span
                                                    class="lh-1 me-3 bg-success-subtle text-success rounded-circle p-1 d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-arrow-right-short bsb-rotate-n45"></i>
                                                </span>
                                                <div>
                                                    <p class="fs-7 mb-0">+26%</p>
                                                    <p class="fs-7 mb-0 text-secondary">tăng so với cùng kỳ tháng trước</p>
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
                                            <h5 class="card-title widget-card-title mb-3">Thu chi</h5>
                                            <h4 class="card-subtitle text-body-secondary m-0">3,764 - 1,764</h4>
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
                                                <span
                                                    class="lh-1 me-3 bg-success-subtle text-success rounded-circle p-1 d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-arrow-right-short bsb-rotate-n45"></i>
                                                </span>
                                                <div>
                                                    <p class="fs-7 mb-0">+69%</p>
                                                    <p class="fs-7 mb-0 text-secondary">Thu vượt chi</p>
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
                                            <h5 class="card-title widget-card-title mb-3">Doanh số</h5>
                                            <h4 class="card-subtitle text-body-secondary m-0">786</h4>
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
                                                <span
                                                    class="lh-1 me-3 bg-danger-subtle text-danger rounded-circle p-1 d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-arrow-right-short bsb-rotate-45"></i>
                                                </span>
                                                <div>
                                                    <p class="fs-7 mb-0">-21%</p>
                                                    <p class="fs-7 mb-0 text-secondary">since last week</p>
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
