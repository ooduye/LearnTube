@extends('layouts.master')

@section('content')

    @include('layouts.partials.sidebar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @include('layouts.partials.alerts')
        <h1 class="page-header">Videos
            <a class="btn btn-info" href="{{ route('videos.create') }}">New Video</a>
        </h1>

        <div class="col-lg-6">
            @if( $video )
                <div class="row">
                    @foreach ($video as $vid)
                        <div class="col-md-3" style="border:1px solid #ccc;margin-left:5px;">
                            <h2><a href="/videos/{{ $vid->id }}">{!! $vid->video_title !!}</a></h2>
                            <p>Description : {!! $vid->video_description !!}</p>
                            <p>Category: {!! $vid->video_category !!}</p>
                            <iframe width="196" height="110"
                                    src="{{ $vid->video_url }}">
                            </iframe>
                        </div>
                    @endforeach
                </div>
            @endif

            @if( $video->isEmpty() )
                <h3>There are currently no Videos</h3>
            @endif
        </div>

        <a class="btn btn-info" href="{{ route('videos.create') }}">New Video</a>
    </div>
@stop