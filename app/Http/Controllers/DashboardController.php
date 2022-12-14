<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Admin;
use App\Models\News;
use App\Models\NewsVideo;
use App\Models\Service;
use App\Models\Institution;
use App\Models\Visitor;
use App\Models\Infographic;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public $title = "Dashboard";
    public function index()
    {
        $now = Carbon::now();
        $countCategory = Category::count();
        $countAdmin = Admin::count();
        $countNews = News::count();
        $countNewsVideo = NewsVideo::count();
        $countService = Service::count();
        $countInstitution = Institution::count();
        $countInfographic = Infographic::count();
        $countVisitor = Visitor::count();

        $latestNews = News::latest()->take(4)->get();
        $latestNewsVideo = NewsVideo::latest()->take(4)->get();

        return view('admin.dashboard',[
            'title'=> $this->title,
            'countCategory'=>$countCategory,
            'countAdmin'=>$countAdmin,
            'countNews'=>$countNews,
            'countNewsVideo'=>$countNewsVideo,
            'countService'=>$countService,
            'countInstitution'=>$countInstitution,
            'countInfographic'=>$countInfographic,
            'countVisitor'=>$countVisitor,
            'now'=>$now,
            'latestNews'=>$latestNews,
            'latestNewsVideo'=>$latestNewsVideo,
        ]);
    }

    public function getDataChartVisitor(){
        $now = Carbon::now();
        $visitors = Visitor::all();
        $months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Oct','Nov','Des'];
        $visitor = [0,0,0,0,0,0,0,0,0,0,0,0];
        for ($i=0; $i < count($months); $i++) {
            $visitor[$i] = Visitor::whereMonth('date',$i+1)->whereYear('date',$now->year)->count();
        }
        return response()->json([
            'months'=>$months,
            'visitor'=>$visitor,
        ], 200);
    }
}
