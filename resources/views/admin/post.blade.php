<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
    <style>
        .container {
            display: flex;
            justify-content: center;
            /*center horizontally*/
            align-items: center;
            /*center vertically*/


        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.probanner')
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            @include('admin.nav')
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                @include('admin.sidebar')
            </nav>
            <div class="container mt-5">
                <div class="col-6 ">
                    <!--alert-message-->
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <div class="card border">

                        <div class="card-header mt-5 border text-center">
                            <h1>Add Post</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('post_create') }}" method="POST" enctype="multipart/form-data">

                                @csrf
                                <label for="title" class="form-label">Title</label>
                                <input class="form-control mb-3" name="title" type="text" @required(true) />

                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control mb-3" name="description" type="text" @required(true)></textarea>

                                <label for="image" class="form-label">Image</label><br>
                                <input class="form-control mb-5" name="image" type="file" accept="image/*">

                                <button class="btn btn-primary mt-2 w-100">Submit</button>
                            </form>


                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            @include('admin.footer')
        </footer>
        <!-- partial -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <script src="admin/assets/js/jquery.cookie.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

</body>

</html>
