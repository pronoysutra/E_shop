<!DOCTYPE html>
<html lang="en">

<head>
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

                <div class="div_center">
                    <h1 class="front_size">Add Product</h1>

                    <form action="{{route('store.product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Product Title:</label>
                            <input class="text_color" type="text" name="title" placeholder="Write a title " required="">
                        </div>



                        <div class="div_design">
                            <label>Product Description:</label>
                            <input class="text_color" type="text" name="description" placeholder="Write a description " required>
                        </div>



                        <div class="div_design">
                            <label>Product Price:</label>
                            <input class="text_color" type="number" name="price" placeholder="Write a price " min="0" required>
                        </div>



                        <div class="div_design">
                            <label>Product Quantity:</label>
                            <input class="text_color" type="text" name="quantity" min="0" placeholder="Write a quantity " required>
                        </div>



                        <div class="div_design">
                            <label>Product Discount Price:</label>
                            <input class="text_color" type="number" name="discount_price" placeholder="Write a discount price  ">
                        </div>



                        <div class="div_design">
                            <label>Product Catagory:</label>
                            <select class="text_color" name="catagory" required>
                                <option value="" selected="">Add a catagory here</option>
                                @foreach($catagory as $catagorys)
                                <option value="{{$catagorys->catagory_name}}">
                                    {{$catagorys->catagory_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>



                        <div class="div_design">
                            <label>Product Image:</label>
                            <input type="file" name="image" required>
                        </div>



                        <div class="div_design">
                            <input class="btn btn-primary" type="submit" value="Add Product">
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
