<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        .img_size {
            width: 80px;
            height: 80px;
            object-fit: cover;
            /* Ensures proper cropping */
        }
    </style>

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->

        <!-- end slider section -->

        @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

        <!-- cart show start -->
        <div class="pt-4 mt-4 text-center" style="margin-right: 250px; margin-left:250px">
            <table class="table">
                <th class="th_design">No</th>
                <th class="th_design">Product Title</th>
                <th class="th_design">Quantity</th>
                <th class="th_design">Price</th>
                <th class="th_design">Image</th>
                <th class="th_design" colspan="2">Action</th>
                <?php $totalPrice = 0; ?>
                @foreach($cart as $index => $carts)
                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{$carts->product_title}}</td>
                    <td>{{$carts->quantity}}</td>
                    <td>{{$carts->price}}</td>
                    <td>
                        <img class="img_size" src="{{ asset('product/' . $carts->image) }}" alt="">
                    </td>
                    <td><a class="btn btn-danger m-1" href="{{route('delete.cart',$carts->id)}}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>
                    <td></td>
                </tr>

                <?php $totalPrice = $totalPrice + $carts->price ?>
                @endforeach

            </table>
            <div>
                <h4>Total Price:{{$totalPrice}}</h4>
            </div>

            <div>
                <h2>Proceed to Order</h2>
                <a href="{{route('cash.order')}}" class="btn btn-success">Cash On Delivery</a>
                <a href="" class="btn btn-success">Pay Using Card</a>

            </div>

        </div>
        <!-- cart show end -->
    </div>
    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS (includes Popper.js for dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
