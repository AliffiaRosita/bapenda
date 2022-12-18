<?php

namespace App\Http\Controllers;

use App\Models\Ppid;
use App\Models\PpidArticle;
use App\Models\PpidFile;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PpidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Layanan PPID";
    public function index()
    {
        $ppids = Ppid::latest()->get();
        return view('admin.ppid.index', [
            'title'=> $this->title,
            'ppids'=> $ppids,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ppid.create', [
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
        $ppidCreate = Ppid::create([
            'title'=> $validatedData['nama'],
            'type'=> $validatedData['type'],
        ]);

        if($request['type']=='file' ){
            if (is_array($request->file('file'))) {
                foreach ($request->file('file') as $key=>$file) {
                  $validatedData['file'] = $file->move('ppid-file', $file->hashName());

                  PpidFile::create([
                    'title'=> $request['nama_berkas'][$key],
                    'file'=> $validatedData['file'],
                    'ppid_id'=> $ppidCreate->id
                  ]);
                }
            }else{
                $validatedData['file'] = $request['file']->move('ppid-file',$request['file']->hashName());
                  PpidFile::create([
                    'title'=> $request['nama_berkas'],
                    'file'=> $validatedData['file'],
                    'ppid_id'=> $ppidCreate->id
                  ]);
            }
         }else if($request['type']=='article'){
            PpidArticle::create([
                'desc'=> $request['isi'],
                'ppid_id'=>$ppidCreate->id
            ]);
         }
         return redirect('/admin/ppid');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ppid  $ppid
     * @return \Illuminate\Http\Response
     */
    public function show(Ppid $ppid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ppid  $ppid
     * @return \Illuminate\Http\Response
     */
    public function edit(Ppid $ppid)
    {
        $file = PpidFile::where('ppid_id',$ppid->id)->get();
        return view('admin.ppid.edit',[
            "title"=> $this->title,
            "ppid"=> $ppid,
            "file"=>$file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ppid  $ppid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ppid $ppid)
    {
        $validatedData = $request->validate([
            'nama'=> 'required',
            'type'=> 'required',
            'file.*'=>'max:3000|mimes:pdf',
        ]);
        $slug = SlugService::createSlug(Ppid::class,'slug',$validatedData['nama']);
         Ppid::where('id',$ppid->id)->update([
            'title'=> $validatedData['nama'],
            "slug"=> $slug
        ]);

        if($request['type']=='file' && isset($request['file'])){
            if (is_array($request->file('file'))) {
                foreach ($request->file('file') as $key=>$file) {
                  $validatedData['file'] = $file->move('ppid-file', $file->hashName());

                  PpidFile::create([
                    'title'=> $request['nama_berkas'][$key],
                    'file'=> $validatedData['file'],
                    'ppid_id'=> $ppid->id
                  ]);
                }
            }else{
                $validatedData['file'] = $request['file']->move('ppid-file',$request['file']->hashName());
                  PpidFile::create([
                    'title'=> $request['nama_berkas'],
                    'file'=> $validatedData['file'],
                    'ppid_id'=> $ppid->id
                  ]);
            }
         }else if($request['type']=='article'){
            PpidArticle::where('ppid_id',$ppid->id)->update([
                'desc'=> $request['isi'],
            ]);
         }
         return redirect()->route('ppid.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ppid  $ppid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ppid $ppid)
    {
        $files = PpidFile::where('ppid_id',$ppid->id)->get();
        if (count($files)>0) {
            foreach ($files as $file) {
                File::delete(public_path($file->file));
                }
        }
        Ppid::destroy($ppid->id);

        return response()->json([
            'message'=>'berhasil hapus data'
        ]);
    }

    public function download(PpidFile $ppidFile)
    {
        $path = public_path($ppidFile->file);
        $filename = $ppidFile->title.".pdf";
        $headers = array(
            'Content-Type: application/pdf',
          );
       return response()->download($path, $filename,$headers);
    }
    public function deleteFile(Request $request)
    {

        $file = PpidFile::findOrFail($request['id']);

        File::delete(public_path($file->file));
        PpidFile::destroy($file->id);
        return response()->json([
            "message"=> 'berhasil hapus file'
        ]);
    }
}
