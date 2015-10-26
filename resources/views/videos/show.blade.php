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
            </h1>

            <div class="container">
                <p>Description: {!! $video->video_description !!}</p>
                <p>Category: {!! $video->video_category !!}</p>
                <iframe width="640" height="360"
                        src="https://www.youtube.com/embed/{{ $video->video_url }}" frameborder="0" allowfullscreen>
                </iframe>
                @if ( isset(Auth::user()->id) )
                    @if (Auth::user()->id === $video->user_id)
                        <p><a href="/videos/{{ $video->id }}/edit">Edit</a></p>
                        <button class="btn btn-circle btn-danger delete"
                                data-action="{{ url('videos/' . $video->id) }}"
                                data-token="{{csrf_token()}}">
                            <i class="fa fa-trash-o"></i>Delete
                        </button>
                    @endif
                @endif
            </div>
        @endif
    </div>
@stop