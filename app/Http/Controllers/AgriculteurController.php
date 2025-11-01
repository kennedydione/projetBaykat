<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Planification;
use App\Http\Controllers\Auth;
class AgriculteurController extends Controller
{
    public function planification()
    {
        $cultures = ['Mil', 'Maïs', 'Riz', 'Arachide', 'Tomate', 'Oignon']; // provisoire, plus tard ça viendra de la BD
        return view('agriculteur.planification', compact('cultures'));
    }

    public function storePlanification(Request $request)
    {
        $data = $request->validate([
            'saison' => 'required|string',
            'cultures' => 'required|array',
            'superficie' => 'nullable|numeric',
            'sol' => 'nullable|string',
            'date_semis' => 'nullable|date',
        ]);

        // Important : ajouter l’utilisateur connecté
        $data['user_id'] = Auth::id();

        Planification::create($data);

        return back()->with('success', 'Votre planification a été enregistrée avec succès !');
    }

}
