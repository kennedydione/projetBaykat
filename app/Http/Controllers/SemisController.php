<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SemisController extends Controller
{
    public function direct()
    {
        return view('semis.direct');
    }

    public function ligne()
    {
        return view('semis.ligne');
    }

    public function pepiniere()
    {
        return view('semis.pepiniere');
    }

}
