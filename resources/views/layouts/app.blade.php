<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link href="{{ mix('/css/styles.css') }}" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107298455-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-107298455-1');
    </script>

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
        @yield('bottom')
        @if(Auth::guest())
        @include('parts.footer')
        @endif
        @include('parts.bottom')
        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('modals.notifications')
            @include('modals.support')
            @include('modals.session-expired')
        @endif
    </div>
    <!-- JavaScript -->
    <script src="{{ mix('js/script.js') }}"></script>
    @if(config('app.env') == 'production')

    @endif
    @yield('page_scripts')
</body>
</html>
