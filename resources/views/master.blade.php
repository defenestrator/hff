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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    @yield('page_styles')
    <script>
        window.Spark = <?php echo json_encode(array_merge(
                Spark::scriptVariables(), []
        )); ?>;
    </script>
</head>

<body>
<div id="spark-app" v-cloak>
    <header class="site-header">
    @if(Auth::guest())
        @include('parts.icon-section')
    @endif

    @if(Auth::check())
        @include('nav.user')
    @else
        @include('nav.guest')
    @endif
    </header>
    <!-- //Header End -->

    <!-- slider / breadcrumbs section -->
    @yield('top')

    <!-- Content -->
    @yield('content')

    @if(Auth::guest())
        @include('parts.footer')
    @endif
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
<!-- Application Level Modals -->
@if (Auth::check())
    @include('spark::modals.notifications')
    @include('spark::modals.support')
    @include('spark::modals.session-expired')
@endif
<!--global js starts-->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('/js/livicons-1.4.min.js')}}"></script>
<script src="/js/sweetalert.min.js"></script>
<script>
    // Async loading of external fonts.
    link=document.createElement('link');
    link.href='https://fonts.googleapis.com/css?family=Raleway:100,300,600';
    link.rel='stylesheet';
    document.getElementsByTagName('head')[0].appendChild(link);
</script>
@yield('page_scripts')
</body>
</html>
