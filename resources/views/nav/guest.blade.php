<nav class="navbar site-navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
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
                {{--<li class="dropdown thumb-dropdown">--}}
                    {{--<a href="{{route('publications.posts.index')}}" class="dropdown-toggle" data-toggle="dropdown">Trips<span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu" role="menu">--}}
                        {{--<li role="presentation" class="dropdown-header">Steelhead and Salmon</li>--}}
                        {{--<li>--}}
                            {{--<a href="trips/backcountry-river-guides">--}}
                                {{--Backcountry River Guides--}}
                                {{--<div class="thumbnail">--}}
                                    {{--<img class="img-responsive" src="/images/backcountry-river-guides/slide1-178.jpg">--}}
                                    {{--<div class="caption">--}}
                                        {{--<p>Roadless Wilderness Jet Boat Steelhead</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--Deep Creek Lodge--}}
                                {{--<div class="thumbnail">--}}
                                    {{--<img class="img-responsive" src="/images/gourley/bonefish.jpg">--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--Flat user profile--}}
                                {{--<div class="thumbnail">--}}
                                    {{--<img class="img-responsive" src="images/gourley/bonefish.jpg">--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="divider"></li>--}}
                        {{--<li role="presentation" class="dropdown-header">Thumbnail with caption</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--Discount labels--}}
                                {{--<div class="thumbnail">--}}
                                    {{--<img class="img-responsive" src="images/gourley/bonefish.jpg">--}}
                                    {{--<div class="caption">--}}
                                        {{--<p>You can add any text for describe thumbnail here.</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li><a href="{{route('publications.posts.index')}}" class="navbar-link dropdown">Blog</a></li>
                <li><a href="{{route('publications.podcasts.index')}}" class="navbar-link">Podcast</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

            </ul>
        </div>
    </div>
</nav>
