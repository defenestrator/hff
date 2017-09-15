@extends('master')
@section('title')
Have Rod Will Travel
@parent
@stop
@section('page_styles')
@stop

@section('top')
<carousel :autoplay="true" :per-page="1" :pagination-enabled="false">
    <slide><img style="width:100%" src="{{ asset('assets/images/gourley/DSC_0336.JPG') }}" alt="Saltwater Flats">
    </slide>
    <slide><img src="{{ asset('assets/images/gourley/bonefish.jpg') }}" alt="Bonefish landed next to Fly Rod on Sea Grass">
    </slide>
    <slide><img src="{{ asset('assets/images/gourley/DSC_0193.JPG') }}" alt="Tropical Beach with Boat">
    </slide>
    <slide><img src="{{ asset('assets/images/os/tarpon.jpg') }}" alt="Hungry Tarpon">
    </slide>
    <slide><img src="{{ asset('assets/images/gourley/grouper-websize.jpg') }}" alt="Big Grouper">
    </slide>
</carousel>
@stop
{{-- content --}}
@section('content')
    <div class="container">
        <section>
            <div class="container bg-border wow pulse" data-wow-duration="2.5s">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h1 class="tagline text-center">Elite Destinations, Local Flavor</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Service Section Start-->
        <div class="row">
            <div class="col-sm-6 col-md-3 wow bounceInLeft" data-wow-duration="1s">
                <div class="box">
                    <div class="box-icon">
                        <i class="livicon icon" data-name="anchor" data-size="55" data-c="#3f844e" data-hc="#464b17"></i>
                    </div>
                    <div class="info">
                        <h3 class="success text-center">DIY Destinations</h3>
                        <p>Get down and dirty, let us help you find some quiet out-of-the-way places.
                        </p>
                        <p>Do-it-yourself fly fishing has a significant learning curve, we can help you shorten it.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 wow bounceInDown" data-wow-duration="1s" data-wow-delay="0.2s">
                <!-- Box Start -->
                <div class="box">
                    <div class="box-icon box-icon1">
                        <i class="livicon icon1" data-name="paper-plane" data-size="55" data-c="#128BC6" data-hc="#128BC6"></i>
                    </div>
                    <div class="info">
                        <h3 class="primary text-center">Hybrid Trips</h3>
                        <p>
                            All the freedom of DIY plus a day or two of guided fishing with local experts to get your feet wet.
                        </p>
                        <p>
                            Holler at us and we can help you find your next adventure.
                        </p>
                    </div>
                </div>
            </div>
            <!-- //Easy to Use Section End -->
            <!-- Clean Design Section Start -->
            <div class="col-sm-6 col-md-3 wow bounceInUp" data-wow-duration="1.6s" data-wow-delay="0.8s">
                <div class="box">
                    <div class="box-icon box-icon2">
                        <i class="livicon icon1" data-name="rocket" data-size="55" data-c="#f89a14" data-hc="#f89a14"></i>
                    </div>
                    <div class="info">
                        <h3 class="warning text-center">Full Service Expeditions</h3>
                        <p>Full Service trips, for when you want all the comforts of home
                            and the absolute best fully-outfitted fishing experience.
                            Check out our carefully curated angling lodges.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 wow bounceInRight" data-wow-duration="2s" data-wow-delay="1.2s">
                <div class="box">
                    <div class="box-icon box-icon3">
                        <i class="livicon icon1" data-name="share" data-size="55" data-c="#FFD43C" data-hc="#FFD43C"></i>
                    </div>
                    <div class="info">
                        <h3 class="yellow text-center">Independent Guides</h3>
                        <p>Connect directly with local guides via our independent outfitter listings.
                            Book trips with them using our platform and get special perks found nowhere else.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- //Services Section End -->
    <!-- //Container End -->
@stop
{{-- footer scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.circliful.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/wow/js/wow.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/carousel.js') }}"></script>
    <!--page level js ends-->
@stop
