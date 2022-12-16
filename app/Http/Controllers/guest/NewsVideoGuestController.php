<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\NewsVideo;
use Illuminate\Http\Request;

class NewsVideoGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsVideos = NewsVideo::paginate(6);

        return view('guest.news-videos.index', [
            'newsVideos'=> $newsVideos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsVideo  $newsVideo
     * @return \Illuminate\Http\Response
     */
    public function show(NewsVideo $newsVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsVideo  $newsVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsVideo $newsVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsVideo  $newsVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsVideo $newsVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsVideo  $newsVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsVideo $newsVideo)
    {
        //
    }
}
