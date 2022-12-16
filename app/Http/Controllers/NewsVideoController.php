<?php

namespace App\Http\Controllers;

use App\Models\NewsVideo;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NewsVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title= 'Berita Video';
    public function index()
    {
        $newsVideos = NewsVideo::all();
        return view('admin.news_video.index',[
            "title"=> $this->title,
            "newsVideos"=> $newsVideos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news_video.create',['title'=>$this->title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData= $request->validate([
            'judul'=> 'required',
            'deskripsi'=> 'required',
            'video'=> 'required|url',
            'thumbnail'=> 'image|file|max:3000|required'
        ]);

        $slug = SlugService::createSlug(NewsVideo::class,'slug',$validatedData['judul']);

        if($request->file('thumbnail')){
            $validatedData['thumbnail']= $request->file('thumbnail')->move('news-thumbnail',$request->file('thumbnail')->hashName());
        }
        NewsVideo::create([
            "title"=> $validatedData["judul"],
            "desc"=>$validatedData["deskripsi"],
            "slug"=> $slug,
            "url"=> $validatedData['video'],
            "thumbnail"=> $validatedData['thumbnail'],
            "user_id"=>Auth::id(),
        ]);
        return redirect('admin/newsVideo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsVideo $newsVideo)
    {
        return view('admin.news_video.edit',[
            "title"=>$this->title,
            "newsVideo"=> $newsVideo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsVideo $newsVideo)
    {
        $validatedData= $request->validate([
            'judul'=> 'required',
            'deskripsi'=> 'required',
            'video'=> 'required|url'
        ]);

        $slug = SlugService::createSlug(NewsVideo::class,'slug',$validatedData['judul']);

        $oldThumbnail = $newsVideo->thumbnail;
        if($request->file('thumbnail')){
            File::delete(public_path($oldThumbnail));
            $validatedData['thumbnail']= $request->file('thumbnail')->move('news-thumbnail',$request->file('thumbnail')->hashName());
        }else{
            $validatedData['thumbnail'] = $newsVideo->thumbnail;
        }
        NewsVideo::where('id',$newsVideo->id)->update([
            "title"=> $validatedData["judul"],
            "desc"=>$validatedData["deskripsi"],
            "slug"=> $slug,
            "url"=> $validatedData['video'],
            "thumbnail"=> $validatedData['thumbnail'],
            "user_id"=>Auth::id(),
        ]);
        return redirect('admin/newsVideo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsVideo $newsVideo)
    {
        File::delete(public_path($newsVideo->thumbnail));
        NewsVideo::destroy($newsVideo->id);

        return response()->json([
            'message'=> 'Berhasil hapus data'
        ]);
    }
}
