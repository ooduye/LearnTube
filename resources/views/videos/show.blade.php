@extends('layouts.master')

@section('content')

    @include('layouts.partials.sidebar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @include('layouts.partials.alerts')
        @if( $video )
            <h1 class="page-header">
                {!! $video->video_title !!}
            </h1>

            <div class="container">
                <div class="row">
                    <div class="col-md-3" style="border:1px solid #ccc;margin-left:5px;padding:10px;">
                        <p>Description: {!! $video->video_description !!}</p>
                        <p>Category: {!! $video->video_category !!}</p>
                        <iframe width="640" height="360"
                                src="{{ $video->video_url }}">
                        </iframe>
                        <p><a href="/videos/{{ $video->id }}/edit">Edit</a></p>
                        <p><a href="#">Delete</a></p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@stop