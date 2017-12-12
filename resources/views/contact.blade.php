@extends('layouts.master')

@section('title')
Contact
@parent
@stop
@section('page_styles')
<style>
    .form-control {
    background-color: #fff;
    border: 1px solid #D6D4D4;
    width: 100%;
    }

    .contact .input-group {
    display: block;
    }

    form {
    padding: 15px 15px 15px 0;
    }
    input[type="text"], input[type="email"] {
    display: block;
    margin-bottom: 10px;
    height: 40px;
    width: 100%;
    }
    .input-group{ margin-bottom: 15px;}

    .media-right{
    padding-top: 7%;

    }
    .address1>li{margin-bottom: 30px;}
    .media-top .box-icon {
    background-color: #464b17;
    border: 1px solid #464b17;
    border-radius: 50%;
    display: table;
    height: 40px;
    width: 40px;
    margin:0px;
    }
    .media-top .box-icon>i{position: relative;
    left: 8px;
    top:7px;
    }
    .padleft10{
    padding-left: 10px;
    }
    .padbtm2{
    padding-bottom: 5%;
    }

    #address_margt{
    margin-top: 40px;
    }
    .resize_vertical{
    resize: vertical;
    }
</style>
@stop

@section('top')
    <img style="width:100%;" src="{{ asset('/images/gourley/rod-rack.jpg') }}" >
@stop


@section('content')

    <!-- //map Section End -->
    <!-- Container Section Start -->
    <div class="container">
        <div class="row">
            <!-- Contact form Section Start -->
            <div class="col-md-6">
                <h2>Holler at us!</h2>
                <!-- Notifications -->
                <div id="errors">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form class="contact" id="contact" action="{{route('contact')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <input type="text" name="contact-name"
                               class="form-control input-lg" placeholder="name"
                               value="{{ old('contact-name') }}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="contact-email" class="form-control input-lg"
                               placeholder="email" value="{{ old('contact-email') }}"required>
                    </div>
                    <div class="form-group">
                        <textarea name="contact-msg"
                                  class="form-control input-lg no-resize resize_vertical"
                                  rows="6"
                                  placeholder="message" required>{{ old('contact-msg') }}</textarea>
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
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                el: '#map',
                center: {
                    lat: 43.6939533,
                    lng: -116.4674612,
                },
                zoom: 13
            })
            var myLatLng ={lat:43.6936333, lng:-116.4819652}
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hobo Fly Fishing, LLC',
                label: {text: 'Hobo Fly Fishing, LLC'},
                animation: google.maps.Animation.DROP,
//                icon: '/img/fish-icon-black-blue.png'
            });
        }
    </script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAlEAneL0N4yo8Le6I57Whheu-BqgtvDhU&callback=initMap" async defer>
    </script>
@stop
