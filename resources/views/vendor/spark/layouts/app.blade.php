<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @yield('scripts', '')

    <!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
            Spark::scriptVariables(), []
        )); ?>;
    </script>
</head>
<body>
    <div id="spark-app" v-cloak>
        <header class="site-header">
            {{-- Social and contact icon bar for guests only--}}
            @if(Auth::guest())
                @include('parts.icon-section')
            @endif

            <!-- Navigation -->
            @if (Auth::check())
                @include('nav.user')
            @else
                @include('nav.guest')
            @endif
        </header>

        @yield('top')
        <!-- Main Content -->
        <div class="container">
            @yield('content')
        </div>
        @if(Auth::guest())
        @include('parts.footer')
        @endif
        @include('parts.bottom')
        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('spark::modals.notifications')
            @include('spark::modals.support')
            @include('spark::modals.session-expired')
        @endif
    </div>
    <!-- JavaScript -->
    <script type="text/javascript" src="{{ asset('js/libs.js') }}" ></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/raphael-min.js') }}" ></script>
    <script src="{{asset('/js/livicons-1.4.min.js')}}"></script>
    @yield('page_scripts')
</body>
</html>
