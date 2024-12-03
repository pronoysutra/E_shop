<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

   <style>
    .center {
        margin: auto;
        width: 50%; /* Allow full width */
        border: 2px solid greenyellow;
        text-align: center;
        margin-top: 40px;
        overflow-x: auto; /* Enable horizontal scrolling */
    }
    .front_size {
        text-align: center;
        font-size: 40px;
        padding-top: 20px;
    }
    .img_size {
        width: 80px;
        height: 80px;
        object-fit: cover; /* Ensures proper cropping */
    }
    .th_color {
        background-color: blue;
    }
    .th_design {
        padding: 15px;
    }
   </style>

</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <h2 class="front_size">All Products</h2>




                    <div class="table-wrapper">
                        <table class="center">
                            <tr class="th_color">
                                <th class="th_design">No</th>
                                <th class="th_design">Product Title</th>
                                <th class="th_design">Description</th>
                                <th class="th_design">Price</th>
                                <th class="th_design">Discount Price</th>
                                <th class="th_design">Category</th>
                                <th class="th_design">Quantity</th>
                                <th class="th_design">Image</th>

                                <th class="th_design" colspan="2">Action</th>

                            </tr>
                            @foreach($product as $index => $products)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $products->title }}</td>
                                <td>{{ $products->description }}</td>
                                <td>{{ $products->price }}</td>
                                <td>{{ $products->discount_price }}</td>
                                <td>{{ $products->catagory }}</td>
                                <td>{{ $products->quantity }}</td>
                                <td>
                                            <img src="{{ asset('product/' . $products->image) }}" alt="" style="width: 100px; height: auto; border-radius: 8px; border: 1px solid #ddd; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                                        </td>

                                <td><a class="btn btn-danger m-1" href="{{route('delete.product',$products->id)}}"  onclick="return confirm('Are you sure you want to delete this item?')" >Delete</a></td>

                                <td><a class="btn btn-success m-1" href="{{route('edit.product',$products->id)}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- Pagination -->

            </div>
        </div>
    </div>

    @include('admin.script')
</body>

</html>
