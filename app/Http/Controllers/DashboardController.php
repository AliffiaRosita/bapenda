<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $title = "Dashboard";
    public function index()
    {
        return view('admin.dashboard',[
            'title'=> $this->title
        ]);
    }
}
