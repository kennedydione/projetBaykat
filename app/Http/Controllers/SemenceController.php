<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SemenceController extends Controller
{
    // Page d’accueil avec les deux saisons
    public function index()
    {
        return view('semence.index');
    }
    public function semis()
    {
        return view('semence.semis');
    }
    public function entretien()
    {
        return view('semence.entretien');
    }
    public function lutteMaladies()
    {
        return view('semence.lutte-maladies');
    }
    public function planification()
    {
        $cultures = ['Mil', 'Maïs', 'Riz', 'Arachide', 'Tomate', 'Oignon']; // provisoire, plus tard ça viendra de la BD
        return view('semence.planification', compact('cultures'));
    }


    // Affiche les semences selon la saison choisie
    public function showBySaison($saison)
    {
        $semences = $saison === 'seche'
            ? [
                ['nom' => 'pument', 'description' => 'Résistant à la sécheresse', 'cycle' => '90 jours', 'rendement' => 1500],
                ['nom' => 'Tomate ', 'description' => 'Bonne pour transformation', 'cycle' => '75 jours', 'rendement' => 20000],
            ]
            : [
                ['nom' => 'Riz ', 'description' => 'Adapté aux zones humides', 'cycle' => '120 jours', 'rendement' => 3000],
                ['nom' => 'Arachide', 'description' => 'Très nutritif', 'cycle' => '100 jours', 'rendement' => 1000],
                ['nom' => 'Mais', 'description' => 'Adapté aux zones humides', 'cycle' => '100 jours', 'rendement' => 1000],

            ];

        return view('semence.saison', compact('saison', 'semences'));
    }

    // Valide la sélection et affiche le récapitulatif
    public function valider(Request $request)
    {
        $choix = $request->input('choix', []);
        $saison = $request->input('saison');

        return view('semence.recap', compact('choix', 'saison'));
    }
}
