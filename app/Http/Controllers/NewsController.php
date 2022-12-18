<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsGallery;
use App\Models\User;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Berita Gambar";

    public function index()
    {
        $news = News::with(['newsGalleries','user'])->latest()->get();
        return view('admin.news.index',['title'=>$this->title,'news'=>$news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create',[
            'title'=> $this->title,
            'categories'=>$categories,
        ]);
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
            "judul"=> "required",
            "deskripsi"=>"required",
            "gambar.*"=> "image|file|max:3000",
            "kategori"=>'required|array|min:1'
        ]);
        $slug = SlugService::createSlug(News::class,'slug',$validatedData['judul']);


        News::create([
            "title"=> $validatedData["judul"],
            "desc"=>$validatedData["deskripsi"],
            "slug"=> $slug,
            "user_id"=>Auth::id(),
        ]);
        $newsId = News::latest()->first();
        if ($request->file("gambar")) {
            foreach ($request->file("gambar") as  $image) {
                $validatedData['gambar']= $image->move('news-images',$image->hashName());
                NewsGallery::create([
                    "img"=> $validatedData['gambar'],
                    "news_id"=>$newsId->id
                ]);
            }
        }
        $newsId->categories()->attach($validatedData["kategori"]);
        return redirect('/admin/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $newsGalleries = NewsGallery::where('news_id',$news->id)->get();
        $users = User::all();
        $categories = Category::all();
        return view('admin.news.edit',[
            "title"=> $this->title,
            "news"=>$news,
            "newsGalleries"=> $newsGalleries,
            "users"=>$users,
            'categories'=>$categories,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        // dd($request->all());
        $validatedData= $request->validate([
            "judul"=> "required",
            "deskripsi"=>"required",
            "gambar.*"=> "image|file|max:3000",
            "kategori"=>'required|array|min:1'
        ]);
        $slug = SlugService::createSlug(News::class,'slug',$validatedData['judul']);

        News::where('id',$news->id)->update([
            "title"=> $validatedData["judul"],
            "desc"=>$validatedData["deskripsi"],
            "slug"=> $slug,
            "user_id"=>Auth::id(),
        ]);
        if ($request->file("gambar")) {
            foreach ($request->file("gambar") as  $image) {
                $validatedData['gambar']=$image->move('news-images',$image->hashName());
                NewsGallery::create([
                    "img"=> $validatedData['gambar'],
                    "news_id"=>$news->id
                ]);
            }
        }
        $news->categories()->sync($validatedData["kategori"]);
        return redirect('/admin/news');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $newsGalleries = NewsGallery::where('news_id',$news->id)->get();

        foreach ($newsGalleries as $gallery) {
            File::delete(public_path($gallery->img));
        }
        News::destroy($news->id);
        return response()->json([
            "message"=> "Berhasil Hapus Data"
        ]);
    }

    public function imageDelete(Request $request)
    {
        $image = NewsGallery::findOrFail($request['id']);
        File::delete(public_path($image->img));
        NewsGallery::destroy($request['id']);
        return response()->json([
            "message"=> "Berhasil Hapus Gambar"
        ]);
    }



}
