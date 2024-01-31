<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/fontawesome-free-6.5.1-web/css/all.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            @foreach ($product as $item)
                <div class="col-3 mb-5">
                    <div class="container ">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('images/itemprod.png') }}" width="50" class="card-img-top"
                                alt="">
                            {{-- <img src="{{ Storage::url($item->image) }}" width="50" alt=""> --}}
                            <div class="card-body">
                                <h5 class="card-title ">{{ $item->name }}</h5>
                                <p class="card-text text-black-50" style="font-weight: 600">${{ $item->price }}</p>
                                <a href="#" class="btn btn-primary w-100">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="component" class="container-fluid py-3 d-flex flex-column align-items-center">
        <div class="mb-4 text-center">
            <p class="text-dark fs-3 fw-bold font-family-Poppins m-0 px-3 py-2">
                About us
            </p>
            <p class="text-dark text-opacity-50 fs-6 fw-medium font-family-Poppins m-0 px-3 py-2">
                Order now and appreciate the beauty of nature
            </p>
        </div>
        <div class="row align-items-center w-100">
            <div class="col-xl-4 d-flex flex-column align-items-center mb-4">
                <div class="position-relative">
                    <div class="left-0 top-0 position-absolute bg-success-subtle rounded-circle col-12"></div>
                </div>
                <div class="mb-4 text-center">
                    <img src="{{ asset('images/group1.png') }}" />
                    <p class="text-black fs-6 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">
                        Large Assortment
                    </p>
                    <p class="text-dark text-opacity-50 fs-6 fw-medium font-family-Poppins m-0 px-3 py-2 text-center">
                        We offer many different types of products with fewer variations in
                        each category.
                    </p>
                </div>
            </div>
            <div class="col-xl-4 d-flex flex-column align-items-center mb-4">
                <div class="position-relative">
                    <div class="left-0 top-0 position-absolute bg-success-subtle rounded-circle col-12"></div>
                </div>
                <div class="mb-4 text-center">
                    <img src="{{ asset('images/group2.png') }}" />
                    <p class="text-black fs-6 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">
                        Fast & Free Shipping
                    </p>
                    <p class="text-dark text-opacity-50 fs-6 fw-medium font-family-Poppins m-0 px-3 py-2 text-center">
                        4-day or less delivery time, free shipping and an expedited delivery
                        option.
                    </p>
                </div>
            </div>
            <div class="col-xl-4 d-flex flex-column align-items-center mb-4">
                <div class="position-relative">
                    <div class="left-0 top-0 position-absolute bg-success-subtle rounded-circle col-12"></div>
                    <div class="position-absolute col-5 justify-content-center align-items-center"></div>
                </div>
                <div class="mb-4 text-center">
                    <img src="{{ asset('images/Ellipse.png') }}" />
                    <p class="text-black fs-6 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">
                        24/7 Support
                    </p>
                    <p class="text-dark text-opacity-50 fs-6 fw-medium font-family-Poppins m-0 px-3 py-2 text-center">
                        answers to any business related inquiry 24/7 and in real-time.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div id="component" class="container-fluid py-3">
            <div class="position-relative bg-success-subtle row p-5 ">
                <div class="col-8 row align-items-center">
                    <div class="col-12 row d-flex flex-column">
                        <p class="text-black fs-6 fw-normal font-family-Quella m-0 px-3 py-2">
                            GREENMIND
                        </p>
                        <p class="text-dark text-opacity-50 fs-6 fw-medium font-family-Poppins m-0 px-3 py-2">
                            We help you find your dream plant
                        </p>
                    </div>
                    <div class="row-3 align-items-center mt-3 mb-5">
                        <img src="{{ asset('images/group11.png') }}" width="50px" class="mx-2"/>
                        <img src="{{ asset('images/group12.png') }}"  width="50px" class="mx-2"/>
                        <img src="{{ asset('images/group13.png') }}"  width="50px" class="mx-2"/>
                    </div>
                    <div class="mt-5">
                        <span
                            class="text-dark text-opacity-50 fs-6 fw-medium font-family-Poppins col-xxl-2  text-right">
                            2023 all Right Reserved Term of use GREENMIND
                        </span>
                    </div>
                   
                </div>
                <div class="col-4 row mx-2">
                    <div class="col-4 row">
                        <p class="text-dark fs-6 fw-bold font-family-Poppins m-0 px-2">
                            Information
                        </p>
                        <a class="text-dark text-opacity-50 fs-6 fw-normal font-family-Poppins px-2" href="#" style="text-decoration: none;">
                            About
                        </a>
                        <a class="text-dark text-opacity-50 fs-6 fw-normal font-family-Poppins  px-2" href="#" style="text-decoration: none;">
                            Product
                        </a>
                        <a class="text-dark text-opacity-50 fs-6 fw-normal font-family-Poppins  px-2" href="#" style="text-decoration: none;">
                            Blog
                        </a>
                    </div>
                    <div class="col-4 row">
                        <p class="text-dark fs-6 fw-bold font-family-Poppins m-0 px-2">
                            Company
                        </p>
                        <a class="text-dark text-opacity-50 fs-6 fw-normal font-family-Poppins px-2" href="#" style="text-decoration: none;">
                            Community
                        </a>
                        <a class="text-dark text-opacity-50 fs-6 fw-normal font-family-Poppins px-2" href="#" style="text-decoration: none;">
                            Career
                        </a>
                        <a class="text-dark text-opacity-50 fs-6 fw-normal font-family-Poppins px-2" href="#" style="text-decoration: none;">
                            Our story
                        </a>
                    </div>
                    <div class="col-4 row">
                        <p class="text-dark fs-6 fw-bold font-family-Poppins m-0 px-2">
                            Contact
                        </p>
                        <a class="text-dark text-opacity-50 fs-6 fw-normal font-family-Poppins px-2" href="#" style="text-decoration: none;">
                            Getting Started
                        </a>
                        <a class="text-dark text-opacity-50 fs-6 fw-normal font-family-Poppins px-2" href="#" style="text-decoration: none;">
                            Pricing
                        </a>
                        <a class="text-dark text-opacity-50 fs-6 fw-normal font-family-Poppins px-2" href="#" style="text-decoration: none;">
                            Resources
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
