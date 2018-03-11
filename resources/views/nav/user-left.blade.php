<!-- Left Side Of Navbar -->
{{--@include('nav.places')--}}
<site-search></site-search>
<li><a href="{{ route('publications.posts.index') }}" class="navbar-link">Blog</a></li>
@include('nav.places')
@if(config('app.env') == 'production')
    <li><a href="https://have-rod-will-travel.fireside.fm" class="navbar-link">Podcast</a></li>
@else
    <li><a href="#" class="navbar-link">Podcast</a></li>
@endif
