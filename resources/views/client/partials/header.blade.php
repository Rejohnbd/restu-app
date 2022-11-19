<header class="main-header">
    <a href="@if(Auth::user()->role->slug === 'admin'){{ route('admin-dashboard') }}@elseif(Auth::user()->role->slug === 'editor'){{ route('editor-dashboard') }}@elseif(Auth::user()->role->slug === 'viewer'){{ route('viewer-dashboard') }}@endif" class="logo">
        <span class="logo-mini"><b>R</b>A</span>
        <span class="logo-lg"><b>RESTU</b> APP</span>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('img/'. Auth::user()->image) }}" class="user-image" alt="{{ Auth::user()->last_name }}">
                        <span class="hidden-xs">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('img/'. Auth::user()->image) }}" class="img-circle" alt="{{ Auth::user()->last_name }}">
                            <p>
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                <small>Member Since</small>
                                <small>{{ date('d-M-Y', strtotime(Auth::user()->created_at)) }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>