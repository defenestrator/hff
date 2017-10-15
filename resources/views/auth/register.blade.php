@if (Spark::billsUsingStripe())
    @include('auth.register-stripe')
@else
    @include('auth.register-braintree')
@endif
