<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.homecss') <!--Include all the styles in the home.homecss file-->

</head>

<body>

    <!-- Navbar  -->
    <nav class="navbar target">
        @include('home.nav')
    </nav>
    <div class="menu target"></div>
    <!-- End of Navbar  -->

    <div class="container">
        <!-- Section 1 -->
        @include('home.section.section1')
        </section>
        <!-- End Section 1 -->

        <!-- Section 2 -->
        @include('home.section.section2')
        <!-- End of Section 2 -->

        <!-- Section 3 -->
        @include('home.section.section3')

        <!-- End of Section 3 -->

        <!-- Section 4 -->

        @include('home.section.section4')
        <!-- End of Section 4 -->
    </div>
    <script src="script.js"></script>
</body>

</html>
