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

    // Affiche les semences selon la saison choisie
    public function showBySaison($saison)
    {
        $semences = $saison === 'seche'
            ? [
                ['nom' => 'Mil Souna', 'description' => 'Résistant à la sécheresse', 'cycle' => '90 jours', 'rendement' => 1500],
                ['nom' => 'Tomate Roma', 'description' => 'Bonne pour transformation', 'cycle' => '75 jours', 'rendement' => 20000],
            ]
            : [
                ['nom' => 'Riz ISRIZ 17', 'description' => 'Adapté aux zones humides', 'cycle' => '120 jours', 'rendement' => 3000],
                ['nom' => 'Fonio Niata', 'description' => 'Très nutritif', 'cycle' => '100 jours', 'rendement' => 1000],
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
