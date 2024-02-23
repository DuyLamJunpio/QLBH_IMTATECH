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
    @include('User.nav');

    <div style="width: 100%; height: 100px;"></div>

    <div class="container">
        <div class="row">
            @foreach ($product as $item)
                <div class="col-3 mb-5">
                    <div class="container ">
                        <div class="card" style="width: 18rem; height: 450px;">
                            <a href="{{ route('User.detailprod', ['id' => $item->id]) }}">
                                <img src="{{ Storage::url($item->image) }}" width="50" height="350"
                                    class="card-img-top" alt="">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title ">{{ $item->name }}</h5>
                                <p class="card-text text-black-50" style="font-weight: 600">${{ $item->price }}</p>
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
</body>

</html>
