@extends('layouts.master')
@section('title')
    Your Settings
    @parent
@stop

@section('page_styles')
@stop

@section('top')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>
                    Settings
                </h3>
            </div>
        </div>
    </div>

@stop
@section('scripts')
    @if (Spark::billsUsingStripe())
        <script src="https://js.stripe.com/v2/"></script>
    @else
        <script src="https://js.braintreegateway.com/v2/braintree.js"></script>
    @endif
@endsection

@section('content')
<spark-settings :user="user" :teams="teams" inline-template>
    <div class="spark-screen container">
        <div class="row">
            <!-- Tabs -->
            <div class="col-md-4">
                <div class="panel panel-default panel-flush">
                    <div class="panel-heading">
                        Settings
                    </div>

                    <div class="panel-body">
                        <div class="spark-settings-tabs">
                            <ul class="nav spark-settings-stacked-tabs" role="tablist">
                                <!-- Profile Link -->
                                <li role="presentation">
                                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                        <i class="fa fa-fw fa-btn fa-edit"></i>Profile
                                    </a>
                                </li>

                                <!-- Teams Link -->
                                @if (Spark::usesTeams())
                                    <li role="presentation">
                                        <a href="#{{str_plural(Spark::teamString())}}" aria-controls="teams" role="tab" data-toggle="tab">
                                            <i class="fa fa-fw fa-btn fa-users"></i>{{ ucfirst(str_plural(Spark::teamString())) }}
                                        </a>
                                    </li>
                                @endif

                                <!-- Security Link -->
                                <li role="presentation">
                                    <a href="#security" aria-controls="security" role="tab" data-toggle="tab">
                                        <i class="fa fa-fw fa-btn fa-lock"></i>Security
                                    </a>
                                </li>

                                <!-- API Link -->
                                @if (Spark::usesApi() && Spark::developer(Auth::user()->email))
                                    <li role="presentation">
                                        <a href="#api" aria-controls="api" role="tab" data-toggle="tab">
                                            <i class="fa fa-fw fa-btn fa-cubes"></i>API
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Billing Tabs -->
                @if (Spark::canBillCustomers())
                    <div class="panel panel-default panel-flush">
                        <div class="panel-heading">
                            Billing
                        </div>

                        <div class="panel-body">
                            <div class="spark-settings-tabs">
                                <ul class="nav spark-settings-stacked-tabs" role="tablist">
                                    @if (Spark::hasPaidPlans())
                                        <!-- Subscription Link -->
                                        <li role="presentation">
                                            <a href="#subscription" aria-controls="subscription" role="tab" data-toggle="tab">
                                                <i class="fa fa-fw fa-btn fa-shopping-bag"></i>Subscription
                                            </a>
                                        </li>
                                    @endif

                                    <!-- Payment Method Link -->
                                    <li role="presentation">
                                        <a href="#payment-method" aria-controls="payment-method" role="tab" data-toggle="tab">
                                            <i class="fa fa-fw fa-btn fa-credit-card"></i>Payment Method
                                        </a>
                                    </li>

                                    <!-- Invoices Link -->
                                    <li role="presentation">
                                        <a href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">
                                            <i class="fa fa-fw fa-btn fa-history"></i>Invoices
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Tab Panels -->
            <div class="col-md-8">
                <div class="tab-content">
                    <!-- Profile -->
                    <div role="tabpanel" class="tab-pane active" id="profile">
                        @include('settings.profile')
                    </div>

                    <!-- Teams -->
                    @if (Spark::usesTeams())
                        <div role="tabpanel" class="tab-pane" id="{{str_plural(Spark::teamString())}}">
                            @include('settings.teams')
                        </div>
                    @endif

                    <!-- Security -->
                    <div role="tabpanel" class="tab-pane" id="security">
                        @include('settings.security')
                    </div>

                    <!-- API -->
                    @if (Spark::usesApi())
                        <div role="tabpanel" class="tab-pane" id="api">
                            @include('settings.api')
                        </div>
                    @endif

                    <!-- Billing Tab Panes -->
                    @if (Spark::canBillCustomers())
                        @if (Spark::hasPaidPlans())
                            <!-- Subscription -->
                            <div role="tabpanel" class="tab-pane" id="subscription">
                                <div v-if="user">
                                    @include('settings.subscription')
                                </div>
                            </div>
                        @endif

                        <!-- Payment Method -->
                        <div role="tabpanel" class="tab-pane" id="payment-method">
                            <div v-if="user">
                                @include('settings.payment-method')
                            </div>
                        </div>

                        <!-- Invoices -->
                        <div role="tabpanel" class="tab-pane" id="invoices">
                            @include('settings.invoices')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</spark-settings>
@endsection
