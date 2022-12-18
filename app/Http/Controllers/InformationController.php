<?php

namespace App\Http\Controllers;

use App\Models\InfoArticle;
use App\Models\InfoFile;
use App\Models\Information;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Informasi";
    public function index()
    {
        $informations = Information::latest()->get();
        return view('admin.information.index', [
            'title'=> $this->title,
            'informations'=> $informations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.information.create', [
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
        $infoCreate = Information::create([
            'title'=> $validatedData['nama'],
            'type'=> $validatedData['type'],
        ]);

        if($request['type']=='file' ){
            if (is_array($request->file('file'))) {
                foreach ($request->file('file') as $key=>$file) {
                  $validatedData['file'] = $file->move('info-file', $file->hashName());

                  InfoFile::create([
                    'title'=> $request['nama_berkas'][$key],
                    'file'=> $validatedData['file'],
                    'information_id'=> $infoCreate->id
                  ]);
                }
            }else{
                $validatedData['file'] = $request['file']->move('info-file',$request['file']->hashName());
                  InfoFile::create([
                    'title'=> $request['nama_berkas'],
                    'file'=> $validatedData['file'],
                    'information_id'=> $infoCreate->id
                  ]);
            }
         }else if($request['type']=='article'){
            InfoArticle::create([
                'desc'=> $request['isi'],
                'information_id'=>$infoCreate->id
            ]);
         }
         return redirect('/admin/information');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        $file = InfoFile::where('information_id',$information->id)->get();
        return view('admin.information.edit',[
            "title"=> $this->title,
            "information"=> $information,
            "file"=>$file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        $validatedData = $request->validate([
            'nama'=> 'required',
            'type'=> 'required',
            'file.*'=>'max:3000|mimes:pdf',
        ]);
        $slug = SlugService::createSlug(Information::class,'slug',$validatedData['nama']);
         Information::where('id',$information->id)->update([
            'title'=> $validatedData['nama'],
            "slug"=> $slug
        ]);

        if($request['type']=='file' && isset($request['file'])){
            if (is_array($request->file('file'))) {
                foreach ($request->file('file') as $key=>$file) {
                  $validatedData['file'] = $file->move('info-file', $file->hashName());

                  InfoFile::create([
                    'title'=> $request['nama_berkas'][$key],
                    'file'=> $validatedData['file'],
                    'information_id'=> $information->id
                  ]);
                }
            }else{
                $validatedData['file'] = $request['file']->move('info-file',$request['file']->hashName());
                  InfoFile::create([
                    'title'=> $request['nama_berkas'],
                    'file'=> $validatedData['file'],
                    'information_id'=> $information->id
                  ]);
            }
         }else if($request['type']=='article'){
            InfoArticle::where('information_id',$information->id)->update([
                'desc'=> $request['isi'],
            ]);
         }
         return redirect()->route('information.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        $files = InfoFile::where('information_id',$information->id)->get();
        if (count($files)>0) {
            foreach ($files as $file) {
                File::delete(public_path($file->file));
                }
        }
        Information::destroy($information->id);

        return response()->json([
            'message'=>'berhasil hapus data'
        ]);
    }
    public function download(InfoFile $infoFile)
    {
        $path = public_path($infoFile->file);
        $filename = $infoFile->title.".pdf";
        $headers = array(
            'Content-Type: application/pdf',
          );
       return response()->download($path, $filename,$headers);
    }
    public function deleteFile(Request $request)
    {

        $file =InfoFile::findOrFail($request['id']);

        File::delete(public_path($file->file));
        InfoFile::destroy($file->id);
        return response()->json([
            "message"=> 'berhasil hapus file'
        ]);
    }
}
