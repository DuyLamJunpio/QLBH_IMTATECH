<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IMTA TECH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<style>
    .name_prod {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        width: 200px;
    }
    .name_prodOrder {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        width: 500px;
    }
</style>

<body>
    @include('User.nav')

    <div style="width: 100%; height: 100px;"></div>

    {{-- <div class="container">
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
                                <h5 class="card-title name_prod">{{ $item->name }}</h5>
                                <p class="card-text text-black-50" style="font-weight: 600">${{ $item->price }}</p>
                                <a href="#" class="btn btn-primary w-100">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
    @include('User.orderdetails')


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
