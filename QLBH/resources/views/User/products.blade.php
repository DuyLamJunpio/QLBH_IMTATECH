<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IMTA TECH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar  -->
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3 bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">IMTA TECH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto"></div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#section1">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/sanpham">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#section2">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="width: 100%; height: 100px;"></div>

    <div class="container">
        <div class="row">
            @foreach ($product as $item)
                <div class="col-3 mb-5">
                    <div class="container ">
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('User.detailprod', ['id' => $item->id]) }}">
                                <img src="{{ Storage::url($item->image) }}" width="50" class="card-img-top"
                                    alt="">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title ">{{ $item->name }}</h5>
                                <p class="card-text text-black-50" style="font-weight: 600">${{ $item->price }}</p>
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                                </form>                                
  
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('User.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 100) {
                nav.classList.add('bg-light', 'shadow');
                nav.classList.remove('bg-dark', 'shadow');
            } else {
                nav.classList.add('bg-dark', 'shadow');
                nav.classList.remove('bg-light', 'shadow');
            }
        });
    </script>
</body>

</html>
