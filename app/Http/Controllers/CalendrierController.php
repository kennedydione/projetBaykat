<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planification;
use Illuminate\Support\Facades\Auth;

class CalendrierController extends Controller
{
    public function index()
    {
        // On récupère les planifications de l’agriculteur connecté, triées et paginées
        $plans = Planification::where('user_id', Auth::id())
            ->latest()
            ->paginate(6);

        return view('agriculteur.calendrier', compact('plans'));
    }
}
