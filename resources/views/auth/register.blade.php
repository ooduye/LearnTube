@extends('layouts.master')

@section('content')

    <div style="text-align: center;">
        <h2 class="logo"><a href={{ route('index') }}>LearnTube </a><small>Learning Management App for Human Beings!</small></h2>

    </div>

    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Register Here <small>It's free!</small></h3>
                </div>
                <div class="panel-body">
                    <form class="form-vertical" role="form" method="post" action="{{ route('auth.register') }}">
                        <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <label for="fullname" class="control-label">Your Full Name</label>
                            <input type="text" name="fullname" class="form-control" id="fullname" value="{{ old('fullname') ?: '' }}">
                            @if ($errors->has('fullname'))
                                <span class="help-block">{{ $errors->first('fullname') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Your email address</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{ old('email') ?: '' }}">
                            @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="control-label">Choose a username</label>
                            <input type="text" name="username" class="form-control" id="username" value="{{ old('username') ?: '' }}">
                            @if ($errors->has('username'))
                                <span class="help-block">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Choose a password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            @if ($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Sign up</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                    <div class="col-md-5 social">
                        <a class="btn btn-info socials" style="background-color: #444444; width: 200px;" href="/login/github" role="button">Login with Github</a>
                        <a class="btn btn-info socials" style="background-color: #3b5998; width: 200px;" href="/login/facebook" role="button">Login with Facebook</a>
                        <a class="btn btn-info socials" style="background-color: #55acee; width: 200px;" href="/login/twitter" role="button">Login with Twitter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop