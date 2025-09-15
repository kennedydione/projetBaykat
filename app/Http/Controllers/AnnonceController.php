<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

class AnnonceController extends Controller
{
    // Affiche la liste des annonces
    public function index()
    {
        $annonces = Annonce::latest()->get();
        return view('annonce.index', compact('annonces'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('annonce.create');
    }

    // Enregistre une nouvelle annonce
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'nullable|numeric',
            'poids' => 'nullable|numeric',
        ]);

        Annonce::create($request->all());

        return redirect()->route('annonce.index')->with('success', 'Annonce ajoutée avec succès !');
    }
}
