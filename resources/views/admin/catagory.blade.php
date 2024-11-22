<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
            color: white;
        }

        .h2_front {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
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

                <div class="div_center">
                    <h2 class="h2_front">Add Catagory</h2>
                    <form action="{{url('/add_catagory')}}" method="POST">
                        @csrf
                        <input class="input_color" type="text" name="catagory" placeholder="Write catagory name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
