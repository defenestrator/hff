@extends('layouts.master')
@section('page_styles')
@stop

@section('top')
    &nbsp;
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    @include('shared.errors')

                    <form class="form-horizontal" role="form" method="POST" action="/login">
                        {{ csrf_field() }}

                        <!-- E-Mail Address -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="#login-email" type="email" class="email form-control" name="email" value="{{ old('email') }}" autofocus>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="#login-password" type="password" class="password form-control" name="password">
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button name="login-button" type="submit" id="login-button" class="btn btn-primary">
                                    <i class="fa m-r-xs fa-sign-in"></i>Login
                                </button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>

                            <div class="col-md-8 col-md-offset-4">
                                {{--<a class=" btn btn-link" href="{{ url('/register') }}">Create A New Account</a>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
