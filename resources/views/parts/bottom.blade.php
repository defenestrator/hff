<div class="copyright">
    <div class="container">
        <div class="legal"><ul class="inline">
                <li class="text-white small">&copy; Hobo Fly Fishing, LLC - {{ date('M d, Y') }}</li>
                <li class="footer-link"><a href="{{ route('terms') }}">Terms</a>
                </li>
                <li class="footer-link"><a href="{{ route('privacy') }}">Privacy</a>
                </li>
                @if (Auth::check())
                    <li class="footer-link"><a href="{{ route('logout') }}">Logout</a>
                    </li>
                @else
                    <li class="footer-link"><a href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>