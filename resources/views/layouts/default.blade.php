<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <title>
    	@section('title')
        | Hobo Fly Fishing
        @show
    </title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lib.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <!--end of global css-->
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
                Spark::scriptVariables(), []
        )); ?>;
    </script>
</head>

<body>
<div id="spark-app" v-cloak>
    <!-- Header Start -->
    <header class="site-header">
        <!-- Icon Section Start -->
        <div class="icon-section">
            <div class="container">
                <ul class="list-inline">
                    <li>
                        <a href="https://fb.me/hoboflyfishing"> <i class="livicon" data-name="facebook" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/flyfishidaho"> <i class="livicon" data-name="twitter" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/hoboflyfishing/"> <i class="livicon" data-name="instagram" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCJwjEQAWMuxqnw5VT4a9zpg"> <i class="livicon" data-name="youtube" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li class="pull-right">
                        <ul class="list-inline icon-position">
                            <li>
                                <a href="{{ URL::to('contact') }}"><i class="livicon" data-name="mail" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                                <label class="hidden-xs"> <a href="{{ URL::to('contact') }}" class="contact-link">info@hoboflyfishing.com</a></label>
                            </li>
                            <li>
                                <a href="tel:1-208-859-9133"><i class="livicon" data-name="phone" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                                <label class="hidden-xs"><a href="tel:1-208-859-9133" class="contact-link">(208)859-9133</a></label>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- //Icon Section End -->
        <!-- Nav bar Start -->
        <nav class="navbar navbar-default container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                    <span><a href="#"><i class="livicon" data-name="responsive-menu" data-size="25" data-loop="true" data-c="#757b87" data-hc="#ccc"></i>
                    </a></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/images/tits.png') }}" alt="logo" class="logo_position">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="{{ route('home') }}"> Home</a>
                    </li>

                    <li {!! (Request::is('blog') || Request::is('blogitem/*') ? 'class="active"' : '') !!}><a href="{{ URL::to('blog') }}"> Blog</a>
                    </li>
                    <li {!! (Request::is('contact') ? 'class="active"' : '') !!}><a href="{{ URL::to('contact') }}">Contact</a>
                    </li>
                    <li {{ (Request::is('tools') ? 'class=active' : '') }}><a href="{{ URL::to('tools') }}">Tools</a>
                    </li>
                    {{--based on anyone login or not display menu items--}}

                    @if(Auth::guest())
                        {{--<li><a href="{{ URL::to('register') }}">Register</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="{{ URL::to('login') }}">Login</a>--}}
                        {{--</li>--}}
                    @else
                        @if(Auth::getUser()->inRole('admin'))
                            <li{{ (Request::is('admin') ? 'class=active' : '') }}><a href="{{ URL::to('admin') }}">Admin</a></li>
                        @endif
                        <li {{ (Request::is('my-account') ? 'class=active' : '') }}><a href="{{ URL::to('my-account') }}">Profile</a>
                        </li>
                        <li><a href="{{ URL::to('logout') }}">Logout</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        <!-- Nav bar End -->
    </header>
    <!-- //Header End -->
    
    <!-- slider / breadcrumbs section -->
    @yield('top')

    <!-- Content -->
    @yield('content')

    <!-- Footer Section Start -->
    <footer>
        <div class="container footer-text">
            <!-- About Us Section Start -->
            <div class="col-sm-4">
                <a href="#about"><h4>About Us</h4></a>
                <p>
                    What little wisdom we have gained is from those anglers who are our betters.
                    The ones who smell like the water they fish. You know the ones.
                    They have that knowing look when they see the rods on your truck; They know who the locals are.
                </p>
                <p>Forget <em>about us</em>. We just know a few anglers who <strong>live</strong> the water.</p>

                <hr id="hr_border2">
                <a href="#follow"><h4 class="menu">Follow Us</h4></a>
                <ul class="list-inline">
                    <li>
                        <a href="https://fb.me/hoboflyfishing"> <i class="livicon" data-name="facebook" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/flyfishidaho"> <i class="livicon" data-name="twitter" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/hoboflyfishing/"> <i class="livicon" data-name="instagram" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCJwjEQAWMuxqnw5VT4a9zpg"> <i class="livicon" data-name="youtube" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- //About us Section End -->

            <div class="col-sm-4">

                <div class="news menu">
                    <a href="#newsletter"><h4>Newsletter</h4></a>
                    <p>Get special deals and exclusive trip packages. We only send about one email per month.</p>
                    <form method="POST" action="{{ route('newsletter') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input name="email"
                                   type="email"
                                   class="form-control input-lg"
                                   placeholder="your email"
                                   value="{{ old('email') }}"
                                   aria-describedby="basic-addon2"
                                   required
                            >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary text-white" role="button">Subscribe</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-sm-4">
                <!-- Contact Section Start -->
                <a href="#contact"><h4>Contact</h4></a>
                <ul class="list-unstyled">
                    <li>289 N. Hullen Pl.</li>
                    <li>Star, ID 83669</li>
                    <li class="footer-link">
                        <a href="tel:1-208-859-9133">
                            <i class="livicon icon4 icon3"
                               data-name="cellphone"
                               data-size="18"
                               data-loop="true"
                               data-c="#ccc" data-hc="#ccc"></i> (208)859-9133
                        </a>
                    </li>
                    <li class="footer-link">
                        <a href="{{ URL::to('contact') }}">
                            <i class="livicon icon3"
                               data-name="mail-alt"
                               data-size="20"
                               data-loop="true"
                               data-c="#ccc"
                               data-hc="#ccc"
                            ></i>
                            info@hoboflyshing.com
                        </a>
                    </li>
                </ul>
                <!-- //Contact Section End -->
            </div>
        </div>
    </footer>
    <!-- //Footer Section End -->
    <div class="copyright">
        <div class="container">
            <div class="legal"><ul class="inline">
                    <li class="text-white small">Copyright &copy; Hobo Fly Fishing, LLC {{ date('M d Y') }}</li>
                    <li class="text-white"> </li>
                    <li class="footer-link"><a href="{{ route('terms') }}">Terms</a>
                    </li>
                    <li class="footer-link"><a href="{{ route('privacy') }}">Privacy</a>
                    </li>
                    <li class="footer-link"><a href="{{ URL::to('login') }}">Login</a>
                    </li>
                    <li class="footer-link"><a href="{{ URL::to('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/lib.js') }}"></script>
<script>
    // Async loading of external fonts.
    link=document.createElement('link');
    link.href='https://fonts.googleapis.com/css?family=Raleway:100,300,600';
    link.rel='stylesheet';
    document.getElementsByTagName('head')[0].appendChild(link);
</script>
<!--global js end-->
<!-- begin page level js -->
@yield('footer_scripts')
<!-- end page level js -->
</body>
</html>
