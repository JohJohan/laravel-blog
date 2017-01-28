<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('blog') ? 'active' : '' }}">
                    <a href="{{ url('/blog') }}">Blog</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">Login</a></li>
                    <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li class="{{ Request::is('posts') ? 'active' : '' }}">
                                <a href="{{ url('/posts')}}">Posts</a>
                            </li>
                            <li class="{{ Request::is('comments') ? 'active' : '' }}">
                                <a  href="{{ url('/comments')}}">Comments</a>
                            </li>
                            <li class="{{ Request::is('categories') ? 'active' : '' }}">
                                <a  href="{{ url('/categories')}}">Categories</a>
                            </li>
                            <li class="{{ Request::is('tags') ? 'active' : '' }}">
                                <a  href="{{ url('/tags')}}">Tags</a>
                            </li>

                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ url('/about') }}">About</a></li>
                <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
