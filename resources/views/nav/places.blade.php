<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown">Showcases<span class="caret"></span></a>
    <ul class="scrollable-menu dropdown-menu" role="menu">
        @foreach($showcases as $showcase)
            <li><a href="/showcases/{{$showcase->slug}}" title="{{$showcase->title}}">{{$showcase->title}}</a></li>
            @endforeach
    </ul>
</li>


