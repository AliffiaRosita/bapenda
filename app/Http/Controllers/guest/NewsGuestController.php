<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Data;
use App\Models\Information;
use App\Models\Law;
use App\Models\News;
use App\Models\Ppid;
use App\Models\Profile;
use App\Models\Report;
use App\Models\Service;
use Illuminate\Http\Request;

class NewsGuestController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(6);

        return view('guest.news.index', [
            'news'=> $news,
        ]);
    }

    public function show(News $news)
    {
        $news = News::where('slug',$news->slug)->first();
        $news->update([
            'view'=>$news->view +1,
        ]);
        $categories = Category::all();

        $latestNews = News::latest()->take(3)->get();
        $previousNews = News::where('id', '<', $news->id)->orderBy('id','desc')->first();
        $nextNews = News::where('id', '>', $news->id)->orderBy('id')->first();
        return view('guest.news.show', [
            'news' => $news,
            'categories'=> $categories,
            'latestNews'=> $latestNews,
            'previousNews'=> $previousNews,
            'nextNews'=> $nextNews,
        ]);
    }
    public function category(Category $category)
    {
        $news = Category::find($category->id)->news()->latest()->paginate(6);
        $categories = Category::all();
        return view('guest.news.category', [
            'news' => $news,
            'categories'=> $categories,
            'category'=> $category,
        ]);
    }
}
