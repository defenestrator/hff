@if (Spark::developer(Auth::user()->email))
    @include('nav.cms')
@endif
