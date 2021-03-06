<!-- NavBar For Authenticated Users -->
<spark-navbar
    :user="user"
    :teams="teams"
    :current-team="currentTeam"
    :has-unread-notifications="hasUnreadNotifications"
    :has-unread-announcements="hasUnreadAnnouncements"
    inline-template
>

    <nav class="navbar navbar-default site-navbar">
        <div class="container" v-if="user">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <div class="hamburger">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                @include('nav.authenticated-brand')
            </div>
            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @includeIf('nav.user-left')
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    @includeIf('nav.user-right')
                    @if (Spark::developer(Auth::user()->email))    <!-- Notifications -->
                    <li>
                        <a @click="showNotifications" class="has-activity-indicator">
                        <div class="navbar-icon">
                            <i class="activity-indicator" v-if="hasUnreadNotifications || hasUnreadAnnouncements"></i>
                            <i class="icon fa fa-bell"></i>
                        </div>
                        </a>
                    </li>
                     @endif
                    <li class="dropdown">
                        <!-- User Photo / Name -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img :src="user.photo_url" class="spark-nav-profile-photo">
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <li>
                                <a href="/dashboard">
                                    <i class="fa fa-fw fa-btn fa-tachometer"></i>Dashboard
                                </a>
                            </li>
                            <li class="divider"></li>
                            <!-- Impersonation -->
                            @if (session('spark:impersonator'))
                                <li class="dropdown-header">Impersonation</li>

                                <!-- Stop Impersonating -->
                                <li>
                                    <a href="/spark/kiosk/users/stop-impersonating">
                                        <i class="fa fa-fw fa-btn fa-user-secret"></i>Back To My Account
                                    </a>
                                </li>

                                <li class="divider"></li>
                            @endif

                            <!-- Developer -->
                            @if (Spark::developer(Auth::user()->email))
                                @include('nav.developer')
                            @endif

                            <!-- Subscription Reminders -->
                            @include('nav.subscriptions')

                            <!-- Settings -->
                            <li class="dropdown-header">Settings</li>

                            <!-- Your Settings -->
                            <li>
                                <a href="/settings">
                                    <i class="fa fa-fw fa-btn fa-cog"></i>Your Settings
                                </a>
                            </li>
                            <li class="divider"></li>

                            {{--@if (Spark::hasSupportAddress())--}}
                                <!-- Support -->
                                {{--@include('spark::nav.support')--}}
                            {{--@endif--}}

                            <!-- Logout -->
                            <li>
                                <a href="/logout">
                                    <i class="fa fa-fw fa-btn fa-sign-out"></i>Logout
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                &nbsp;
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</spark-navbar>
