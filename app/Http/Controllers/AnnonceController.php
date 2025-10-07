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
    public function edit($id)
    {
        $annonce = Annonce::findOrFail($id);
        return view('annonce.edit', compact('annonce'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'nullable|numeric',
            'poids' => 'nullable|numeric',
            'type' => 'required|string',
        ]);

        $annonce = Annonce::findOrFail($id);
        $annonce->update($request->all());

        return redirect()->route('annonce.index')->with('success', 'Annonce modifiée avec succès !');
    }

    public function destroy($id)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();

        return back()->with('success', 'Annonce supprimée avec succès !');
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
