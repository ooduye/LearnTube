<?php

namespace LearnTube\Http\Controllers;

use LearnTube\Video;
use Illuminate\Http\Request;
use LearnTube\Http\Requests;
use Illuminate\Support\Facades\Auth;
use LearnTube\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::check() ) {
            $videos = Video::personal()->get();
            return view('videos.index')->withVideo($videos);
        }
        return redirect()->route('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required|min:3',
            'video-url'     => 'required|min:3',
            'description'    => 'required|min:10',
            'category'   => 'required'
        ]);

        $video_url = explode("=", trim($request->input('video-url')));
        $video_url = $video_url["1"];


        $video = new Video;
        $video->video_title   = trim($request->input('title'));
        $video->video_category = trim($request->input('category'));
        $video->video_url       = $video_url;
        $video->video_description  = trim($request->input('description'));
        $video->user_id        = Auth::user()->id;

        $video->save();

        return redirect()->route('videos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        return view('videos.show')->withVideo($video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        return view('videos.edit')->withVideo($video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $this->validate($request, [
            'title'     => 'required|min:3',
            'video-url'     => 'required|min:3',
            'description'    => 'required|min:10',
            'category'   => 'required'
        ]);

        $values = $request->all();
        $video->fill($values)->save();

        return redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect()->route('videos.index');
    }
}
