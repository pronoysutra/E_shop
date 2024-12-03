<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        .table {
            width: 100%;
            /* Ensures table spans 100% of container */
            border-collapse: collapse;
            /* Removes gaps between cells */
        }

        .table th,
        .table td {
            padding: 10px;
            /* Adds spacing inside cells */
            text-align: center;
            /* Aligns text to center */
            border: 1px solid #ddd;
            /* Adds a light border */
            word-wrap: break-word;
            /* Prevents long text overflow */
        }

        .table th {
            background-color: #2a2a2a;
            /* Dark background for header */
            color: greenyellow;
            /* Matches your `#th_color` */
            font-weight: bold;
        }

        .table td {
            color: whitesmoke;
            /* Matches your `#text_white` */
        }

        .table img {
            max-width: 100px;
            /* Limits image width */
            height: auto;
            /* Maintains aspect ratio */
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .table-wrapper {
            overflow-x: auto;
            /* Enables horizontal scrolling for smaller screens */
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
                    <h2 class="h2_front">All Orders</h2>
                    <div class="">
                        <div class="table-wrapper">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Product Title</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Delivery Status</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Delivered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order as $index => $order)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->product_title }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->payment_status }}</td>
                                        <td>{{ $order->delivery_status }}</td>
                                        <td>
                                            <img src="{{ asset('product/' . $order->image) }}" alt="" style="width: 100px; height: auto; border-radius: 8px; border: 1px solid #ddd; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                                        </td>
                                        <td>
                                            @if($order->delivery_status == 'processing')
                                            <a href="{{ route('delivered', $order->id) }}" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this item?')">Delivered</a>
                                            @else
                                            <p class="text-success">Delivered</p>
                                            @endif
                                        </td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

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
