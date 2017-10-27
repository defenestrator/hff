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
                        {{--<li>--}}
                            {{--<a href="/destinations/alaska/boardwalk-lodge">--}}
                                {{--Boardwalk Lodge--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/alaska/bristol-bay-sportfishing">--}}
                                {{--Bristol Bay Sportfishing--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/alaska/hidden-basin">--}}
                                {{--Hidden Basin--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/alaska/kvichak-lodge">--}}
                                {{--Kvichak Lodge--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/alaska/midnight-sun-trophy-pike">--}}
                                {{--Midnight Sun Trophy Pike--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="/destinations/alaska/naknek-river-camp">
                                Naknek River Camp
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Argentina</li>
                        <li>
                            <a href="/destinations/argentina/rio-manso-lodge">
                                Rio Manso Lodge
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Australia</li>
                        <li>
                            <a href="/destinations/australia/true-blue-bonefish">
                                True Blue Bonefish
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Bahamas</li>
                        {{--<li>--}}
                            {{--<a href="/destinations/bahamas/big-charlie-andros">--}}
                                {{--Big Charlie--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/bahamas/swains-cay-lodge-andros">--}}
                                {{--Swains Cay Lodge--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/bahamas/tranquility-lodge-andros">--}}
                                {{--Tranquility Lodge--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="/destinations/bahamas/two-boys-inn-andros">
                                Two Boys Inn
                            </a>
                        </li>
                        {{--<li class="divider"></li>--}}
                        {{--<li role="presentation" class="dropdown-header">Baja</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/baja/pursuit-anglers-baja">--}}
                                {{--Pursuit Anglers--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Belize Area</li>
                        {{--<li>--}}
                            {{--<a href="/destinations/belize/el-pescador">--}}
                                {{--El Pescador--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="/destinations/belize/mango-creek-lodge">
                                Mango Creek Lodge
                            </a>
                        </li>
                        <li>
                            <a href="/destinations/belize/the-blue-bonefish">
                                The Blue Bonefish
                            </a>
                        </li>
                        <li class="divider"></li>
                        {{--<li role="presentation" class="dropdown-header">Bolivia</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/bolivia/pluma-lodge-untamed-angling">--}}
                                {{--Pluma Lodge--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="divider"></li>--}}
                        <li role="presentation" class="dropdown-header">British Columbia</li>
                        <li>
                            <a href="/destinations/british-columbia/deep-creek-lodge">
                                Deep Creek Lodge
                            </a>
                        </li>
                        <li>
                            <a href="/destinations/british-columbia/blackfish-lodge">
                                Blackfish Lodge
                            </a>
                        </li>
                        {{--<li class="divider"></li>--}}
                        {{--<li role="presentation" class="dropdown-header">Christmas Island</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/christmas-island/ikari-house">--}}
                                {{--Ikari House--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="divider"></li>--}}
                        {{--<li role="presentation" class="dropdown-header">Costa Rica</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/costa-rica/bahia-rica">--}}
                                {{--Bahia Rica--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/costa-rica/silver-king-lodge">--}}
                                {{--Silver King Lodge--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="divider"></li>--}}
                        {{--<li role="presentation" class="dropdown-header">Florida</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/florida/bahia-honda-sporting-club">--}}
                                {{--Bahia Honda Sporting Club--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Idaho</li>
                        <li>
                            <a href="/destinations/idaho/backcountry-river-guides">
                                Backcountry River Guides
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Labrador/Newfoundland</li>
                        {{--<li>--}}
                            {{--<a href="/destinations/labrador/fly-fishing-labrador">--}}
                                {{--Fly Fishing Newfoundland--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="/destinations/labrador/salmon-hole-lodge">
                                Salmon Hole Lodge
                            </a>
                        </li>
                        {{--<li>--}}
                            {{--<a href="/destinations/labrador/silver-bullet-lodge">--}}
                                {{--Silver Bullet Lodge--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="divider"></li>--}}
                        {{--<li role="presentation" class="dropdown-header">Louisiana</li>--}}
                        {{--<li>--}}
                            {{--<a href="/destinations/louisiana/drum-house">--}}
                                {{--Drum House--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">New Zealand</li>
                        <li>
                            <a href="/destinations/new-zealand/stonefly-lodge">
                                Stonefly Lodge
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li role="presentation" class="dropdown-header">Yucatan</li>
                        <li>
                            <a href="/destinations/yucatan/costa-de-cocos">
                                Costa de Cocos
                            </a>
                        </li>
                        <li class="divider"></li>
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
