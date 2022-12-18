<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $banners = Banner::latest()->get();
        $title = "Banner";

        return view('admin.banner.index',compact('banners','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Banner";
        return view('admin.banner.create', compact('title'));
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
            'image'=> 'image|file|max:3000|required'
        ]);
        if($request->file('image')){
            $validatedData['image']= $request->file('image')->move('banner-images',$request->file('image')->hashName());
        }
        Banner::create([
            "img"=> $validatedData['image']
        ]);
        return redirect('/admin/banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $title = "Banner";
        return view('admin.banner.edit',compact('banner','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $validatedData = $request->validate([
            'image'=> 'image|file|max:3000|required'
        ]);
        $oldImage = $banner->img;
        if($request->file('image')){
            File::delete(public_path($oldImage));
            $validatedData['image']= $request->file('image')->move('banner-images',$request->file('image')->hashName());
        }

        Banner::where('id',$banner->id)->update([
            "img"=> $validatedData['image']
        ]);
        return redirect('/admin/banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        File::delete(public_path($banner->img));
        Banner::destroy($banner->id);
        return response()->json([
            "message"=> "Berhasil Hapus Data"
        ]);
    }
}
