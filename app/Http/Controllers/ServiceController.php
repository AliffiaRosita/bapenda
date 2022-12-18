<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Layanan";
        $services = Service::latest()->get();
        return view('admin.service.index',compact('title','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Layanan";
        return view('admin.service.create',compact('title'));
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
            'deskripsi'=> 'required',
            'url'=> 'required|url',
            'gambar'=> 'image|file|max:3000|required'
        ]);
        if($request->file('gambar')){
            $validatedData['gambar']= $request->file('gambar')->move('service-images', $request->file('gambar')->hashName());
        }
        Service::create([
            'title'=>$validatedData['nama'],
            'desc'=>$validatedData['deskripsi'],
            'url'=> $validatedData['url'],
            "icon"=> $validatedData['gambar']
        ]);
        return redirect('/admin/service');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $title = 'Layanan';
        return view('admin.service.edit', compact('service','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'nama'=> 'required',
            'deskripsi'=> 'required',
            'url'=> 'required|url',
            'gambar'=> 'image|file|max:3000'
        ]);
        $oldImage= $service->icon;
        if($request->file('gambar')){
            File::delete(public_path($oldImage));
            $validatedData['gambar']= $request->file('gambar')->move('service-images', $request->file('gambar')->hashName());
        }else{
            $validatedData['gambar'] = $service->icon;
        }
        Service::where('id',$service->id)->update([
            'title'=>$validatedData['nama'],
            'desc'=>$validatedData['deskripsi'],
            'url'=> $validatedData['url'],
            'icon'=> $validatedData['gambar']
        ]);
        return redirect('/admin/service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        File::delete(public_path($service->icon));
        $service->destroy($service->id);
        return response()->json([
            "message"=> "Berhasil Hapus Data"
        ]);
    }
}
