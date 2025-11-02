<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planification;
use Illuminate\Support\Facades\Auth;
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

        return redirect()->route('agriculteur.calendrier')
            ->with('success', 'Votre planification a été enregistrée et ajoutée au calendrier.');
    }

    public function editPlanification(Planification $planification)
    {
        if ($planification->user_id !== Auth::id()) {
            abort(403);
        }
        $cultures = ['Mil', 'Maïs', 'Riz', 'Arachide', 'Tomate', 'Oignon'];
        return view('agriculteur.planification-edit', compact('planification', 'cultures'));
    }

    public function updatePlanification(Request $request, Planification $planification)
    {
        if ($planification->user_id !== Auth::id()) {
            abort(403);
        }
        $data = $request->validate([
            'saison' => 'required|string',
            'cultures' => 'required|array',
            'superficie' => 'nullable|numeric',
            'sol' => 'nullable|string',
            'date_semis' => 'nullable|date',
        ]);
        $planification->update($data);
        return redirect()->route('agriculteur.calendrier')->with('success', 'Planification mise à jour.');
    }

    public function destroyPlanification(Planification $planification)
    {
        if ($planification->user_id !== Auth::id()) {
            abort(403);
        }
        $planification->delete();
        return back()->with('success', 'Planification supprimée.');
    }

}
