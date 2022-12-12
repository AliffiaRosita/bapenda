<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\DataArticle;
use App\Models\DataFile;
use App\Models\Information;
use App\Models\Law;
use App\Models\Ppid;
use App\Models\Profile;
use App\Models\Report;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $profiles = Profile::all();
        $services = Service::all();
        $data = Data::all();
        $laws = Law::all();
        $report = Report::all();
        $info = Information::all();
        $ppid = Ppid::all();

        return view('guest.home',[
            'profiles'=>$profiles,
            'services'=>$services,
            'datas'=>$data,
            'laws'=>$laws,
            'reports'=>$report,
            'infos'=>$info,
            'ppid'=>$ppid
        ]);

    }
    public function profile(Profile $profile)
    {
        $profile = Profile::where('slug',$profile->slug)->first();
        $profiles = Profile::all();
        $services = Service::all();
        $data = Data::all();
        $laws = Law::all();
        $report = Report::all();
        $info = Information::all();
        $ppid = Ppid::all();

        return view('guest.profile',[
            'profile'=> $profile,
            'profiles' => $profiles,
            'services' => $services,
            'datas' => $data,
            'laws' => $laws,
            'reports' => $report,
            'infos' => $info,
            'ppid' => $ppid
        ]);
    }
    public function data(Data $data)
    {
        $datas = Data::where('slug',$data->slug)->first();
        $dataArticle='';
        $dataFile = [];
        if ($datas->type === 'article') {
            $dataArticle = DataArticle::where('data_id',$datas->id)->first(); 
        }else{
            $dataFile = DataFile::where('data_id',$datas->id)->get();
        }
        $profiles = Profile::all();
        $services = Service::all();
        $data = Data::all();
        $laws = Law::all();
        $report = Report::all();
        $info = Information::all();
        $ppid = Ppid::all();

        return view('guest.data',[
            'dataArticle'=> $dataArticle,
            'dataFile'=> $dataFile,
            'data'=> $datas,
            'profiles' => $profiles,
            'services' => $services,
            'datas' => $data,
            'laws' => $laws,
            'reports' => $report,
            'infos' => $info,
            'ppid' => $ppid
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
}
