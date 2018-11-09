<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function index()
   {
       //dd(auth()->user());
       return view('admin.index');
   }
}
