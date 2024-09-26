




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BETTER CALL US - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    
   

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars">zaazaz</i>
                    </button>

                    <!-- Topbar Search -->
                   @include('admin.topbar')
                <!-- End of Topbar -->

           <div>
    <h1>Type Events List</h1>

    {{-- Success message --}}
    @if(session('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- Button to create a new Type Event --}}
    <div>
        <a href="{{ route('type_events.create') }}">Create New Type Event</a>
    </div>

    {{-- Display the list of TypeEvents --}}
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($typeEvents as $typeEvent)
                <tr>
                    <td>{{ $typeEvent->id }}</td>
                    <td>{{ $typeEvent->title }}</td>
                    <td>{{ $typeEvent->description }}</td>
                    <td>
                        @if($typeEvent->image)
                            <img src="{{ asset('storage/' . $typeEvent->image) }}"alt="Event Image" style="width:100px;height:100px;">
                        @else
                            No image
                        @endif
                    </td>
                    <td>
                        {{-- Get by ID (View) Button --}}
                        <a href="{{ route('type_events.show', $typeEvent->id) }}">
                            <button>detail</button>
                        </a>

                        {{-- Update (Edit) Button --}}
                        <a href="{{ route('type_events.edit', $typeEvent->id) }}">
                            <button>Update</button>
                        </a>

                        {{-- Delete Form --}}
                        <form action="{{ route('type_events.destroy', $typeEvent->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/">Back to Home</a>

</div>
               
<!-- Footer -->
@include('admin.footer')
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
@include('admin.logout')
<!-- Bootstrap core JavaScript-->
<script src="admin/vendor/jquery/jquery.min.js"></script>
<script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="admin/js/demo/chart-area-demo.js"></script>
<script src="admin/js/demo/chart-pie-demo.js"></script>

</body>
</html>

