<?php

namespace App\Http\Controllers;

use App\Models\ServiceProgram;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Program Layanan";

    public function index()
    {
        $servicePrograms = ServiceProgram::with(['serviceLists'])->get();
        return view('admin.service_program.index',[
            "title"=> $this->title,
            "servicePrograms"=> $servicePrograms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service_program.create',[
            'title'=> $this->title
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
        $validateData=$request->validate([
            'kota'=> 'required|unique:service_programs,title',
            'deskripsi'=> 'required',
        ]);
        $slug = SlugService::createSlug(ServiceProgram::class,'slug',$validateData['kota']);

        ServiceProgram::create([
            "title"=> $validateData['kota'],
            "desc"=> $validateData["deskripsi"],
            "slug"=> $slug
        ]);
        return redirect('admin/serviceProgram');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceProgram  $serviceProgram
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceProgram $serviceProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceProgram  $serviceProgram
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceProgram $serviceProgram)
    {
        return view('admin.service_program.edit',[
            "title"=> $this->title,
            "serviceProgram"=>$serviceProgram
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceProgram  $serviceProgram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceProgram $serviceProgram)
    {
        $validateData=$request->validate([
            'kota'=> 'required|unique:service_programs,title,'.$serviceProgram->id,
            'deskripsi'=> 'required',
        ]);
        $slug = SlugService::createSlug(ServiceProgram::class,'slug',$validateData['kota']);

        ServiceProgram::where('id',$serviceProgram->id)->update([
            "title"=> $validateData['kota'],
            "desc"=> $validateData["deskripsi"],
            "slug"=> $slug
        ]);
        return redirect('admin/serviceProgram');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceProgram  $serviceProgram
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceProgram $serviceProgram)
    {
        $files = ServiceProgram::where('service_programs.id',$serviceProgram->id)
                         ->join('service_lists','service_lists.service_program_id','=','service_programs.id')
                         ->join('service_files','service_files.service_list_id','=','service_lists.id')->get(['service_files.file']);

        if (count($files)>0) {
            foreach ($files as $file) {
                File::delete(public_path($file->file));
                }
        }
        ServiceProgram::destroy($serviceProgram->id);
        return response()->json([
            "message"=>"Berhasil Hapus Data"
        ]);
    }
}
