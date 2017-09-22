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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/libs.css') }}">
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
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
    {{-- Social and contact icon bar for guests only--}}
        @if(Auth::guest())
            @include('parts.icon-section')
        @endif

    {{-- Serve different navigation for guests vs logged users --}}
        @if(Auth::check())
            @include('nav.user')
        @else
            @include('nav.guest')
        @endif
    </header>

    @yield('top')
    <div class="container">
        @yield('content')
    </div>
    @if(Auth::guest())
        @include('parts.footer')
    @endif
    @include('parts.bottom')
</div>
<!-- Spark Application-Level Modals -->
@if (Auth::check())
    @include('spark::modals.notifications')
    @include('spark::modals.support')
    @include('spark::modals.session-expired')
@endif

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/libs.js') }}" ></script>

<async-fonts></async-fonts>

@yield('page_scripts')

</body>
</html>
