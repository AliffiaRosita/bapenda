<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Tentang Kami";
    public function index()
    {
        $about = About::first();
        return view('admin.about.index',['title'=>$this->title,'about'=>$about]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        // dd($about->points);
        return view('admin.about.edit',[
            "title"=> $this->title,
            "about"=>$about,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'image'=> 'image|file|max:3000',
            'judul'=>'required',
            'sub_judul'=>'required',
            'deskripsi'=>'required'
        ]);
        $oldImage = $about->image;
        if($request->file('image')){
            File::delete(public_path($oldImage));
            $image= $request->file('image')->move('about',$request->file('image')->hashName());
        }else{
            $image = $about->image;
        }

        About::where('id',$about->id)->update([
            "image"=> $image,
            "points"=>$request->points,
            "title"=> $validatedData['judul'],
            "sub_title"=> $validatedData['sub_judul'],
            "desc"=> $validatedData['deskripsi'],
        ]);
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
