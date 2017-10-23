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
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav" style="z-index:100">
                <li class="dropdown thumb-dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Places<span class="caret"></span></a>
                    <ul class="scrollable-menu dropdown-menu" role="menu">
                        <li role="presentation" class="dropdown-header">Alaska</li>
                        <li>
                            <a href="/destinations/naknek-river-camp">
                                Naknek River Camp
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">British Columbia</li>
                        <li>
                            <a href="/destinations/deep-creek-lodge">
                                Deep Creek Lodge
                            </a>
                        </li>
                        <li>
                            <a href="/destinations/blackfish-lodge">
                                Blackfish Lodge
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Mexico</li>
                        <li>
                            <a href="/destinations/costa-de-cocos">
                                Costa de Cocos
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Bahamas</li>
                        <li>
                            <a href="/destinations/two-boys-inn-andros">
                                Two Boys Inn
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Idaho</li>
                        <li>
                            <a href="/destinations/backcountry-river-guides">
                                Backcountry River Guides
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{route('publications.posts.index')}}" class="navbar-link dropdown">Blog</a></li>
                {{--<li><a href="{{route('publications.podcasts.index')}}" class="navbar-link">Podcast</a></li>--}}
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

            </ul>
        </div>
    </div>
</nav>
