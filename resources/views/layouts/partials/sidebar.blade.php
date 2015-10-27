<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li style="margin-left:20px;">
            @if ( isset(Auth::user()->avatar_url) )
                <img src="{{ Auth::user()->avatar_url }}" height="50" width="50" style="border-radius:25px;" />
            @elseif (! isset(Auth::user()->avatar_url) )
                <img src="{{ Auth::user()->getAvatarUrl()  }}" height="50" width="50" style="border-radius:25px;" />
            @endif
        </li>
        <li style="padding-left: 5px"> @ {{ Auth::user()->username }}</li>
        <li class="active"><a href="/">LEARNTUBE<span class="sr-only">(current)</span></a></li>
        <li><a href="/editprofile">Edit Account</a></li>
        <li><a href="{{ route('videos.index') }}">My Videos</a></li>
    </ul>
    <hr/>
    <ul class="nav nav-sidebar">
        <li><a href="/category/PHP">PHP</a></li>
        <li><a href="/category/Laravel">Laravel</a></li>
        <li><a href="/category/JavaScript">JavaScript</a></li>
        <li><a href="/category/AngularJS">AngularJS</a></li>
        <li><a href="/category/Python">Python</a></li>
        <li><a href="/category/Django">Django</a></li>
        <li><a href="/category/Ruby">Ruby</a></li>
        <li><a href="/category/Rails">Rails</a></li>
        <li><a href="/category/iOS">iOS</a></li>
    </ul>
</div>