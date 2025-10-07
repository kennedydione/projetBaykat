<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index()
    {
        // Page principale du guide agricole
        return view('guide.index');
    }


    public function show($slug)
    {
        //
    }
}
