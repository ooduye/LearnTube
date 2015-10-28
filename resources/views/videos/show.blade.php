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
                            <a data-toggle="modal" data-target="#editModal-{{ $video->id  }}"><i class="glyphicon glyphicon-edit"></i></a>

                            <!-- Edit Modal -->
                            <div id="editModal-{{ $video->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Video</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::model($video,['url' => 'editVideo', 'method' => 'put']) !!}
                                            {!! Form::hidden('video_id', $video->id) !!}
                                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                                <h4 for="category" class="control-label">Choose Category</h4>
                                                <select name="category" id="category">
                                                    <option value="{!! $video->video_category !!}">{!! $video->video_category !!}</option>
                                                    {{ getStatus($video->video_category) }}
                                                </select>
                                                @if ($errors->has('category'))
                                                    <span class="help-block">{{ $errors->first('category') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                <h4 for="title" class="control-label">Video Title</h4>
                                                <input type="text" name="title" class="form-control" id="title" value="{!! $video->video_title ?: '' !!}">
                                                @if ($errors->has('title'))
                                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                <h4 for="description" class="control-label">Video Description</h4>
                                                <textarea name="description" class="form-control" id="description" rows="10" cols="10">{!! $video->video_description ?: '' !!}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('video-url') ? ' has-error' : '' }}">
                                                <h4 for="video-url" class="control-label">Video URL</h4>
                                                <input type="text" name="video-url" class="form-control" id="video-url" value="{!! $video->video_url ?: '' !!}">
                                                @if ($errors->has('video-url'))
                                                    <span class="help-block">{{ $errors->first('video-url') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::submit('Edit', ['class' =>'btn btn-primary pull-right post-btn', 'name' =>'submitButton']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>

                                </div>
                            </div>   <!-- End of Edit Modal -->


                            <a data-toggle="modal" data-target="#confirmDelete-{{ $video->id  }}">
                                <i class="glyphicon glyphicon-remove-circle" style="color: #d9534f;cursor:pointer;"></i>
                            </a>

                            <!-- Delete Modal Dialog -->
                            <div class="modal fade" id="confirmDelete-{{ $video->id }}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Are you sure you want to delete this Video?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="username"> @ {{ Auth::user()->username }} </h5>
                                            <h4><p>{{ $video->video_title }}</p></h4>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::model($video,['url' => 'deleteVideo', 'method' => 'delete']) !!}
                                            {!! Form::hidden('video_id', $video->id) !!}
                                            {!! Form::submit('Delete', ['class' =>'btn btn-danger pull-right delete-btn', 'name' =>'submitButton']) !!}
                                            {!! Form::close() !!}
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>      <!-- End of Delete Modal -->

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