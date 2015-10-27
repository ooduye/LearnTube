@extends('layouts.master')

@section('content')

    <div class="middlePage">
        <div class="page-header">
            <h2 class="logo"><a href={{ route('index') }}>LearnTube </a><small>Learning Management App for Human Beings!</small></h2>

        </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">
                @include('layouts.partials.alerts')

                <div class="row">

                    <div class="col-md-5 social">
                        <a class="btn btn-info socials" style="background-color: #444444;" href="/login/github" role="button">Login with Github</a>
                        <a class="btn btn-info socials" style="background-color: #3b5998;" href="/login/facebook" role="button">Login with Facebook</a>
                        <a class="btn btn-info socials" style="background-color: #55acee;" href="/login/twitter" role="button">Login with Twitter</a>
                    </div>

                    <div class="col-md-7" style="border-left:1px solid #ccc;height:160px; padding: 30px; padding-top: 0px;">

                        <form class="form-horizontal" role="form" method="post" action="{{ route('auth.login') }}">
                            <fieldset>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="email" placeholder="Enter Email" class="form-control" id="email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" name="password" placeholder="Enter Password" class="form-control" id="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="checkbox" style="margin-left: 5px;">
                                        <input type="checkbox" name="remember"> <small>Remember me</small>
                                <a class="pull-right" href="#"><small> Forgot Password?</small></a><br/></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-sm pull-right">Sign in</button>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </fieldset>
                        </form>

                    </div>

                </div>

            </div>
        </div>

        <p><a href="https://github.com/andela-ooduye">About</a> · Oduye</p>
@stop