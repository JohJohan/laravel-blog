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


            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @if (!Request::is('admin') )
                <li class="{{ Request::is('blog/*') ? 'active' : '' }}">
                    <a href="{{ url('/blog') }}">Blog</a>
                </li>
                @else
                <li class="{{ Request::is('admin') ? 'active' : '' }}">
                    <a href="{{ url('/admin') }}">Admin</a>
                </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Authentication Links -->
                @if (Request::is('admin') )
                    @if (Auth::guest())
                        <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">Login</a></li>
                        <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="{{ Request::is('posts') ? 'active' : '' }}">
                            <a href="{{ url('/admin/posts')}}">Posts</a>
                        </li>
                        <li class="{{ Request::is('comments') ? 'active' : '' }}">
                            <a  href="{{ url('/admin/comments')}}">Comments</a>
                        </li>
                        <li class="{{ Request::is('categories') ? 'active' : '' }}">
                            <a  href="{{ url('/admin/categories')}}">Categories</a>
                        </li>
                        <li class="{{ Request::is('tags') ? 'active' : '' }}">
                            <a  href="{{ url('/admin/tags')}}">Tags</a>
                        </li>
                        <li class="dropdown">
                            <a href="/admin" class="dropdown-toggle avatar">
                                <img src="/img/uploads/avatars/{{ $user->avatar }}" alt=""/> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/profile')}}">Profile</a>
                                </li>


                                <li class="divider"></li>

                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fa fa-fw fa-power-off"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                @else
                <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ url('/about') }}">About</a></li>
                <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ url('/contact') }}">Contact</a></li>
                    @if (Auth::guest())
                        <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="/admin" class="dropdown-toggle avatar">
                                <img src="/img/uploads/avatars/{{ $user->avatar }}" class="" alt="" /> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/profile')}}">Profile</a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fa fa-fw fa-power-off"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>
