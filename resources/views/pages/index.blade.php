@extends('layouts.master')

@section('content')
    @if (! Auth::check())
        <h1>Learning Management App for Human Beings</h1>

        <p>The promise of LearnTube is simple. Learn different technologies on one screen without having to filter by team or users. Finally, learning management system built just for human beings. Very Intuitve, Slick and crafted with the power of Laravel</p>

        <p><img src="{{ asset('images/learn.png') }}" /></p>

        <a class="btn btn-large btn-info" href="/auth/register">Sign Up</a>

        <p class="login">Already signed up? <a class="btn btn-large btn-info" href="/auth/signin">Login</a></p>
    @endif

    @if ( Auth::check())
        <div class="container-fluid">
            <div class="row">
                @include('layouts.partials.sidebar')
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Dashboard</h1>

                    <h2 class="sub-header">Videos</h2>
                    <a class="btn btn-info" href="{{ route('videos.create') }}">New Video</a>
                </div>
            </div>
        </div>
    @endif
@stop