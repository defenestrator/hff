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
            <ul class="nav navbar-nav">
                <li class="dropdown thumb-dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Trips<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation" class="dropdown-header">Steelhead and Salmon</li>
                        <li>
                            <a href="/trips/backcountry-river-guides">
                                Backcountry River Guides
                                {{--<div class="thumbnail">--}}
                                    {{--<img class="img-responsive" src="/images/backcountry-river-guides/slide1-178.jpg">--}}
                                    {{--<div class="caption">--}}
                                        {{--<p>Idaho's Salmon River</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </a>
                        </li>
                        <li>
                            <a href="/trips/naknek-river-camp">
                                Naknek River Camp
                                {{--<div class="thumbnail">--}}
                                    {{--<img class="img-responsive" src="/images/naknek-river-camp/steelie.jpg">--}}
                                    {{--<div class="caption">--}}
                                        {{--<p>Bristol Bay, AK area!</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </a>
                        </li>
                        <li>
                            <a href="/trips/deep-creek-lodge">
                                Deep Creek Lodge
                                {{--<div class="thumbnail">--}}
                                    {{--<img class="img-responsive" src="/images/deep-creek-lodge/stacks-image-14435c9-1200x594.jpg">--}}
                                    {{--<div class="caption">--}}
                                        {{--<p>Coming Soon!</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </a>
                        </li>
                        <li>
                        </li>
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Bonefish and Permit</li>
                        <li>
                            <a href="/trips/costa-de-cocos">
                                Costa de Cocos
                                {{--<div class="thumbnail">--}}
                                    {{--<img class="img-responsive" src="/images/costa-de-cocos/OttoMannandAlberto_640x419.jpg">--}}
                                    {{--<div class="caption">--}}
                                        {{--<p>Xcalac, MX, on the Belize border!</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{route('publications.posts.index')}}" class="navbar-link dropdown">Blog</a></li>
                <li><a href="{{route('publications.podcasts.index')}}" class="navbar-link">Podcast</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

            </ul>
        </div>
    </div>
</nav>
