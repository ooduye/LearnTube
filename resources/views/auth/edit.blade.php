@extends('layouts.master')

@section('content')

    @include('layouts.partials.sidebar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header"> Edit Profile</h1>

        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" enctype="multipart/form-data" action="{{ url('editprofile') }}">
                @if ( isset(Auth::user()->avatar_url) )
                    <img class="picture" src="{{ Auth::user()->avatar_url }}" alt="" height="100" width="100"/><br />
                @elseif (! isset(Auth::user()->avatar_url) )
                    <img class="picture" src="{{ Auth::user()->getAvatarUrl() }}" alt="" height="100" width="100"/><br />
                @endif
                Select image to upload:
                <input type="file" name="avatar_url" id="avatar_url">
                <br />
                <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                    <label for="fullname" class="control-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control" id="fullname" value="{!! Auth::user()->fullname ?: '' !!}">
                    @if ($errors->has('fullname'))
                        <span class="help-block">{{ $errors->first('fullname') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="control-label">User Name</label>
                    <input type="text" name="username" class="form-control" id="username" value="{!! Auth::user()->username ?: '' !!}">
                    @if ($errors->has('username'))
                        <span class="help-block">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{!! Auth::user()->email ?: '' !!}">
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