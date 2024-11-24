<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')

    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
            font-size: 20px;
        }

        .front_size {
            padding-bottom: 40px;
            font-size: 40px;
        }

        .text_color {
            color: black;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }

        .center_image {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
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

                <div class="div_center">
                    <h1 class="front_size">Edit Product</h1>

                    <form action="{{route('update.product',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Product Title:</label>
                            <input class="text_color" type="text" name="title" placeholder="Write a title "  value="{{$product->title}}">
                        </div>



                        <div class="div_design">
                            <label>Product Description:</label>
                            <input class="text_color" type="text" name="description" placeholder="Write a description "  value="{{$product->description}}">
                        </div>



                        <div class="div_design">
                            <label>Product Price:</label>
                            <input class="text_color" type="number" name="price" placeholder="Write a price " min="0"  value="{{$product->price}}">
                        </div>



                        <div class="div_design">
                            <label>Product Quantity:</label>
                            <input class="text_color" type="text" name="quantity" min="0" placeholder="Write a quantity "  value="{{$product->quantity}}">
                        </div>



                        <div class="div_design">
                            <label>Product Discount Price:</label>
                            <input class="text_color" type="number" name="discount_price" placeholder="Write a discount price  " value="{{$product->discount_price}}">
                        </div>


                        <div class="div_design">
                            <label>Product Catagory:</label>
                            <select class="text_color" name="catagory" >
                                <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>

                                @foreach($catagory as $catagorys)
                                <option value="{{$catagorys->catagory_name}}">
                                    {{$catagorys->catagory_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="div_design">
                            <label>Product Image:</label>
                            <div>
                                <img class="center_image" src="{{ asset('product/' . $product->image) }}" alt="Product Image" style="width: 150px; height: auto;">
                            </div>
                            <input type="file" name="image" >
                        </div>



                        <div class="div_design">
                            <input class="btn btn-primary" type="submit" value="Update Product">
                        </div>

                    </form>
                </div>



            </div>
        </div>

        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>
