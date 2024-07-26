<a href="{{ url('home') }}" class="logo">
    <i class="fas fa-hamburger"></i>
    <p>CRAVE</p>
</a>
<a href="{{ url('home') }}" class="navbar-link">
    <i class="fas fa-home"></i>
    <span>Home</span>
</a>
<a href="#" class="navbar-link">
    <i class="fas fa-table"></i>
    <span>About</span>
</a>
<a href="#" class="navbar-link">
    <i class="fas fa-laptop"></i>
    <span>Services</span>
</a>
<a href="{{ url('user_post_create') }}" class="navbar-link">
    <i class="fas fa-user"></i>
    <span>AddPost</span>
</a>
<a href="{{ url('user_post_show') }}" class="navbar-link">
    <i class="fas fa-user"></i>
    <span>MyPost</span>
</a>

@if (Route::has('login'))
    @auth
        <ul class="nav-item">
            <li>
                <x-app-layout></x-app-layout>
            </li>
        </ul>
    @else
        <a href="{{ route('login') }}" class="navbar-link">
            <i class="fas fa-user"></i>
            <span>Login</span>
        </a>
        <a href="{{ route('register') }}" class="navbar-link">
            <i class="fas fa-user"></i>
            <span>Register</span>
        </a>

    @endauth
@endif
