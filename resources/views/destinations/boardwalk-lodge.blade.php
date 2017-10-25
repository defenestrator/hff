@extends('layouts.app')

@section('title')
    Boardwalk Lodge Alaska
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="" alt="" title="">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Boardwalk Lodge Alaska
    </h1>
@stop

@section('content')
    <h2>Coming soon...</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">

                    <p>...really soon.</p>
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <sales-inquiry></sales-inquiry>
                    <p></p>
                </article>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            &nbsp;
        </div>
    </div>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop