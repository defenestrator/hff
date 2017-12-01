<!DOCTYPE html>
<html lang="en">
<head>
    @if(config('app.env') == 'production')
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107298455-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-107298455-1');
        </script>
    @endif
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon-100.png" sizes="100x100">
    <title>@yield('title', config('app.name'))</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' rel='stylesheet' type='text/css'>
    <link href="{{ mix('/css/styles.css') }}" rel="stylesheet">
    <!-- Page level Styles -->
    @yield('page_styles', '')
    <!-- Page level Scripts -->
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
        <div class="container">&nbsp;</div>
        <!-- Main Content -->
        <div class="container">
            @yield('content')
        </div>
        @yield('bottom')
        @if(Auth::guest())
        @include('parts.footer')
        @include('parts.bottom')
        @endif

        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('modals.notifications')
            @include('modals.support')
            @include('modals.session-expired')
        @endif
    </div>
    <!-- JavaScript -->
    <script src="{{ mix('js/script.js') }}"></script>

    @yield('page_scripts')
</body>
</html>
