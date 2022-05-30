<?php

namespace App\Http\Controllers;

use App\Models\ServiceArticle;
use App\Models\ServiceFile;
use App\Models\ServiceList;
use App\Models\ServiceProgram;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Daftar Layanan";
    public function index(ServiceProgram $serviceProgram)
    {

        $serviceLists = ServiceList::where('service_program_id',$serviceProgram->id)->get();
        return view('admin.service_program.service_list.index', [
            'title'=> $this->title,
            'serviceLists'=> $serviceLists,
            'serviceProgram'=>$serviceProgram
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ServiceProgram $serviceProgram)
    {
        return view('admin.service_program.service_list.create', [
            'title'=> $this->title,
            'serviceProgram'=>$serviceProgram
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ServiceProgram $serviceProgram)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'layanan'=> 'required',
            'type'=> 'required',
            'file.*'=>'max:3000|mimes:pdf',
        ]);
        $serviceData = ServiceList::create([
            'title'=> $validatedData['layanan'],
            'type'=> $validatedData['type'],
            'service_program_id'=> $serviceProgram->id
        ]);

        if($request['type']=='file' ){
            if (is_array($request->file('file'))) {
                foreach ($request->file('file') as $key=>$file) {
                  $validatedData['file'] = $file->move('service-file', $file->hashName());

                  ServiceFile::create([
                    'title'=> $request['nama_berkas'][$key],
                    'file'=> $validatedData['file'],
                    'service_list_id'=> $serviceData->id
                  ]);
                }
            }else{
                $validatedData['file'] = $request['file']->move('service-file',$request['file']->hashName());
                  ServiceFile::create([
                    'title'=> $request['nama_berkas'],
                    'file'=> $validatedData['file'],
                    'service_list_id'=> $serviceData->id
                  ]);
            }
         }else if($request['type']=='article'){
            ServiceArticle::create([
                'desc'=> $request['isi'],
                'service_list_id'=>$serviceData->id
            ]);
         }
         return redirect('admin/serviceProgram/'.$serviceProgram->id.'/list');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceList  $serviceList
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceList $serviceList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceList  $serviceList
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceList $serviceList)
    {
        $file = ServiceFile::where('service_list_id',$serviceList->id)->get();
        return view('admin.service_program.service_list.edit',[
            "title"=> $this->title,
            "serviceList"=> $serviceList,
            "file"=>$file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceList  $serviceList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceList $serviceList)
    {
        $validatedData = $request->validate([
            'layanan'=> 'required',
            'type'=> 'required',
            'file.*'=>'max:3000|mimes:pdf',
        ]);
        $slug = SlugService::createSlug(ServiceList::class,'slug',$validatedData['layanan']);
        $serviceData = ServiceList::where('id',$serviceList->id)->update([
            'title'=> $validatedData['layanan'],
            "slug"=> $slug
        ]);

        if($request['type']=='file' && isset($request['file'])){
            if (is_array($request->file('file'))) {
                foreach ($request->file('file') as $key=>$file) {
                  $validatedData['file'] = $file->move('service-file', $file->hashName());

                  ServiceFile::create([
                    'title'=> $request['nama_berkas'][$key],
                    'file'=> $validatedData['file'],
                    'service_list_id'=> $serviceList->id
                  ]);
                }
            }else{
                $validatedData['file'] = $request['file']->move('data-file',$request['file']->hashName());
                  ServiceFile::create([
                    'title'=> $request['nama_berkas'],
                    'file'=> $validatedData['file'],
                    'service_list_id'=> $serviceList->id
                  ]);
            }
         }else if($request['type']=='article'){
            ServiceArticle::where('service_list_id',$serviceList->id)->update([
                'desc'=> $request['isi'],
            ]);
         }

         return redirect('admin/serviceProgram/'.$serviceList->service_program_id.'/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceList  $serviceList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceList $serviceList)
    {
        $files = ServiceFile::where('service_list_id',$serviceList->id)->get();
        if (count($files)>0) {
            foreach ($files as $file) {
                File::delete(public_path($file->file));
                }
        }
        ServiceList::destroy($serviceList->id);

        return response()->json([
            'message'=>'berhasil hapus data'
        ]);

    }
    public function download(ServiceFile $serviceFile)
    {
        $path = public_path($serviceFile->file);
        $filename = $serviceFile->title.".pdf";
        $headers = array(
            'Content-Type: application/pdf',
          );
       return response()->download($path, $filename,$headers);
    }
    public function deleteFile(Request $request)
    {

        $file = ServiceFile::findOrFail($request['id']);

        File::delete(public_path($file->file));
        ServiceFile::destroy($file->id);
        return response()->json([
            "message"=> 'berhasil hapus file'
        ]);
    }
}
