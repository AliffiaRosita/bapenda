<?php

namespace App\Http\Controllers;

use App\Models\Law;
use App\Models\LawArticle;
use App\Models\LawFile;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Produk Hukum";
    public function index()
    {
        $laws = Law::all();
        return view('admin.law.index', [
            'title'=> $this->title,
            'laws'=> $laws,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.law.create', [
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
        $lawCreate = Law::create([
            'title'=> $validatedData['nama'],
            'type'=> $validatedData['type'],
        ]);

        if($request['type']=='file' ){
            if (is_array($request->file('file'))) {
                foreach ($request->file('file') as $key=>$file) {
                  $validatedData['file'] = $file->move('law-file', $file->hashName());

                  LawFile::create([
                    'title'=> $request['nama_berkas'][$key],
                    'file'=> $validatedData['file'],
                    'law_id'=> $lawCreate->id
                  ]);
                }
            }else{
                $validatedData['file'] = $request['file']->move('law-file',$request['file']->hashName());
                  LawFile::create([
                    'title'=> $request['nama_berkas'],
                    'file'=> $validatedData['file'],
                    'law_id'=> $lawCreate->id
                  ]);
            }
         }else if($request['type']=='article'){
            LawArticle::create([
                'desc'=> $request['isi'],
                'law_id'=>$lawCreate->id
            ]);
         }
         return redirect('/admin/law');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Http\Response
     */
    public function show(Law $law)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Http\Response
     */
    public function edit(Law $law)
    {
        $file = LawFile::where('law_id',$law->id)->get();
        return view('admin.law.edit',[
            "title"=> $this->title,
            "law"=> $law,
            "file"=>$file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Law $law)
    {
        $validatedData = $request->validate([
            'nama'=> 'required',
            'type'=> 'required',
            'file.*'=>'max:3000|mimes:pdf',
        ]);
        $slug = SlugService::createSlug(Law::class,'slug',$validatedData['nama']);
         Law::where('id',$law->id)->update([
            'title'=> $validatedData['nama'],
            "slug"=> $slug
        ]);

        if($request['type']=='file' && isset($request['file'])){
            if (is_array($request->file('file'))) {
                foreach ($request->file('file') as $key=>$file) {
                  $validatedData['file'] = $file->move('law-file', $file->hashName());

                  LawFile::create([
                    'title'=> $request['nama_berkas'][$key],
                    'file'=> $validatedData['file'],
                    'law_id'=> $law->id
                  ]);
                }
            }else{
                $validatedData['file'] = $request['file']->move('law-file',$request['file']->hashName());
                  LawFile::create([
                    'title'=> $request['nama_berkas'],
                    'file'=> $validatedData['file'],
                    'law_id'=> $law->id
                  ]);
            }
         }else if($request['type']=='article'){
            LawArticle::where('law_id',$law->id)->update([
                'desc'=> $request['isi'],
            ]);
         }
         return redirect()->route('law.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Http\Response
     */
    public function destroy(Law $law)
    {
        $files = LawFile::where('law_id',$law->id)->get();
        if (count($files)>0) {
            foreach ($files as $file) {
                File::delete(public_path($file->file));
                }
        }
        Law::destroy($law->id);

        return response()->json([
            'message'=>'berhasil hapus data'
        ]);
    }
    public function download(LawFile $lawFile)
    {
        $path = public_path($lawFile->file);
        $filename = $lawFile->title.".pdf";
        $headers = array(
            'Content-Type: application/pdf',
          );
       return response()->download($path, $filename,$headers);
    }
    public function deleteFile(Request $request)
    {

        $file = LawFile::findOrFail($request['id']);

        File::delete(public_path($file->file));
        LawFile::destroy($file->id);
        return response()->json([
            "message"=> 'berhasil hapus file'
        ]);
    }
}
