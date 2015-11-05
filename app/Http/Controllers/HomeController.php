<?php

namespace LearnTube\Http\Controllers;

use LearnTube\Video;
use Illuminate\Http\Request;
use LearnTube\Http\Requests;
use Illuminate\Support\Facades\Auth;
use LearnTube\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('pages.index')->withVideo($videos);
    }

    /**
     * @param $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $videos = Video::where('video_category', $category)->get();

        return view('pages.index')->withVideo($videos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
