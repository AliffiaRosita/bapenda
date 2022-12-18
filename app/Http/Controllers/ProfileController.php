<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title= "Profil Dinas";
    public function index()
    {
        $profiles = Profile::latest()->get();
        return view('admin.profile.index',[
            "title"=> $this->title,
            "profiles"=> $profiles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.create',[
            "title"=> $this->title
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
            'judul'=> 'required',
            'konten'=> 'required',
        ]);

        $slug = SlugService::createSlug(Profile::class,'slug',$validatedData['judul']);
        Profile::create([
            "title"=> $validatedData["judul"],
            "desc"=>$validatedData["konten"],
            "slug"=> $slug,
        ]);
        return redirect('admin/company/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('admin.profile.edit',[
            "title"=> $this->title,
            "profile"=>$profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $validatedData= $request->validate([
            'judul'=> 'required',
            'konten'=> 'required',
        ]);

        $slug = SlugService::createSlug(Profile::class,'slug',$validatedData['judul']);
        Profile::where('id',$profile->id)->update([
            "title"=> $validatedData["judul"],
            "desc"=>$validatedData["konten"],
            "slug"=> $slug,
        ]);
        return redirect('admin/company/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        Profile::destroy($profile->id);
        return response()->json([
            'message'=> 'Berhasil Hapus Data'
        ]);
    }
}
