@extends('User.home.index')
@section('customer')
    <div class="page-holder bg-light">
        <!--  Modal -->
        <div class="modal fade" id="productView" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content overflow-hidden border-0">
                    <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body p-0">
                        <div class="row align-items-stretch">
                            <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center"
                                    style="background: url(img/product-5.jpg)" href="img/product-5.jpg"
                                    data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a
                                    class="glightbox d-none" href="img/product-5-alt-1.jpg" data-gallery="gallery1"
                                    data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none"
                                    href="img/product-5-alt-2.jpg" data-gallery="gallery1"
                                    data-glightbox="Red digital smartwatch"></a></div>
                            <div class="col-lg-6">
                                <div class="p-4 my-md-4">
                                    <ul class="list-inline mb-2">
                                        <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                        <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i>
                                        </li>
                                        <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i>
                                        </li>
                                        <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i>
                                        </li>
                                        <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i>
                                        </li>
                                    </ul>
                                    <h2 class="h4">Red digital smartwatch</h2>
                                    <p class="text-muted">$250</p>
                                    <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut
                                        ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis
                                        parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.
                                    </p>
                                    <div class="row align-items-stretch mb-4 gx-0">
                                        <div class="col-sm-7">
                                            <div class="border d-flex align-items-center justify-content-between py-1 px-3">
                                                <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                                <div class="quantity">
                                                    <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                                    <input class="form-control border-0 shadow-0 p-0" type="text"
                                                        value="1">
                                                    <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5"><a
                                                class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0"
                                                href="cart.html">Add to cart</a></div>
                                    </div><a class="btn btn-link text-dark text-decoration-none p-0" href="#!"><i
                                            class="far fa-heart me-2"></i>Add to wish list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="py-5">
            <form name="" method="post"
                action="">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-6">
                            <!-- PRODUCT SLIDER-->
                            <div class="row m-sm-0">
                                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                                    <div class="swiper product-slider-thumbs">
                                      <div class="swiper-wrapper">
                                        <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="{{ Storage::url($product->image) }}" alt="..."></div>
                                        <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="{{ Storage::url($product->image) }}" alt="..."></div>
                                        <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="{{ Storage::url($product->image) }}" alt="..."></div>
                                        <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="{{ Storage::url($product->image) }}" alt="..."></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-10 order-1 order-sm-2">
                                    <div class="swiper product-slider">
                                      <div class="swiper-wrapper">
                                        <div class="swiper-slide h-auto"><a class="glightbox product-view" href="img/product-detail-1.jpg" data-gallery="gallery2" data-glightbox="Product item 1"><img class="img-fluid" src="{{ Storage::url($product->image) }}" alt="..."></a></div>
                                        <div class="swiper-slide h-auto"><a class="glightbox product-view" href="img/product-detail-2.jpg" data-gallery="gallery2" data-glightbox="Product item 2"><img class="img-fluid" src="{{ Storage::url($product->image) }}" alt="..."></a></div>
                                        <div class="swiper-slide h-auto"><a class="glightbox product-view" href="img/product-detail-3.jpg" data-gallery="gallery2" data-glightbox="Product item 3"><img class="img-fluid" src="{{ Storage::url($product->image) }}" alt="..."></a></div>
                                        <div class="swiper-slide h-auto"><a class="glightbox product-view" href="img/product-detail-4.jpg" data-gallery="gallery2" data-glightbox="Product item 4"><img class="img-fluid" src="{{ Storage::url($product->image) }}" alt="..."></a></div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        <!-- PRODUCT DETAILS-->
                        <div class="col-lg-6">
                            <ul class="list-inline mb-2 text-sm">
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                            </ul>
                            <h1>{{ $product->name }}</h1>
                            <p class="text-muted lead">{{ $product->price }}</p>
                            <p class="text-sm mb-4">{{ $product->description }}</p>
                            <div class="row align-items-stretch mb-4">
                                <div class="col-sm-5 pr-sm-0">
                                    <div
                                        class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white">
                                        <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                        <div class="quantity">
                                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                            <input class="form-control border-0 shadow-0 p-0" type="text"
                                                value="1">
                                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 pl-sm-0"><a
                                        class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0"
                                        href="cart.html">Add to cart</a></div>
                                <div class="col-sm-3 pl-sm-0"><a
                                        class="btn btn-danger btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0"
                                        href="cart.html">Buy now</a></div>
                            </div><a class="text-dark p-0 mb-4 d-inline-block" href="#!"><i
                                    class="far fa-heart me-2"></i>Add to wish list</a><br>
                            <ul class="list-unstyled small d-inline-block">
                                <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">Status:</strong><span
                                        class="ms-2 {{ $product->inventory > 0 ? 'text-success' : 'text-danger' }} fw-bold">{{ $product->inventory > 0 ? 'Còn hàng' : 'Hết hàng' }}</span></li>
                                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong
                                        class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ms-2"
                                        href="#!">{{ $product->categories_name }}</a></li>
                                {{-- <li class="px-3 py-2 mb-1 bg-white text-muted"><strong
                                        class="text-uppercase text-dark">Tags:</strong><a class="reset-anchor ms-2"
                                        href="#!">Innovation</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <!-- DETAILS TABS-->
                    <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab"
                                data-bs-toggle="tab" href="#description" role="tab" aria-controls="description"
                                aria-selected="true">Description</a></li>
                        <li class="nav-item"><a class="nav-link text-uppercase" id="reviews-tab" data-bs-toggle="tab"
                                href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="p-4 p-lg-5 bg-white">
                                <h6 class="text-uppercase">Product description </h6>
                                <p class="text-muted text-sm mb-0">{{ $product->description }}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="p-4 p-lg-5 bg-white">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="d-flex mb-3">
                                            <div class="flex-shrink-0"><img class="rounded-circle"
                                                    src="img/customer-1.png" alt="" width="50" /></div>
                                            <div class="ms-3 flex-shrink-1">
                                                <h6 class="mb-0 text-uppercase">Jason Doe</h6>
                                                <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                                                <ul class="list-inline mb-1 text-xs">
                                                    <li class="list-inline-item m-0"><i
                                                            class="fas fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-inline-item m-0"><i
                                                            class="fas fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-inline-item m-0"><i
                                                            class="fas fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-inline-item m-0"><i
                                                            class="fas fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-inline-item m-0"><i
                                                            class="fas fa-star-half-alt text-warning"></i></li>
                                                </ul>
                                                <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                                    magna
                                                    aliqua.</p>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0"><img class="rounded-circle"
                                                    src="img/customer-2.png" alt="" width="50" /></div>
                                            <div class="ms-3 flex-shrink-1">
                                                <h6 class="mb-0 text-uppercase">Jane Doe</h6>
                                                <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                                                <ul class="list-inline mb-1 text-xs">
                                                    <li class="list-inline-item m-0"><i
                                                            class="fas fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-inline-item m-0"><i
                                                            class="fas fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-inline-item m-0"><i
                                                            class="fas fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-inline-item m-0"><i
                                                            class="fas fa-star text-warning"></i>
                                                    </li>
                                                    <li class="list-inline-item m-0"><i
                                                            class="fas fa-star-half-alt text-warning"></i></li>
                                                </ul>
                                                <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                                    magna
                                                    aliqua.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- RELATED PRODUCTS-->
                    <h2 class="h5 text-uppercase mb-4">Related products</h2>
                    <div class="row">
                        <!-- PRODUCT-->
                        <div class="col-lg-3 col-sm-6">
                            <div class="product text-center skel-loader">
                                <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img
                                            class="img-fluid w-100" src="img/product-1.jpg" alt="..."></a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark"
                                                    href="#!"><i class="far fa-heart"></i></a></li>
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark"
                                                    href="#!">Add to cart</a></li>
                                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark"
                                                    href="#productView" data-bs-toggle="modal"><i
                                                        class="fas fa-expand"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" href="detail.html">Kui Ye Chen’s AirPods</a></h6>
                                <p class="small text-muted">$250</p>
                            </div>
                        </div>
                        <!-- PRODUCT-->
                        <div class="col-lg-3 col-sm-6">
                            <div class="product text-center skel-loader">
                                <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img
                                            class="img-fluid w-100" src="img/product-2.jpg" alt="..."></a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark"
                                                    href="#!"><i class="far fa-heart"></i></a></li>
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark"
                                                    href="#!">Add to cart</a></li>
                                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark"
                                                    href="#productView" data-bs-toggle="modal"><i
                                                        class="fas fa-expand"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" href="detail.html">Air Jordan 12 gym red</a></h6>
                                <p class="small text-muted">$300</p>
                            </div>
                        </div>
                        <!-- PRODUCT-->
                        <div class="col-lg-3 col-sm-6">
                            <div class="product text-center skel-loader">
                                <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img
                                            class="img-fluid w-100" src="img/product-3.jpg" alt="..."></a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark"
                                                    href="#!"><i class="far fa-heart"></i></a></li>
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark"
                                                    href="#!">Add to cart</a></li>
                                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark"
                                                    href="#productView" data-bs-toggle="modal"><i
                                                        class="fas fa-expand"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" href="detail.html">Cyan cotton t-shirt</a></h6>
                                <p class="small text-muted">$25</p>
                            </div>
                        </div>
                        <!-- PRODUCT-->
                        <div class="col-lg-3 col-sm-6">
                            <div class="product text-center skel-loader">
                                <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img
                                            class="img-fluid w-100" src="img/product-4.jpg" alt="..."></a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark"
                                                    href="#!"><i class="far fa-heart"></i></a></li>
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark"
                                                    href="#!">Add to cart</a></li>
                                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark"
                                                    href="#productView" data-bs-toggle="modal"><i
                                                        class="fas fa-expand"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" href="detail.html">Timex Unisex Originals</a></h6>
                                <p class="small text-muted">$351</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
{{-- <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
<div class="container col-8 justify-content-center">
    <div class="row py-2">
        <h3 class="">Detail Product</h3>
    </div>
    <div class="card">
        <div class="container">
            <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                action="/php/twig/frontend/giohang/themvaogiohang">
                <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

                <div class="wrapper row col-10">
                    <div class="col-6 d-none d-md-block ">
                        <img src="{{ Storage::url($product->image) }}" width="50" height="350"
                            class="card-img-top my-2 rounded" alt="">
                    </div>
                    <div class="details col-md-6">
                        <h2 class="fw-bold text-dark">{{ $product->name }}</h2>
                        <h4 class="price">Giá hiện tại: <span id="priceDisplay"
                                style='color:#2345de'>{{ $product->price }}</span><span style='color:#2345de'>
                                VNĐ</span></h4>
                        <h5 class="colors">Số lượng : </h5>
                        <div class="row" style="width: 140px;">
                            <div class="input-group ">
                                <button class="btn btn-outline-secondary" type="button" id="subtract-btn">-</button>
                                <input type="text" class="form-control text-center" id="counter-input" min="1"
                                    value="1" readonly>
                                <button class="btn btn-outline-secondary" type="button" id="add-btn">+</button>
                            </div>
                        </div>
                        <p>{{ $product->inventory }} sản phẩm có sẵn</p>
                        <div class="action" style="width: 400px;">
                            <a class="btn btn-outline-primary w-50 mt-2">Thêm vào giỏ hàng</a>
                            <a class="btn btn-danger w-50 mt-2" onclick="sendValueToBlade"
                                href="{{ route('order', ['id' => $product->id]) }}">Mua ngay</a>
                            <a class="btn btn-danger mt-2" href="#"><i class='bx bxs-heart'
                                    style='color:#ffffff'></i></a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="card mt-2">
        <div class="container-fluid ">
            <h3 class="m-3">MÔ TẢ SẢN PHẨM</h3>
            <div class="row">
                <div class="col m-3">
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var counter = 0;
    var counterInput = document.getElementById('counter-input');
    var addBtn = document.getElementById('add-btn');
    var subtractBtn = document.getElementById('subtract-btn');

    addBtn.addEventListener('click', function() {
        counter++;
        counterInput.value = counter;
    });

    subtractBtn.addEventListener('click', function() {
        if (counter > 0) {
            counter--;
            counterInput.value = counter;
        }
    });

    </script> --}}

{{-- // function formatNumber(number) {
// return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
// }
// window.addEventListener('DOMContentLoaded', function() {
// var inputNumber = document.getElementById('priceDisplay').innerText; // Số bạn muốn hiển thị
// console.log(inputNumber);
// var formattedNumber = formatNumber(inputNumber);
// document.getElementById('priceDisplay').textContent = formattedNumber;
// }); --}}
