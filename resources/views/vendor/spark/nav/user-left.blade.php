<ul class="nav navbar-nav navbar-right">
<li {!! (Request::is('posts') ? 'class="active"' : '') !!}><a href="{{ URL::to('posts') }}"> Blog</a>
</li>
@if(Auth::guest())
<li><a href="{{ URL::to('login') }}">Login</a>
</li>
@else
<li><a href="{{ URL::to('logout') }}">Logout</a>
</li>
@endif
</ul>