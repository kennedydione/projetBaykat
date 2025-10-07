<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planification;
use Illuminate\Support\Facades\Auth;

class CalendrierController extends Controller
{
    public function index()
    {
        // On récupère les planifications de l’agriculteur connecté
        $plans = Planification::where('user_id', Auth::id())->get();

        return view('agriculteur.calendrier', compact('plans'));
    }
}
