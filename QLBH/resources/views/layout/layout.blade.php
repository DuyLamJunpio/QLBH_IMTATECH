<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('resources/css/layout.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/cards/card-1/assets/css/card-1.css">
    @yield('styles')
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxl-amazon'></i>
            <span class="logo_name">IMTA TECH</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{ route('products.index') }}">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Products</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Products</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{ route('categories.index') }}">
                        <i class='bx bx-collection'></i>
                        <span class="link_name">Categories</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Categories</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{ route('user_management.index') }}">
                        <i class='bx bx-user'></i>
                        <span class="link_name">User Management</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="">User management</a></li>
                </ul>
            </li>

            <li>
                <div class="iocn-link">
                    <a href="{{ route('statistic.index') }}">
                        <i class='bx bx-chart'></i>
                        <span class="link_name">Statistic</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="">Statistic</a></li>
                </ul>
            </li>

            <li>
                <div class="iocn-link">
                    <a href="{{ route('bill.index') }}">
                        <i class='bx bx-receipt'></i>
                        {{-- <box-icon name='receipt'></box-icon> --}}
                        <span class="link_name">Bill</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="">Bill</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <a href="{{ route('profile.index') }}">
                        <div class="profile-content">
                            <img src="{{ Storage::url(auth()->user()->image) }}" width="100" alt="">
                        </div>
                        <div class="name-job">
                            <div class="profile_name">{{ auth()->user()->fullname }}</div>
                            <div class="job">{{ auth()->user()->role == 1 ? 'Admin' : 'Staff' }}</div>
                        </div>
                    </a>

                    <a href="logout"><i class='bx bx-log-out'></i></a>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">IMTA TECH</span>
        </div>
        <div>
            <div class="container mt-2">
                {{-- @if (session('success'))
                    <div class="alert alert-primary">
                        {{ session('success') }}
                    </div>
                @endif --}}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </section>
    <script src="{{ asset('resources/js/layout.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('resources/js/upload_img.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>
@yield('scripts')

</html>
