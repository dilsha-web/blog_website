<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.homecss') <!--Include all the styles in the home.homecss file-->
    <style>
        .details-container {
            display: flex;
            justify-content: center;
            /*center horizontally*/
            align-items: center;
            /*center vertically*/
            height: auto;
            margin-top: 15rem;
        }

        .details-card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 40rem;
            height: 40rem;
            background-color: #a8e657;
            box-shadow: 0.5rem 0.5rem 0.5rem #000;
            margin-bottom: 8rem;
            margin-top: 2rem
        }

        .details-card-name {
            font-size: 3rem;
            font-weight: 800;
            color: #333;
            margin-top: 4rem;
            margin-bottom: 2rem;
        }

        .details-card-img {
            width: 20rem;
            height: 20rem;
            margin-top: 1rem;
            margin-bottom: 2rem;
        }

        p {
            text-align: justify;
            font-size: 1.5rem;
            padding: 0.5rem;
            color: #333;
            margin-bottom: 2rem;

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

    <div>

        <div class="details-container">
            <div class="details-card">
                <h3 class="details-card-name">{{ $post->title }}</h3>
                <img src="/postImages/{{ $post->image }}" alt="" class="details-card-img">
                <p>{{ $post->description }}</p>

            </div>
        </div>


        <!-- Section 4 -->

        @include('home.section.section4')
        <!-- End of Section 4 -->
    </div>
    <script src="script.js"></script>
</body>

</html>
