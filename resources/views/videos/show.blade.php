@extends('layouts.master')

@section('content')

    @if ( Auth::check())
        @include('layouts.partials.sidebar')
    @endif

    @if (! Auth::check())
        @include('layouts.partials.guest-sidebar')
    @endif

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @if( $video )
            <h1 class="page-header">
                {!! $video->video_title !!}
                @if ( isset(Auth::user()->id) )
                    @if (Auth::user()->id === $video->user_id)
                        <div class="pull-right">
                            <a href="/videos/{{ $video->id }}/edit"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-action="{{ url('videos/' . $video->id) }}" data-token="{{csrf_token()}}">
                                <i class="glyphicon glyphicon-remove-circle" style="color: #d9534f;"></i>
                            </a>
                        </div>
                    @endif
                @endif
            </h1>

            <div class="container">
                <p>Description: {!! $video->video_description !!}</p>
                <p>Category: {!! $video->video_category !!}</p>
                <iframe width="640" height="360"
                        src="https://www.youtube.com/embed/{{ $video->video_url }}" frameborder="0" allowfullscreen>
                </iframe>

            </div>
        @endif
    </div>
@stop