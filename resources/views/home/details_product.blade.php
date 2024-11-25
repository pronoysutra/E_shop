<!DOCTYPE html>
<html>

<head>
    <base href="/public">
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
        .img-box {
    padding: 20px;
    display: flex;
    justify-content: center; /* Centers the image horizontally */
    align-items: center; /* Centers the image vertically (if a height is set for the container) */
    height: 200px; /* Set a consistent height for the container */
    overflow: hidden; /* Ensures images don't overflow the container */
    background-color: #f9f9f9; /* Optional: Adds a background color to highlight the image box */
}

.img-box img {
    width: 100%; /* Ensures the image scales proportionally */
    max-width: 150px; /* Set a max width to control the image size */
    height: auto; /* Maintains the aspect ratio of the image */
    object-fit: cover; /* Ensures the image fills the container if necessary */
}
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding: 30px;" >
            <div class="box">

                <div class="img-box">
                    <img src="{{ asset('product/'.$product->image) }}" alt="">
                </div>

                <div class="detail-box">
                    <h6>
                        Product Title:
                        {{$product->title}}
                    </h6>

                    <h6>
                        Product Discriptiom:
                        {{$product->description}}
                    </h6>
                    <h6>
                        Product Catagory:
                        {{$product->catagory}}
                    </h6>
                    <h6>
                        Product Quantity:
                        {{$product->quantity}}
                    </h6>


                    @if($product->discount_price)
                    <h6 style="color:blue">
                        Discount Price<br>
                        <span>&#2547; {{ $product->discount_price }} </span>
                    </h6>

                    <h6 style="text-decoration: line-through; color:red ">
                        Price<br>
                        <span>&#2547; {{$product->price}} </span>
                    </h6>
                    @else
                    <h6>
                        <span>&#2547;
                            {{$product->price}}
                        </span>
                    </h6>
                    @endif
                    <form action="{{route('cart.product',$product->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4"><input type="number" name="quentity" value="1" min="1"></div>
                                    <div class="col-md-4 btn btn-sucess"> <input type="submit" value="Add to Cart"></div>
                                </div>
                            </form>


                </div>
            </div>
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
