<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"
        integrity="sha512-orJ/OcUhrhNkg8wgNre5lGcUJyhj1Jsot/QSnRKKiry8ksGvApbHBEbq7AbMsTSv4LnnfR3NSajCQFFsEGe8ig=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <base href="/public">
    @include('home.homecss')
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            font-weight: 300;
            line-height: 1em;
            color: #A7A1AE;
        }

        .container {
            background-image: url("./images/gallery-img-1.jpg"), linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.4));
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100vh;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            /*center horizontally*/
            align-items: center;
            /*center vertically*/
            height: 100vh;

        }

        .table-heading th {
            font-size: 15px;
            font-weight: 900;
            color: black;
            text-align: center;
            padding: 10px;
            border: 1px solid black;
            background-color: white
        }

        .table-data td {
            font-size: 15px;
            color: black;
            text-align: center;
            padding: 10px;
            border: 1px solid black;
            background-color: #A7A1AE
        }

        .table-image {
            width: 50px;
            height: 50px;
        }

        .card-btn {
            width: 100px;
            background-color: #111;
            color: #888;
            border-radius: 5rem;
            font-size: 0.5rem;
            font-weight: 800;
            letter-spacing: 0.2rem;
            text-transform: uppercase;
            border: none;
            padding: 0.5rem 0;
            cursor: pointer;
            text-align: center;
            align-items: center;
            justify-content: center;
            box-shadow: -0.2rem -0.2rem 0.2rem #000;
            margin-bottom: 2rem;
        }

        .card-btn a {
            text-decoration: none;
            color: #888;
            font-size: 1.5rem;
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
    <div class="container">

        <!--alert-message-->
        @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        <div class="col-8">
            <div class="row">

                <table class="table">
                    <thead>
                        <tr class="table-heading">
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
                            <tr class="table-data">
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->post_status }}</td>
                                <td>{{ $post->usertype }}</td>
                                <td class="table-image"><img src="/postimages/{{ $post->image }}" alt=""></td>
                                <td>
                                    <button class="card-btn" type="submit" id="submit"><a
                                            href="{{ url('user_post_delete', $post->id) }}">Delete</a></button>

                                    <button class="card-btn" type="sumit" id="submit"><a
                                            href="{{ url('user_post_edit', $post->id) }}">Update</a></button>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Section 4 -->

    @include('home.section.section4')
    <!-- End of Section 4 -->


    <script src="script.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>


    <script></script>



</body>

</html>
