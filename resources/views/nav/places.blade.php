<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" title="showcases">Places<span class="caret"></span></a>
    <ul class="scrollable-menu dropdown-menu" role="menu">
        @foreach($regions as $region)
            <li><a class="text-center" style="font-size:18px; font-weight:600;" href="/regions/{{$region->slug}}" title="{{$region->name}}">{{$region->name}}</a></li>
            @foreach($showcases->sortBy('title') as $showcase)
                @if($region->id == $showcase->region_id)
                    <li><a href="/showcases/{{$showcase->slug}}">{{$showcase->title}}</a></li>
                @endif
            @endforeach
            <li class="divider"></li>
        @endforeach

    </ul>
</li>


