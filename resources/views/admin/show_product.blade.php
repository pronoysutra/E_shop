<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

   <style>
    .center{
        margin: auto;
        width: 80%;
        border: 2px solid greenyellow;
        text-align: center;
        margin-top: 40px;
    }
.front_size{
    text-align: center;
    font-size: 40px;
    padding-top: 20px;
}
.img_size{
    width: 80px;
    height: 80px;

}
.th_color{
    background-color: blue;
}
.th_design{
    padding: 25px;
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
<h2 class="front_size">All Product</h2>

                <table class=" center">

                        <tr class="th_color">

                            <th class="th_design"> No</th>
                            <th class="th_design" >Product Title </th>
                            <th class="th_design"> Description</th>
                            <th class="th_design"> Price </th>
                            <th class="th_design"> discount Price </th>
                            <th class="th_design"> Catagory </th>
                            <th class="th_design"> Quantity </th>
                            <th class="th_design"> Image </th>
                        </tr>
                        @foreach($product as $index=>$products)
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{$products->title}}</td>
                        <td>{{$products->description}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->discount_price}}</td>
                        <td>{{$products->catagory}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>

                        <img class="img_size" src="/product/{{$products->image}}" alt="">
                        </td>
                    </tr>
                    @endforeach
                </table>

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
