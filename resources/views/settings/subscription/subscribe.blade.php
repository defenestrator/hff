@if (Spark::billsUsingStripe())
    @include('settings.subscription.subscribe-stripe')
@endif
