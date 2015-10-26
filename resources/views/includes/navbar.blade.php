<nav class="navbar navbar-default navbar-fixed-top mynavbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/"><img class="logo" alt="Brand" src="{{ asset('images/logo1.png') }}"><img class="logo1" alt="Brand" src="{{ asset('images/logo2.png') }}"></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (! Auth::check())
                    <li><a href="/register">Sign Up</a></li>
                    <li><a href="/signin">Login</a></li>
                @elseif( Auth::check() )

                    <div class="dropdown">
                            <img class="dropdown-toggle" type="button" data-toggle="dropdown" src="{{ Auth::user()->avatar_url }}" height="40" width="40" style="border-radius:10px;margin-top: 3px;margin-right: 20px;" />
                        <ul class="dropdown-menu">
                            <li><a href="#">Edit Account</a></li>
                            <li><a href="{{ route('videos.index') }}">My Videos</a></li>
                            <li><a href="{{ route('auth.logout') }}">Sign Out</a></li>
                        </ul>
                    </div>
                @endif
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>