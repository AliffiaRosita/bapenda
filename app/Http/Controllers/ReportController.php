<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportArticle;
use App\Models\ReportFile;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Laporan Berkala";
    public function index()
    {
        $reports = Report::latest()->get();
        return view('admin.report.index', [
            'title'=> $this->title,
            'reports'=> $reports,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.report.create', [
            'title'=> $this->title,
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
        $validatedData = $request->validate([
            'nama'=> 'required',
            'type'=> 'required',
            'file.*'=>'max:3000|mimes:pdf',
        ]);
        $reportCreate = Report::create([
            'title'=> $validatedData['nama'],
            'type'=> $validatedData['type'],
        ]);

        if($request['type']=='file' ){
            if (is_array($request->file('file'))) {
                foreach ($request->file('file') as $key=>$file) {
                  $validatedData['file'] = $file->move('report-file', $file->hashName());

                  ReportFile::create([
                    'title'=> $request['nama_berkas'][$key],
                    'file'=> $validatedData['file'],
                    'report_id'=> $reportCreate->id
                  ]);
                }
            }else{
                $validatedData['file'] = $request['file']->move('report-file',$request['file']->hashName());
                  ReportFile::create([
                    'title'=> $request['nama_berkas'],
                    'file'=> $validatedData['file'],
                    'report_id'=> $reportCreate->id
                  ]);
            }
         }else if($request['type']=='article'){
            ReportArticle::create([
                'desc'=> $request['isi'],
                'report_id'=>$reportCreate->id
            ]);
         }
         return redirect('/admin/report');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $file = ReportFile::where('report_id',$report->id)->get();
        return view('admin.report.edit',[
            "title"=> $this->title,
            "report"=> $report,
            "file"=>$file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $validatedData = $request->validate([
            'nama'=> 'required',
            'type'=> 'required',
            'file.*'=>'max:3000|mimes:pdf',
        ]);
        $slug = SlugService::createSlug(Report::class,'slug',$validatedData['nama']);
         Report::where('id',$report->id)->update([
            'title'=> $validatedData['nama'],
            "slug"=> $slug
        ]);

        if($request['type']=='file' && isset($request['file'])){
            if (is_array($request->file('file'))) {
                foreach ($request->file('file') as $key=>$file) {
                  $validatedData['file'] = $file->move('report-file', $file->hashName());

                  ReportFile::create([
                    'title'=> $request['nama_berkas'][$key],
                    'file'=> $validatedData['file'],
                    'report_id'=> $report->id
                  ]);
                }
            }else{
                $validatedData['file'] = $request['file']->move('report-file',$request['file']->hashName());
                  ReportFile::create([
                    'title'=> $request['nama_berkas'],
                    'file'=> $validatedData['file'],
                    'report_id'=> $report->id
                  ]);
            }
         }else if($request['type']=='article'){
            ReportArticle::where('report_id',$report->id)->update([
                'desc'=> $request['isi'],
            ]);
         }
         return redirect()->route('report.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $files = ReportFile::where('report_id',$report->id)->get();
        if (count($files)>0) {
            foreach ($files as $file) {
                File::delete(public_path($file->file));
                }
        }
        Report::destroy($report->id);

        return response()->json([
            'message'=>'berhasil hapus data'
        ]);
    }
    public function download(ReportFile $reportFile)
    {
        $path = public_path($reportFile->file);
        $filename = $reportFile->title.".pdf";
        $headers = array(
            'Content-Type: application/pdf',
          );
       return response()->download($path, $filename,$headers);
    }

    public function deleteFile(Request $request)
    {
        $file = ReportFile::findOrFail($request['id']);

        File::delete(public_path($file->file));
        ReportFile::destroy($file->id);
        return response()->json([
            "message"=> 'berhasil hapus file'
        ]);
    }
}
