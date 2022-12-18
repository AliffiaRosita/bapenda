<?php

namespace App\Http\Controllers;

use App\Models\Infographic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class InfographicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Infografis";
    public function index()
    {
        $infographics = Infographic::latest()->get();
        return view('admin.infographic.index',[
            "title"=> $this->title,
            "infographics" => $infographics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.infographic.create',[
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
        $validatedData = $request->validate([
            'keterangan'=>'required',
            'image'=> 'image|file|max:3000|required'
        ]);
        if($request->file('image')){
            $validatedData['image']= $request->file('image')->move('infographic-images',$request->file('image')->hashName());
        }
        Infographic::create([
            "caption"=> $validatedData['keterangan'],
            "img"=> $validatedData['image']
        ]);
        return redirect('/admin/infographic');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Infographic  $infographic
     * @return \Illuminate\Http\Response
     */
    public function show(Infographic $infographic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infographic  $infographic
     * @return \Illuminate\Http\Response
     */
    public function edit(Infographic $infographic)
    {
        return view('admin.infographic.edit',[
            "title"=> $this->title,
            "infographic"=> $infographic
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infographic  $infographic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infographic $infographic)
    {
        $validatedData = $request->validate([
            'image'=> 'image|file|max:3000',
            'keterangan'=>'required'
        ]);
        $oldImage = $infographic->img;
        if($request->file('image')){
            File::delete(public_path($oldImage));
            $validatedData['image']= $request->file('image')->move('infographic-images',$request->file('image')->hashName());
        }else{
            $validatedData['image'] = $infographic->img;
        }

        Infographic::where('id',$infographic->id)->update([
            "img"=> $validatedData['image'],
            "caption"=> $validatedData['keterangan']
        ]);
        return redirect('/admin/infographic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infographic  $infographic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infographic $infographic)
    {
        File::delete(public_path($infographic->img));
        Infographic::destroy($infographic->id);

        return response()->json([
            "message"=>'Berhasil Hapus Data'
        ]);

    }
}
