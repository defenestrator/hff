<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link href="{{ mix('/css/styles.css') }}" rel="stylesheet">

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
    <script type="text/javascript">
        var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq ||
                {widgetcode:"e0874322f75d50cec866f910a689558b35a5657cc193aa69072010f52c4d8107235e9be4eefa2a5d772b10d6e3e9e349", values:{},ready:function(){}};
        var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;
        s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);d.write("<div id='zsiqwidget'></div>");
    </script>
    @endif
    @yield('page_scripts')
</body>
</html>
