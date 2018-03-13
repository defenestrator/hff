<nav class="navbar site-navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <div class="hamburger">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            @include('nav.brand')
        </div>
        <div class="collapse navbar-collapse" id="spark-navbar-collapse">
            {{-- Left Side Of Navbar --}}
            <ul class="nav navbar-nav" style="z-index:100">
                <site-search></site-search>

                @include('nav.places')

                <li><a href="{{route('publications.posts.index')}}" class="navbar-link dropdown">Blog</a></li>

                @if(config('app.env') == 'production')
                    <li><a href="https://have-rod-will-travel.fireside.fm" class="navbar-link">Podcast</a></li>
                @else
                    <li><a href="#" class="navbar-link">Podcast</a></li>
                @endif

                <li><a href="/maps/world" class="navbar-link">Map</a></li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @if (! Auth::check())
                    <li class="small footer-link"><a href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
