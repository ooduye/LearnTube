@extends('layouts.master')

@section('content')

    @include('layouts.partials.sidebar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header"> Edit Video</h1>

        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{{ route('videos.update', $video->id) }}">
                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                    <label for="category" class="control-label">Choose Category</label>
                    <select name="category" id="category">
                        <option value="{!! $video->video_category !!}">{!! $video->video_category !!}</option>
                        @if( $video->video_category === "PHP" )
                            <option value="Laravel">Laravel</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="AngularJS">AngularJS</option>
                            <option value="ReactJS">ReactJS</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Rails">Rails</option>
                            <option value="Java">Java</option>
                            <option value="iOS">iOS</option>
                        @elseif( $video->video_category === "Laravel" )
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="AngularJS">AngularJS</option>
                            <option value="ReactJS">ReactJS</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Rails">Rails</option>
                            <option value="Java">Java</option>
                            <option value="iOS">iOS</option>
                        @elseif( $video->video_category === "JavaScript")
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="AngularJS">AngularJS</option>
                            <option value="ReactJS">ReactJS</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Rails">Rails</option>
                            <option value="Java">Java</option>
                            <option value="iOS">iOS</option>
                        @elseif( $video->video_category === "AngularJS" )
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="AngularJS">AngularJS</option>
                            <option value="ReactJS">ReactJS</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Rails">Rails</option>
                            <option value="Java">Java</option>
                            <option value="iOS">iOS</option>
                        @elseif( $video->video_category === "ReactJS" )
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="AngularJS">AngularJS</option>
                            <option value="ReactJS">ReactJS</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Rails">Rails</option>
                            <option value="Java">Java</option>
                            <option value="iOS">iOS</option>
                        @elseif( $video->video_category === "Python" )
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="AngularJS">AngularJS</option>
                            <option value="ReactJS">ReactJS</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Rails">Rails</option>
                            <option value="Java">Java</option>
                            <option value="iOS">iOS</option>
                        @elseif( $video->video_category === "Django" )
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="AngularJS">AngularJS</option>
                            <option value="ReactJS">ReactJS</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Rails">Rails</option>
                            <option value="Java">Java</option>
                            <option value="iOS">iOS</option>
                        @elseif( $video->video_category === "Ruby" )
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="AngularJS">AngularJS</option>
                            <option value="ReactJS">ReactJS</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Rails">Rails</option>
                            <option value="Java">Java</option>
                            <option value="iOS">iOS</option>
                        @elseif( $video->video_category === "Rails" )
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="AngularJS">AngularJS</option>
                            <option value="ReactJS">ReactJS</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Rails">Rails</option>
                            <option value="Java">Java</option>
                            <option value="iOS">iOS</option>
                        @elseif( $video->video_category === "Java" )
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="AngularJS">AngularJS</option>
                            <option value="ReactJS">ReactJS</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Rails">Rails</option>
                            <option value="Java">Java</option>
                            <option value="iOS">iOS</option>
                        @elseif( $video->video_category === "iOS" )
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="AngularJS">AngularJS</option>
                            <option value="ReactJS">ReactJS</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Rails">Rails</option>
                            <option value="Java">Java</option>
                            <option value="iOS">iOS</option>
                        @endif
                    </select>
                    @if ($errors->has('category'))
                        <span class="help-block">{{ $errors->first('category') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="control-label">Video Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{!! $video->video_title ?: '' !!}">
                    @if ($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="control-label">Video Description</label>
                <textarea name="description" class="form-control" id="description" rows="10" cols="10">{!! $video->video_description ?: '' !!}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('video-url') ? ' has-error' : '' }}">
                    <label for="video-url" class="control-label">Video URL</label>
                    <input type="text" name="video-url" class="form-control" id="video-url" value="{!! $video->video_url ?: '' !!}">
                    @if ($errors->has('video-url'))
                        <span class="help-block">{{ $errors->first('video-url') }}</span>
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