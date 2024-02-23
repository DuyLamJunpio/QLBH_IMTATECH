<!-- Navbar  -->
<nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3 bg-dark">
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
                    <a class="nav-link text-white" href="{{ route('User.products')}}">
                        <i class='bx bx-package text-white'></i>
                        Product
                    </a>
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
                        {{ Auth::user()->fullname }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>