<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"
        integrity="sha512-orJ/OcUhrhNkg8wgNre5lGcUJyhj1Jsot/QSnRKKiry8ksGvApbHBEbq7AbMsTSv4LnnfR3NSajCQFFsEGe8ig=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            <!--alert-message-->
            @if (Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @endif
            <div class="col-8">
                <div class="row">

                    <table
                        class="table  table-bordered table-hover m-5 p-5 table-striped table-light table-responsive w-100 scroll">
                        <thead>
                            <tr>
                                <th>Post title</th>
                                <th>Description</th>
                                <th>Post by</th>
                                <th>Post status</th>
                                <th>UserType</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->post_status }}</td>
                                    <td>{{ $post->usertype }}</td>
                                    <td><img src="/postimages/{{ $post->image }}" alt="" width="100px"></td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" href="{{ url('post_delete', $post->id) }}"
                                            onclick="confirmation(event)">Delete</a>

                                        <a class="btn btn-primary btn-sm"
                                            href="{{ url('post_edit', $post->id) }}">Update</a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                        </tbody>
                    </table>
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
    <script src="{{ mix('js/app.js') }}"></script>


    <script>
        function confirmation(ev) {

            ev.preventDefault(); // prevent form submit
            var urlToRediarect = ev.currentTarget.getAttribute('href'); // get form action url
            console.log(urlToRediarect);
            swal({
                    title: "Are you sure to delete this?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true, // set to true if you want to make it false
                })

                .then((willCancel) => {

                    if (willCancel) {

                        window.location.href = urlToRediarect;
                    }
                });

        }
    </script>



</body>

</html>
