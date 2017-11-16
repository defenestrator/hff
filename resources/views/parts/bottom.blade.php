<div class="copyright">
    <div class="container">
        <div class="payment-types"><ul class="inline">
                <li class="small" >We accept all major credit cards, Paypal, ACH, BitCoin, and many others:</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="payment-types"><ul class="inline payment-icons">
                <li>
                    <img src="{{config('filesystems.disks.DO.fullpath')}}/images/payment-types/american_express.png"
                        alt="We accept American Express" title="We accept American Express">
                </li>
                <li>
                    <img src="{{config('filesystems.disks.DO.fullpath')}}/images/payment-types/visa.png"
                         alt="We accept Visa" title="We accept Visa">
                </li>
                <li>
                    <img src="{{config('filesystems.disks.DO.fullpath')}}/images/payment-types/mastercard.png"
                         alt="We accept Mastercard" title="We accept Mastercard">
                </li>
                <li>
                    <img src="{{config('filesystems.disks.DO.fullpath')}}/images/payment-types/discover.png"
                         alt="We accept Discover" title="We accept Discover">
                </li>
                <li>
                    <img src="{{config('filesystems.disks.DO.fullpath')}}/images/payment-types/diners_club.png"
                         alt="We accept Diners Club" title="We accept Diners Club">
                </li>
                <li>
                    <img src="{{config('filesystems.disks.DO.fullpath')}}/images/payment-types/paypal.png"
                         alt="We accept Paypal" title="We accept Paypal">
                </li>
                <li>
                    <img src="{{config('filesystems.disks.DO.fullpath')}}/images/payment-types/ach-payment.png"
                         alt="We accept ACH Payments" title="We accept ACH Payments">
                </li>
                <li>
                    <img src="{{config('filesystems.disks.DO.fullpath')}}/images/payment-types/currency_bitcoin_sign.png"
                         alt="We accept Bitcoin!" title="We accept Bitcoin!">
                </li>
                <li>
                    <img src="{{config('filesystems.disks.DO.fullpath')}}/images/payment-types/currency_euro_sign.png"
                         alt="We accept Euros, and more than 130 other currencies!"
                         title="We accept Euros, and more than 130 other currencies!">
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="payment-types"><ul class="inline">
                <li class="small" >We adhere to proven security and end-to-end encryption practices, through our partnership with Stripe.com</li>

            </ul>
        </div>
    </div>
</div>

<div class="copyright">
    <div class="container">
        <div class="legal"><ul class="inline">
                <li class="small">&copy; Hobo Fly Fishing, LLC - {{ date('M d, Y') }}</li>
                <li class="small footer-link"><a href="{{ route('terms') }}">Terms</a>
                </li>
                <li class="small footer-link"><a href="{{ route('privacy') }}">Privacy</a>
                </li>
                @if (Auth::check())
                    <li class="small footer-link"><a href="{{ route('logout') }}">Logout</a>
                    </li>
                @else
                    <li class="small footer-link"><a href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>