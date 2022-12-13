<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Kontak";
    public function index()
    {
        $contact = Contact::first();
        return view('admin.contact.index',['title'=>$this->title,'contact'=>$contact]);
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
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('admin.contact.edit',[
            "title"=> $this->title,
            "contact"=>$contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'email'=>'required',
            'nomor_telepon'=>'required',
            'alamat'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'instagram'=>'required',
            'youtube'=>'required',
        ]);
        Contact::where('id',$contact->id)->update([
            "email"=> $validatedData['email'],
            "phone_number"=> $validatedData['nomor_telepon'],
            "address"=> $validatedData['alamat'],
            "facebook"=> $validatedData['facebook'],
            "twitter"=> $validatedData['twitter'],
            "instagram"=> $validatedData['instagram'],
            "youtube"=> $validatedData['youtube'],
        ]);
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
