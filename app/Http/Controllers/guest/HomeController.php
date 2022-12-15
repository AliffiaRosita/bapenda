<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\DataArticle;
use App\Models\DataFile;
use App\Models\InfoArticle;
use App\Models\InfoFile;
use App\Models\Information;
use App\Models\Law;
use App\Models\LawArticle;
use App\Models\LawFile;
use App\Models\Ppid;
use App\Models\PpidArticle;
use App\Models\PpidFile;
use App\Models\Profile;
use App\Models\Report;
use App\Models\ReportArticle;
use App\Models\ReportFile;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $banners = Banner::latest()->get();
        $partners = Partner::latest()->get();

        return view('guest.home',[
            'banners'=>$banners,
            'partners'=>$partners,
        ]);

    }
    public function profile(Profile $profile)
    {
        $profile = Profile::where('slug',$profile->slug)->first();

        return view('guest.profile',[
            'profile'=> $profile,
        ]);
    }
    public function data(Data $data)
    {
        $data = Data::where('slug',$data->slug)->first();
        $dataArticle='';
        $dataFile = [];
        if ($data->type === 'article') {
            $dataArticle = DataArticle::where('data_id',$data->id)->first();
        }else{
            $dataFile = DataFile::where('data_id',$data->id)->get();
        }

        return view('guest.data',[
            'dataArticle'=> $dataArticle,
            'dataFile'=> $dataFile,
            'data'=> $data,
        ]);
    }
    public function law(Law $law)
    {
        $law = Law::where('slug',$law->slug)->first();
        $lawArticle='';
        $lawFile = [];
        if ($law->type === 'article') {
            $lawArticle = LawArticle::where('law_id',$law->id)->first();
        }else{
            $lawFile = LawFile::where('law_id',$law->id)->get();
        }

        return view('guest.law',[
            'lawArticle'=> $lawArticle,
            'lawFile'=> $lawFile,
            'law'=> $law,
        ]);
    }
    public function report(Report $report)
    {
        $report = Report::where('slug',$report->slug)->first();
        $reportArticle='';
        $reportFile = [];
        if ($report->type === 'article') {
            $reportArticle = ReportArticle::where('report_id',$report->id)->first();
        }else{
            $reportFile = ReportFile::where('report_id',$report->id)->get();
        }

        return view('guest.report',[
            'reportArticle'=> $reportArticle,
            'reportFile'=> $reportFile,
            'report'=> $report,
        ]);
    }
    public function info(Information $info)
    {
        $info = Information::where('slug',$info->slug)->first();
        $infoArticle='';
        $infoFile = [];
        if ($info->type === 'article') {
            $infoArticle = InfoArticle::where('information_id',$info->id)->first();
        }else{
            $infoFile = InfoFile::where('information_id',$info->id)->get();
        }

        return view('guest.info',[
            'infoArticle'=> $infoArticle,
            'infoFile'=> $infoFile,
            'info'=> $info,
        ]);
    }
    public function ppid(Ppid $ppid)
    {
        $ppid = Ppid::where('slug',$ppid->slug)->first();
        $ppidArticle='';
        $ppidFile = [];
        if ($ppid->type === 'article') {
            $ppidArticle = PpidArticle::where('ppid_id',$ppid->id)->first();
        }else{
            $ppidFile = PpidFile::where('ppid_id',$ppid->id)->get();
        }

        return view('guest.ppid',[
            'ppidArticle'=> $ppidArticle,
            'ppidFile'=> $ppidFile,
            'ppid'=> $ppid,
        ]);
    }
    public function downloadFile($file,$fileName)
    {
        $path = public_path($file);
        $filename = $fileName . ".pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download($path, $filename, $headers);
    }

    public function contact()
    {
        $contact = Ppid::first();

        return view('guest.contact',[
            'contact'=>$contact,
        ]);
    }
}
