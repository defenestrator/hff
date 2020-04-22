<div class="copyright">
    <div class="container">
        <div class="payment-types"><ul class="inline">
                <li class="small" >We accept all major credit cards, Paypal, ACH, Bitcoin, and many others</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="payment-types"><ul class="inline payment-icons">
                <li>
                    <img src="{{Storage::disk('s3')->url('images')}}/payment-types/american_express.png"
                        alt="We accept American Express" title="We accept American Express">
                </li>
                <li>
                    <img src="{{Storage::disk('s3')->url('images')}}/payment-types/visa.png"
                         alt="We accept Visa" title="We accept Visa">
                </li>
                <li>
                    <img src="{{Storage::disk('s3')->url('images')}}/payment-types/mastercard.png"
                         alt="We accept Mastercard" title="We accept Mastercard">
                </li>
                <li>
                    <img src="{{Storage::disk('s3')->url('images')}}/payment-types/diners_club.png"
                         alt="We accept Diners Club" title="We accept Diners Club">
                </li>
                <li>
                    <img src="{{Storage::disk('s3')->url('images')}}/payment-types/paypal.png"
                         alt="We accept Paypal" title="We accept Paypal" style="height:50px;">
                </li>
                <li>
                    <img src="{{Storage::disk('s3')->url('images')}}/payment-types/ach-payment.png"
                         alt="We accept ACH Payments" title="We accept ACH Payments" style="height:50px;">
                </li>
                <li>
                    <img src="{{Storage::disk('s3')->url('images')}}/payment-types/currency_bitcoin_sign.png"
                         alt="We accept BTC" title="We accept BTC" style="height:50px;">
                </li>
                <li>
                    <img src="{{Storage::disk('s3')->url('images')}}/payment-types/currency_euro_sign.png"
                         alt="We accept Euros, and more than 130 other currencies!"
                         title="We accept Euros, and more than 130 other currencies!" style="height:50px;">
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="payment-types"><ul class="inline">
                <li class="small" >Payments processed using proven security practices through our partnership with Stripe.com</li>

            </ul>
        </div>
    </div>
</div>

<div class="copyright">
    <div class="container">
        <div class="legal"><ul class="inline">
                <li style="opacity:0.3;"class="small">&copy;  Hobo Fly Fishing  - {{ now('M d, Y') }}</li>
                <li class="small footer-link"><a href="{{ route('terms') }}">Terms</a>
                </li>
                <li class="small footer-link"><a href="{{ route('privacy') }}">Privacy</a>
                </li>
                <li class="small footer-link"><a href="{{ route('login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</div>