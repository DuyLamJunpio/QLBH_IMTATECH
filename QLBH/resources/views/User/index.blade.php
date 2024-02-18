<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IMTA TECH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/fontawesome-free-6.5.1-web/css/all.min.css">
</head>

<body>
    <!-- Navbar  -->
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
        <div class="container">
            <a class="navbar-brand" href="#">IMTA TECH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mx-auto" id="navbarNav">
                <div class="mx-auto"></div>
                <ul class="navbar-nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('trangchu') }}">
                            <i class='bx bx-home text-white'></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
<<<<<<< HEAD
                        <a class="nav-link text-white" href="#">
                            <i class='bx bx-package text-white'></i>
                            Product
                        </a>
=======
                        <a class="nav-link text-white" href="/sanpham">Product</a>
>>>>>>> 1230d6a1ba5fc1e11fd6a2e67a5fb6797cf95516
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class='bx bx-cart text-white'></i>
                            Cart
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ Auth::check() ? route('user_profile') : route('login') }}">
                            <i class='bx bx-user text-white'></i>
                            {{Auth::user()->fullname}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="body">
        @include('User.intro')
    </div>

    @include('User.about')
    @include('User.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 100) {
                nav.classList.add('bg-dark', 'shadow');
            } else {
                nav.classList.remove('bg-dark', 'shadow');
            }
        });
    </script>
</body>

</html>
