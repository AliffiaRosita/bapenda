<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\DataArticle;
use App\Models\DataFile;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Data";
    public function index()
    {
        $datas = Data::all();
        return view('admin.data.index', [
            'title'=> $this->title,
            'datas'=> $datas,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data.create', [
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
        $dataCreate = Data::create([
            'title'=> $validatedData['nama'],
            'type'=> $validatedData['type'],
        ]);

        if($request['type']=='file' ){
            if (is_array($request->file('file'))) {
                foreach ($request->file('file') as $key=>$file) {
                  $validatedData['file'] = $file->move('data-file', $file->hashName());

                  DataFile::create([
                    'title'=> $request['nama_berkas'][$key],
                    'file'=> $validatedData['file'],
                    'data_id'=> $dataCreate->id
                  ]);
                }
            }else{
                $validatedData['file'] = $request['file']->move('data-file',$request['file']->hashName());
                  DataFile::create([
                    'title'=> $request['nama_berkas'],
                    'file'=> $validatedData['file'],
                    'data_id'=> $dataCreate->id
                  ]);
            }
         }else if($request['type']=='article'){
            DataArticle::create([
                'desc'=> $request['isi'],
                'data_id'=>$dataCreate->id
            ]);
         }
         return redirect('/admin/data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        $file = DataFile::where('data_id',$data->id)->get();
        return view('admin.data.edit',[
            "title"=> $this->title,
            "data"=> $data,
            "file"=>$file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        $validatedData = $request->validate([
            'nama'=> 'required',
            'type'=> 'required',
            'file.*'=>'max:3000|mimes:pdf',
        ]);
        $slug = SlugService::createSlug(Data::class,'slug',$validatedData['nama']);
         Data::where('id',$data->id)->update([
            'title'=> $validatedData['nama'],
            "slug"=> $slug
        ]);

        if($request['type']=='file' && isset($request['file'])){
            if (is_array($request->file('file'))) {
                foreach ($request->file('file') as $key=>$file) {
                  $validatedData['file'] = $file->move('data-file', $file->hashName());

                  DataFile::create([
                    'title'=> $request['nama_berkas'][$key],
                    'file'=> $validatedData['file'],
                    'data_id'=> $data->id
                  ]);
                }
            }else{
                $validatedData['file'] = $request['file']->move('data-file',$request['file']->hashName());
                  DataFile::create([
                    'title'=> $request['nama_berkas'],
                    'file'=> $validatedData['file'],
                    'data_id'=> $data->id
                  ]);
            }
         }else if($request['type']=='article'){
            DataArticle::where('data_id',$data->id)->update([
                'desc'=> $request['isi'],
            ]);
         }
         return redirect()->route('data.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        $files = DataFile::where('data_id',$data->id)->get();
        if (count($files)>0) {
            foreach ($files as $file) {
                File::delete(public_path($file->file));
                }
        }
        Data::destroy($data->id);

        return response()->json([
            'message'=>'berhasil hapus data'
        ]);

    }

    public function download(DataFile $dataFile)
    {
        $path = public_path($dataFile->file);
        $filename = $dataFile->title.".pdf";
        $headers = array(
            'Content-Type: application/pdf',
          );
       return response()->download($path, $filename,$headers);
    }
    public function deleteFile(Request $request)
    {

        $file = DataFile::findOrFail($request['id']);

        File::delete(public_path($file->file));
        DataFile::destroy($file->id);
        return response()->json([
            "message"=> 'berhasil hapus file'
        ]);
    }
}
