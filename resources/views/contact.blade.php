@extends('layouts.master')

@section('title')
Contact us using this handy web form! Welcome to the future!
@parent
@stop
@section('page_styles')
<style>

    .media-right{
        padding-top: 7%;

    }
    .address1>li{margin-bottom: 30px;}

    .pad{padding-left: 10px; padding-bottom:20px;}


    .address_margin{
    margin-top: 40px;
    }

</style>
@stop

@section('top')
    <img style="width:100%;" src="https://hobo-assets.s3-us-west-2.amazonaws.com/images/gourley/rod-rack.jpg">
@stop

@section('content')
        <div class="row">
            <!-- Contact form Section Start -->
            <div class="col-sm-6">
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
                <form class="contact" id="contact" style="margin-bottom:2em; " action="{{route('contact')}}" method="POST">
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
                                  class="form-control input-lg"
                                  rows="6"
                                  placeholder="message" required>{{ old('contact-msg') }}</textarea>
                    </div>
                    <div class="input-group">
                        <button class="btn btn-primary input-lg" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <!-- //Contact Form Section End -->
            <!-- Address Section Start -->
            <div class="col-sm-6 hidden-xs address_margin" id="">
                <div class="media media-right">
                    <div class="media-left media-top">
                        <a href="#address" title="write us!">
                            <div>
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Address:</h4>
                        <address>
                             Hobo Fly Fishing 
                            <br> 289 N Hullen Place
                            <br> Star, ID 83669
                        </address>
                    </div>
                </div>
                <div class="media pad">
                    <div class="media-left media-top">
                        <a href="tel:1-208-283-8654" title="call us!">
                            <div>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                    <div class="media-body">

                        <h4 class="media-heading">Telephone:</h4> <a href="tel:1-208-283-8654">(208) 283-8654</a>
                    </div>
                </div>
            </div>
           &nbsp; <!-- //Address Section End -->
        </div>
    
@stop

@section('page_scripts')

@stop
