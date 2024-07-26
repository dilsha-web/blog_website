{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.homecss')

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
    <!-- Navbar  -->
    <nav class="navbar target">
        @include('home.nav')
    </nav>
    <div class="menu target"></div>
    <!-- End of Navbar  -->
    <div class="container-scroller">

        <div class="post_container">
            <div class="post_card border">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="post_card-header mt-5 border text-center">
                    <h1>Update Post</h1>
                </div>
                <div class="post_card-body">
                    <form action="{{ url('post_update', $post->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control mb-3" name="title" type="text" value="{{ $post->title }}"
                            @required(true) />

                        <label for="description" class="form-label">Description</label><br>
                        <textarea class="form-control mb-3" name="description" type="text" @required(true)>
                              {{ $post->description }}  </textarea><br>

                        <label for="oldImage" class="form-label ">Old Image</label>
                        <img src=" /postImages/{{ $post->image }}" style="width: 50px; height: 50px;" alt="">

                        <label for="image" class="form-label mt-3 mb-2">Update Image</label><br>
                        <input class="form-control mb-5" name="image" type="file" accept="image/*">

                        <button class="btn btn-primary mt-2 w-100">Update</button>
                    </form>


                </div>
            </div>

        </div>
        <!-- Section 4 -->

        @include('home.section.section4')
        <!-- End of Section 4 -->




    </div>


    <script src="script.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>






</body>

</html> --}}



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
                        <h1>Update Post</h1>
                    </div>

                    <div class="post_card-body">
                        <form action="{{ url('post_update', $post->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <label for="title" class="form-label">Title</label><br>
                            <input class="form-control mb-3" name="title" type="text"
                                value="{{ $post->title }}" />
                            <br>

                            <label for="description" class="form-label">Description</label>
                            <br>
                            <textarea class="form-control mb-3" name="description" type="text">{{ $post->description }}</textarea>
                            <br>
                            <label for="image" class="form-label">Old Image</label><br>
                            <img src="/postImages/{{ $post->image }}"
                                style="width: 60px; height: 60px; margin-left: 20px">
                            <br>
                            <label for="image" class="form-label">Image</label><br>
                            <input class="form-control mb-5" name="image" type="file" accept="image/*">
                            <br>
                            <button class="btn" type="submit" id="submit">Update post</button>
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
