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
        $profiles = Profile::all();
        $services = Service::all();
        $data = Data::all();
        $laws = Law::all();
        $report = Report::all();
        $info = Information::all();
        $ppid = Ppid::all();
        $news = News::paginate(3);

        return view('guest.news.index', [
            'profiles' => $profiles,
            'services' => $services,
            'datas' => $data,
            'laws' => $laws,
            'reports' => $report,
            'infos' => $info,
            'ppid' => $ppid,
            'news'=> $news,
        ]);
    }

    public function show(News $news)
    {
        $profiles = Profile::all();
        $services = Service::all();
        $data = Data::all();
        $laws = Law::all();
        $report = Report::all();
        $info = Information::all();
        $ppid = Ppid::all();
        $news = News::where('slug',$news->slug)->first();
        $news->update([
            'view'=>$news->view +1,
        ]);
        $categories = Category::all();
        return view('guest.news.show', [
            'profiles' => $profiles,
            'services' => $services,
            'datas' => $data,
            'laws' => $laws,
            'reports' => $report,
            'infos' => $info,
            'ppid' => $ppid,
            'news' => $news,
            'categories'=> $categories,
        ]);
    }
    public function category(Category $category)
    {
        $profiles = Profile::all();
        $services = Service::all();
        $data = Data::all();
        $laws = Law::all();
        $report = Report::all();
        $info = Information::all();
        $ppid = Ppid::all();
        $news = Category::find($category->id)->news()->get();
        $categories = Category::all();
        return view('guest.news.category', [
            'profiles' => $profiles,
            'services' => $services,
            'datas' => $data,
            'laws' => $laws,
            'reports' => $report,
            'infos' => $info,
            'ppid' => $ppid,
            'news' => $news,
            'categories'=> $categories,
            'category'=> $category,
        ]);
    }
}
