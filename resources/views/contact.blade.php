@extends('master')

@section('title')
Contact
@parent
@stop
@section('page_styles')
@stop

@section('top')
@stop

@section('content')
    <!-- Map Section Start -->
    <div class="">
        <div id="map" style="width:100%; height:400px;"></div>
    </div>
    <!-- //map Section End -->
    <!-- Container Section Start -->
    <div class="container">
        <div class="row">
            <!-- Contact form Section Start -->
            <div class="col-md-6">
                <h2>Holler at us!</h2>
                <!-- Notifications -->
                <div id="notific">
                @include('notifications')
                </div>
                <form class="contact" id="contact" action="{{route('contact')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <input type="text" name="contact-name" class="form-control input-lg" placeholder="name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="contact-email" class="form-control input-lg" placeholder="email" required>
                    </div>
                    <div class="form-group">
                        <textarea name="contact-msg"
                                  class="form-control input-lg no-resize resize_vertical"
                                  rows="6"
                                  placeholder="message" required></textarea>
                    </div>
                    <div class="form-group recaptcha">
                        {!! Recaptcha::render() !!}
                    </div>
                    <div class="input-group">
                        <button class="btn btn-primary input-lg" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <!-- //Contact Form Section End -->
            <!-- Address Section Start -->
            <div class="col-md-6 col-sm-6" id="address_margt">
                <div class="media media-right">
                    <div class="media-left media-top">
                        <a href="#address" title="write us!">
                            <div class="box-icon">
                                <i class="livicon" data-name="home" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                            </div>
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Address:</h4>
                        <address>
                            Hobo Fly Fishing, LLC
                            <br> 289 N Hullen Place
                            <br> Star, ID
                            <br> 83669
                        </address>
                    </div>
                </div>
                <div class="media padleft10">
                    <div class="media-left media-top">
                        <a href="tel:1-208-859-9133" title="call us!">
                            <div class="box-icon">
                                <i class="livicon" data-name="phone" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                            </div>
                        </a>
                    </div>
                    <div class="media-body padbtm2">

                        <h4 class="media-heading">Telephone:</h4> <a href="tel:1-208-859-9133">(208) 859-9133</a>
                    </div>
                </div>
            </div>
            <!-- //Address Section End -->
        </div>
    </div>
    
@stop

{{-- page level scripts --}}
@section('page_scripts')
    <!-- page level js starts-->
    <script type="text/javascript" src="{{ asset('js/raphael-min.js') }}" ></script>

    <script type="text/javascript" src="{{ asset('js/gmaps.min.js') }}" ></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAlEAneL0N4yo8Le6I57Whheu-BqgtvDhU"></script>
    <!--page level js ends-->
    <script>
        $(document).ready(function() {
            var map = new GMaps({
                el: '#map',
                lat: 43.6939533,
                lng: -116.4174612,
                zoom: 13
            });
            map.addMarker({
                lat: 43.6936333,
                lng: -116.4819652,
                title: 'Hobo Fly Fishing, LLC',
                label: {text: 'Hobo Fly Fishing, LLC', color: "#2890d3"},
                animation: google.maps.Animation.DROP,
                icon: '/img/fish-icon-black-blue.png'
            });
        });
    </script>
@stop
