<div class="copyright">
    <div class="container">
        <div class="payment-types"><ul class="inline">

                <li class="small">
                    <img src="{{config('filesystems.disks.DO.fullpath')}}/images/payment-types/blah.png">
                </li>


            </ul>
        </div>
    </div>
    <div class="container">
        <div class="payment-types"><ul class="inline">
                <li class="small" style="color:white;">Electronic payments are processed using state-of-the-art security
                    and end-to-end encryption, through <a href="https://stripe.com" target="_blank">Stripe.com</a></li>
                <li class="small">There are literally too many to list, but we'll add some
                        cool icons here soon to make you feel comfortable.</li>
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