<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Detail Product
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/fontawesome-free-6.5.1-web/css/all.min.css">

</head>

<body>

    <div class="container-fluid">

        <div class="row py-2 ">
            <h3 class="">List Product</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="font-weight: 800;" href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a style="font-weight: 800;"
                            href="/products">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
            </nav>
        </div>

        <a href="">
            <section class="bg-body-secondary" style="width:auto; height: auto;">
                <div class="container py-5 ">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col col-xl-10">
                            <div class="card pb-5" style="border-radius: 1rem; ">
                                <div class="row g-0 ">
                                    <div class="col-md-6 col-lg-5 d-none d-md-block ">
                                        <img src="<%= objProd.image %>" style="width: 400px; height: 400px;"
                                            alt="login form" class="img-fluid mt-5 ms-2"
                                            style="border-radius: 1rem 0 0 1rem;" />
                                    </div>
                                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                        <div class="card-body p-4 p-lg-5 text-black">

                                            <form>
                                                <div class="d-flex align-items-center mb-3 pb-1">
                                                    <span class="h1 fw-bold mb-0"><%= objProd.name %></span>
                                                </div>

                                                <h5 class="fw-normal mb-2 pb-3" style="letter-spacing: 1px;">Price :
                                                    <%= objProd.price %></h5>

                                                <h5 class="fw-normal mb-2 pb-3" style="letter-spacing: 1px;">Description
                                                    :
                                                    <%= objProd.description %></h5>

                                                <h5 class="fw-normal mb-2 pb-3" style="letter-spacing: 1px;">Quantity :
                                                    <%= objProd.qty %></h5>

                                                <h5 class="fw-normal mb-2 pb-3" style="letter-spacing: 1px;">Category :
                                                    <%= objProd.id_cat.name %></h5>



                                                <div class="mb-5">
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </a>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
