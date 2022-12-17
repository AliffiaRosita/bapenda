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
    public function show(NewsVideo $video)
    {
        $newsVideo = NewsVideo::where('slug',$video->slug)->first();
        $newsVideo->update(['view'=> $newsVideo->view +1]);
        return view('guest.news-videos.show', [
            'newsVideo'=> $newsVideo,
        ]);
    }

}
