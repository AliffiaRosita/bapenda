<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Partner";
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index',['title'=>$this->title,'partners'=>$partners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create',[
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
        $validatedData= $request->validate([
            "nama"=> "required",
        ]);
        $logo = '';
        if($request->file('image')){
            $logo = $request->file('image')->move('partner',$request->file('image')->hashName());
        }
        Partner::create([
            "name"=> $validatedData["nama"],
            "logo"=> $logo,
            "url"=> $request->url,
        ]);
        return redirect()->route('partner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit',[
            "title"=> $this->title,
            "partner"=>$partner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $validatedData = $request->validate([
            'image'=> 'image|file|max:3000',
            'nama'=>'required'
        ]);
        $oldImage = $partner->img;
        if($request->file('image')){
            File::delete(public_path($oldImage));
            $logo= $request->file('image')->move('partner',$request->file('image')->hashName());
        }else{
            $logo = $infographic->img;
        }

        Partner::where('id',$partner->id)->update([
            "logo"=> $logo,
            "url"=>$request->url,
            "name"=> $validatedData['nama']
        ]);
        return redirect()->route('partner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        File::delete(public_path($partner->logo));
        $partner->delete();
        return response()->json([
            "message"=> "Berhasil Hapus Data"
        ]);
    }
}
