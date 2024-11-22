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

        #th_color {
            color: greenyellow;
        }

        #text_white {
            color: whitesmoke;
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
                    <h2 class="h2_front">Add Catagory</h2>
                    <form action="{{url('/add_catagory')}}" method="POST">
                        @csrf
                        <input class="input_color" type="text" name="catagory" placeholder="Write catagory name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
                    </form>

                </div>

                <div class="mt-4">
                    <table class="table table-bordered ">
                        <div>
                            <thead>
                                <tr>
                                    <th id="th_color" scope="col">serial</th>
                                    <th id="th_color" scope="col">Catagory Name</th>
                                    <th id="th_color" scope="col">Action</th>

                                </tr>
                            </thead>
                        </div>
                        @foreach ($data as $index=> $datas)
                        <tbody>
                            <tr>
                                <th id="text_white" scope="row">{{ $loop->iteration }}</th>
                                <td id="text_white">{{ $datas->catagory_name }}</td>
                                <td>
                                    <form action="{{ route('delete.catagory', $datas->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE') <!-- Spoof DELETE method -->
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                    </form>
                                </td>


                            </tr>
                        </tbody>
                        @endforeach
                    </table>
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
