<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
     
        $title= 'Welcome to  Supplus Supplied!';
         return view('pages.index')->with('title', $title);

    }
}
