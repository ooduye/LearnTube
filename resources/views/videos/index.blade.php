@extends('layouts.master')

@section('content')

    @include('layouts.partials.sidebar')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <h1 class="page-header">
            My Videos
            <a class="btn btn-info" href="{{ route('videos.create') }}">New Video</a>
        </h1>

        @if( $video )
            <div class="row">
                @foreach ($video as $vid)
                    <div class="col-md-3 one-card">

                        <div class="card">
                            <div class="card-block">
                            </div>
                            <a href="/videos/{{ $vid->id }}">
                                <img width="216" height="110" src="http://img.youtube.com/vi/{{ $vid->video_url }}/default.jpg" alt="Card image">
                                <div class="card-block">
                                    <h4 class="card-title">{!! $vid->video_title !!}</h4></a>
                            <h6 class="card-subtitle text-muted">Category: {!! $vid->video_category !!}</h6>
                        </div>
                    </div>
            </div>
            @endforeach
    </div>
    @endif

    @if( $video->isEmpty() )
        <h3>There are currently no Videos</h3>
        @endif

        </div>
@stop