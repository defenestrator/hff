<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <style>
        @import "/css/styles.css";
    </style>

    <!-- Scripts -->
    @yield('scripts', '')
</head>
<body>
    <div>
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
            @include('modals.notifications')
            @include('modals.support')
            @include('modals.session-expired')
        @endif
    </div>
    <!-- JavaScript -->
    @if(config('app.env') == 'production')
    @endif
    @yield('page_scripts')
</body>
</html>
