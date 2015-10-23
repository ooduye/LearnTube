@extends('layouts.master')

@section('content')

    @include('layouts.partials.sidebar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">New Video</h1>

        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{{ route('videos.store') }}">
                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                    <label for="category" class="control-label">Choose Category</label>
                    <select name="category" id="category">
                        <option value="">Choose a category</option>
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
                    </select>
                    @if ($errors->has('category'))
                        <span class="help-block">{{ $errors->first('category') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="control-label">Video Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title') ?: '' }}">
                    @if ($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="control-label">Video Description</label>
                <textarea name="description" class="form-control" id="description" rows="10" cols="10">
                  {{ old('description') ?: '' }}
                </textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('video-url') ? ' has-error' : '' }}">
                    <label for="video-url" class="control-label">Video URL</label>
                    <input type="text" name="video-url" class="form-control" id="video-url" value="{{ old('video-url') ?: '' }}">
                    @if ($errors->has('video-url'))
                        <span class="help-block">{{ $errors->first('video-url') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Create</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@stop