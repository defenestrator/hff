<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" title="showcases">Lodges<span class="caret"></span></a>
    <ul class="scrollable-menu dropdown-menu" role="menu">
        @foreach($showcases as $showcase)
            <li><a href="/showcases/{{$showcase->slug}}" title="{{$showcase->title}}">{{$showcase->title}}</a></li>
            @endforeach
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" title="showcases">Places<span class="caret"></span></a>
    <ul class="scrollable-menu dropdown-menu" role="menu">
        @foreach($regions as $region)
            <li><a href="/regions/{{$region->slug}}" title="{{$region->name}}">{{$region->name}}</a></li>
        @endforeach
    </ul>
</li>


