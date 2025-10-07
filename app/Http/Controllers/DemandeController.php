<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Annonce;

class DemandeController extends Controller
{
    public function store(Request $request, $annonceId)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'quantite' => 'nullable|numeric|min:0.1',
        ]);

        $annonce = Annonce::findOrFail($annonceId);

        // Vérifier la quantité disponible
        if ($annonce->type === 'produit' && $request->quantite) {
            if ($request->quantite > $annonce->poids) {
                return back()->with('error', 'La quantité demandée dépasse le stock disponible.');
            }

            $annonce->poids -= $request->quantite;
            $annonce->save();
        }

        Demande::create([
            'annonce_id' => $annonceId,
            'nom' => $request->nom,
            'email' => $request->email,
            'message' => $request->message,
            'quantite' => $request->quantite,
        ]);

        return back()->with('success', 'Votre demande a été envoyée avec succès !');
    }
    public function index()
    {
        $demandes = Demande::with('annonce')->latest()->get();
        return view('admin.demandes.index', compact('demandes'));
    }
}
