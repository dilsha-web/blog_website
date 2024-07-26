<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.homecss') <!--Include all the styles in the home.homecss file-->

    <style>

    </style>
</head>

<body>

    <!-- Navbar  -->
    <nav class="navbar target">
        @include('home.nav')
    </nav>
    <div class="menu target"></div>
    <!-- End of Navbar  -->

    <div>


        <div class="post_container mt-5">
            <div class="col-6 ">
                <!--alert-message-->
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif

                <div class="post_card">
                    <div class="post_card-header">
                        <h1>Add Post</h1>
                    </div>

                    <div class="post_card-body">
                        <form action="{{ url('user_post_store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <label for="title" class="form-label">Title</label><br>
                            <input class="form-control mb-3" name="title" type="text" @required(true) />
                            <br>

                            <label for="description" class="form-label">Description</label>
                            <br>
                            <textarea class="form-control mb-3" name="description" type="text" @required(true)></textarea>
                            <br>
                            <label for="image" class="form-label">Image</label><br>
                            <input class="form-control mb-5" name="image" type="file" accept="image/*">
                            <br>
                            <button class="btn" type="submit" id="submit">Add post</button>
                        </form>


                    </div>
                </div>
            </div>

        </div>

        <!-- Section 4 -->

        @include('home.section.section4')
        <!-- End of Section 4 -->
    </div>
    <script src="script.js"></script>

    {{-- <script>
        document.getElementById('submit').addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'

            });

        }).then(
            (result) => {
                if (result.isConfirmed) {
                    document.getElementById('submit').submit();

                }
            }
        );
    </script> --}}
</body>

</html>
