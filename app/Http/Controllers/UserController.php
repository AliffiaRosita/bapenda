<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $title = "Profile";
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show',[
            'title'=> $this->title,
            'user'=>$user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $admin = Admin::where('user_id',$user->id);

        return view('admin.user.edit',[
            'title'=>$this->title,
            'user'=> $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            "foto" => 'image|file|max:3000',
            "nama"=>'required',
            "email"=> 'required|unique:users,email,'. $user->id
        ]);
        if ($request['password']!= null) {
            $request->validate([
                'password'=> 'min:6'
            ]);
            $password = Hash::make($request['password']);
            
        }else{
            $password = $user->password;
        }
        User::where('id',$user->id)->update([
            "email"=> $validatedData["email"],
            "password"=> $password
        ]);
        if ($request->file('foto')) {
            if ($user->admin->img != '') {
                File::delete(public_path($user->admin->img));
            }
            $validatedData['foto']= $request->file('foto')->move('user-images',$request->file('foto')->hashName());
        }else{
            $validatedData['foto'] = $user->admin->img;
        }

        Admin::where('user_id',$user->id)->update([
            "name"=> $validatedData["nama"],
            "img"=> $validatedData["foto"],
        ]);
        
        return redirect()->route('user.show',['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
