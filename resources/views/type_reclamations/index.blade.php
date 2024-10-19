<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Green Recycle</title>
    <link rel="icon" href="{{ asset('img/logo/recycling.ico') }}" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

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
                <nav class="navbar navbar-expand navbar-dark bg-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars">zaazaz</i>
                    </button>

                    <!-- Topbar Search -->
                   @include('admin.topbar')
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <div class="container mt-5">
                        <h2 class="text-center mb-4">Type Reclamations</h2>

                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <!-- Button to Open Create Modal -->
                        <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createTypeModal">Add Type Reclamation</a>

                        <!-- Modal for Creating Reclamation Type -->
                     <!-- Modal for Creating Reclamation Type -->
<div class="modal fade" id="createTypeModal" tabindex="-1" role="dialog" aria-labelledby="createTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTypeModalLabel">Create Type Reclamation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to Create Reclamation Type -->
                <form action="{{ route('type_reclamations.store') }}" method="POST" id="createTypeForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Reclamation Type Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Reclamation Type" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>


                        <!-- Table Displaying Reclamation Types -->
                        <table class="table table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($types->isEmpty())
                                    <tr>
                                        <td colspan="3" class="text-center">No Type Reclamations found</td>
                                    </tr>
                                @else
                                    @foreach ($types as $type)
                                        <tr>
                                            <td>{{ $type->id }}</td>
                                            <td>{{ $type->name }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Actions">
                                                    <!-- Edit Button with Modal Trigger -->
                                                    <button class="btn btn-link action-btn" data-toggle="modal" data-target="#editModal-{{ $type->id }}" title="Edit">
                                                        <i class="fas fa-edit text-warning"></i> <!-- Edit Icon -->
                                                    </button>

                                                    <!-- Delete Form -->
                                                    <form action="{{ route('type_reclamations.destroy', $type->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link action-btn" title="Delete" onclick="return confirm('Are you sure you want to delete this type reclamation?');">
                                                            <i class="fas fa-trash text-danger"></i> <!-- Trash Icon -->
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>

                                        <!-- Edit Modal for Each Type -->
                                        <div class="modal fade" id="editModal-{{ $type->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $type->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel-{{ $type->id }}">Edit Type Reclamation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('type_reclamations.update', $type->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="name-{{ $type->id }}" class="form-label">Name</label>
                                                                <input type="text" class="form-control" id="name-{{ $type->id }}" name="name" value="{{ $type->name }}" >
                                                                @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
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
   <script>
    $(document).ready(function() {
        // On form submission
        $('#createTypeForm').on('submit', function(event) {
            var form = this;

            // AJAX form submission
            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: $(form).serialize(),
                success: function(response) {
                    // If successful, you may want to close the modal and refresh the page or append the new type to the list
                    $('#createTypeModal').modal('hide');
                    location.reload(); // or append to the table without refreshing
                },
                error: function(xhr) {
                    // Show validation errors and keep the modal open
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;

                        // Clear previous error messages
                        $('.text-danger').remove();

                        // Display error messages
                        $.each(errors, function(key, messages) {
                            $('#' + key).after('<span class="text-danger">' + messages[0] + '</span>');
                        });
                    }
                }
            });

            event.preventDefault(); // Prevent the default form submission
        });
    });
</script>

</body>
</html>
