<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown">CMS<span class="caret"></span></a>
    <ul class="scrollable-menu dropdown-menu" role="menu" style="max-height:500px;">
        <li role="presentation" class="dropdown-header">Content</li>
        <li>
            <a href="/cms/posts">Blog</a>
        </li>
        @if(Spark::developer(Auth::user()->email))
            <li>
                <a href="/cms/showcases">Showcases</a>
            </li>
            <li>
                <a href="/cms/newsletters">Newsletters</a>
            </li>
            <li>
                <a href="/cms/publications">Publications</a>
            </li>
            <li role="presentation" class="divider"></li>
            <li role="presentation" class="dropdown-header">Data</li>
            <li>
                <a href="/cms/destinations">Destinations</a>
            </li>
            <li>
                <a href="/cms/fish-species">Fish Species</a>
            </li>
            <li>
                <a href="/cms/regions">Regions</a>
            </li>
        @endif
        <li role="presentation" class="divider"></li>
        {{--<li role="presentation" class="dropdown-header">Fish</li>--}}
        {{--<li>--}}
            {{--<a href="/cms/fish">Index</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="/cms/fish/new">New</a>--}}
        {{--</li>--}}
        {{--<li class="divider"></li>--}}
        {{--<li role="presentation" class="dropdown-header">Fisheries</li>--}}
        {{--<li>--}}
            {{--<a href="/cms/fish">Index</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="/cms/fish/new">New</a>--}}
        {{--</li>--}}
        {{--<li class="divider"></li>--}}
        {{--<li role="presentation" class="dropdown-header">Hatches</li>--}}
        {{--<li>--}}
            {{--<a href="/cms/fish">Index</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="/cms/fish/new">New</a>--}}
        {{--</li>--}}
        {{--<li class="divider"></li>--}}
        {{--<li  role="presentation" class="dropdown-header">Flies</li>--}}
        {{--<li>--}}
            {{--<a href="/cms/fish">Index</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="/cms/fish/new">New</a>--}}
        {{--</li>--}}
        {{--<li class="divider"></li>--}}
        {{--<li  role="presentation" class="dropdown-header">Fly Boxes</li>--}}
        {{--<li>--}}
            {{--<a href="/cms/fish">Index</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="/cms/fish/new">New</a>--}}
        {{--</li>--}}
        {{--<li class="divider"></li>--}}

        {{--<li  role="presentation" class="dropdown-header">Outfitters</li>--}}
        {{--<li>--}}
            {{--<a href="/cms/fish">Index</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="/cms/fish/new">New</a>--}}
        {{--</li>--}}
        {{--<li class="divider"></li>--}}
    </ul>
</li>
