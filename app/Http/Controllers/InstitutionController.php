<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Lembaga';
        $institutions = Institution::latest()->get();
        return view('admin.institution.index',compact('title','institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Lembaga';
        return view('admin.institution.create',compact('title'));
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
            $validatedData['image']= $request->file('image')->move('inst-images',$request->file('image')->hashName());
        }
        Institution::create([
            "img"=> $validatedData['image']
        ]);
        return redirect('/admin/institution');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit(Institution $institution)
    {
        $title = "Lembaga";
        return view('admin.institution.edit',compact('institution','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institution $institution)
    {
        $validatedData = $request->validate([
            'image'=> 'image|file|max:3000|required'
        ]);
        $oldImage = $institution->img;
        if($request->file('image')){
            File::delete(public_path($oldImage));
            $validatedData['image']= $request->file('image')->move('inst-images',$request->file('image')->hashName());
        }

        Institution::where('id',$institution->id)->update([
            "img"=> $validatedData['image']
        ]);
        return redirect('/admin/institution');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);
        File::delete(public_path($institution->img));
        Institution::destroy($institution->id);
        return response()->json([
            "message"=> "Berhasil Hapus Data"
        ]);
    }
}
