<ul class="nav navbar-nav navbar-right">
<li {!! (Request::is('publications/posts') ? 'class="active"' : '') !!}><a href="{{  route('publications.posts.index') }}"> Blog</a>
</li>
<li {!! (Request::is('publications/podcasts') ? 'class="active"' : '') !!}><a href="{{  route('publications.podcasts.index') }}"> Podcast</a>
</li>
@if(Auth::guest())
<li><a href="{{ URL::to('login') }}">Login</a>
</li>
@else
<li><a href="{{ URL::to('logout') }}">Logout</a>
</li>
@endif
</ul>