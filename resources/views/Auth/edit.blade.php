@extends('layouts.master')

@section('content')

    @include('layouts.partials.sidebar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header"> Edit Profile</h1>

        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{{ url('editprofile') }}">
                Select image to upload:
                <input type="file" name="avatar_url" id="avatar_url">
                <br />
                <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                    <label for="fullname" class="control-label">Full Name</label>
                    <input type="text" name="title" class="form-control" id="title" value="{!! Auth::user()->fullname ?: '' !!}">
                    @if ($errors->has('fullname'))
                        <span class="help-block">{{ $errors->first('fullname') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="control-label">User Name</label>
                    <input type="text" name="title" class="form-control" id="title" value="{!! Auth::user()->username ?: '' !!}">
                    @if ($errors->has('username'))
                        <span class="help-block">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" name="title" class="form-control" id="title" value="{!! Auth::user()->email ?: '' !!}">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn bt">Update</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {!! method_field('PUT') !!}
            </form>
        </div>
    </div>
@stop