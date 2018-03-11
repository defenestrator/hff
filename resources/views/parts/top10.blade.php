<h3 class="text-center">Top 10</h3>
@foreach($showcases->sortByDesc('updated_at')->take(10) as $showcase)
    <div class="col-md-12 info">
        <a href="/showcases/{{ $showcase->slug}}" title="{{$showcase->title}}">
            <div class="sidebar-thumbnail"
                 style="background: linear-gradient(rgba(0,0,0, 0.3),rgba(0,0,0, 0.3)), url('{{$showcase->thumbnail}}') no-repeat; background-size:cover;">
                <div class="caption">
                    <h3 style="margin-top:0;">{{$showcase->homepage_top}}</h3>
                    <h3 class="hidden-sm hidden-md hidden-lg">{{$showcase->homepage_bottom}}</h3>
                </div>
                @if($showcase->special)
                    <button role="button" style="box-shadow: 2px 2px 2px #000; margin:0 15%; width:70%;" class="hidden-sm btn btn-warning">
                        <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                        <span>Learn More</span>
                    </button>
                @endif
            </div>
        </a>
    </div>
@endforeach
