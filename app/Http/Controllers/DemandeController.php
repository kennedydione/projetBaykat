<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    public function store(Request $request, Annonce $annonce)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'quantite' => 'nullable|numeric|min:0.1',
        ]);

        // Vérifier la quantité disponible
        if ($annonce->type === 'produit' && $request->quantite) {
            if ($request->quantite > $annonce->poids) {
                return back()->with('error', 'La quantité demandée dépasse le stock disponible.');
            }

            $annonce->poids -= $request->quantite;
            $annonce->save();
        }

        Demande::create([
            'client_id' => Auth::id(),
            'agriculteur_id' => $annonce->agriculteur_id,
            'annonce_id' => $annonce->id,
            'nom' => $request->nom,
            'email' => $request->email,
            'message' => $request->message,
            'quantite' => $request->quantite,
        ]);
        return redirect()->back()->with('success', 'Votre demande a été envoyée ✅');
       
    }
    public function index()
    {
        $demandes = Demande::with('annonce')->latest()->get();
        return view('admin.demandes.index', compact('demandes'));
    }

  
    public function demandesAgriculteur()
    {
        $demandes = Demande::with(['annonce', 'client'])
            ->where('agriculteur_id', Auth::id())
            ->latest()
            ->get();
        return view('agriculteur.demandes', compact('demandes'));
    }

    public function demandesClient()
    {
        $demandes = Demande::with('annonce')
            ->where('client_id', Auth::id())
            ->latest()
            ->get();
        return view('client.demandes', compact('demandes'));
    }

    public function annulerParClient(Demande $demande)
    {
        if ($demande->client_id !== Auth::id()) {
            abort(403);
        }
        if ($demande->statut !== 'en attente') {
            return back()->with('error', 'Vous ne pouvez annuler qu’une demande en attente.');
        }
        $demande->update(['statut' => 'annulée']);
        return back()->with('success', 'Demande annulée.');
    }

    public function accepter(Demande $demande)
    {
        $ownerId = optional($demande->annonce)->agriculteur_id;
        $allowed = ($ownerId === Auth::id()) || ($demande->agriculteur_id === Auth::id());
        if (!$allowed) {
            abort(403);
        }
        // Backfill demande.agriculteur_id if missing, then persist
        if (empty($demande->agriculteur_id) && $ownerId) {
            $demande->agriculteur_id = $ownerId;
            $demande->save();
        }
        $isPending = is_null($demande->statut) || trim($demande->statut) === '' || strtolower($demande->statut) === 'en attente';
        if (!$isPending) {
            return back()->with('error', 'Seules les demandes en attente peuvent être acceptées.');
        }
        $demande->update(['statut' => 'acceptée']);
        return back()->with('success', 'Demande acceptée.');
    }

    public function refuser(Demande $demande)
    {
        $ownerId = optional($demande->annonce)->agriculteur_id;
        $allowed = ($ownerId === Auth::id()) || ($demande->agriculteur_id === Auth::id());
        if (!$allowed) {
            abort(403);
        }
        // Backfill demande.agriculteur_id if missing, then persist
        if (empty($demande->agriculteur_id) && $ownerId) {
            $demande->agriculteur_id = $ownerId;
            $demande->save();
        }
        $isPending = is_null($demande->statut) || trim($demande->statut) === '' || strtolower($demande->statut) === 'en attente';
        if (!$isPending) {
            return back()->with('error', 'Seules les demandes en attente peuvent être refusées.');
        }
        $demande->update(['statut' => 'refusée']);
        return back()->with('success', 'Demande refusée.');
    }

    // ================= ADMIN =================
    public function adminIndex(Request $request)
    {
        $query = Demande::with(['annonce','client']);
        if ($s = $request->get('q')) {
            $query->where(function($q) use ($s){
                $q->where('nom','like',"%$s%")
                  ->orWhere('email','like',"%$s%")
                  ->orWhere('message','like',"%$s%");
            });
        }
        if ($statut = $request->get('statut')) {
            $query->where('statut', $statut);
        }
        $demandes = $query->latest()->paginate(12)->withQueryString();
        return view('admin.demandes.index', compact('demandes'));
    }

    public function adminAccept(Demande $demande)
    {
        $isPending = is_null($demande->statut) || trim($demande->statut) === '' || strtolower($demande->statut) === 'en attente';
        if (!$isPending) {
            return back()->with('error', 'Seules les demandes en attente peuvent être acceptées.');
        }
        $demande->update(['statut' => 'acceptée']);
        return back()->with('success', 'Demande acceptée.');
    }

    public function adminReject(Demande $demande)
    {
        $isPending = is_null($demande->statut) || trim($demande->statut) === '' || strtolower($demande->statut) === 'en attente';
        if (!$isPending) {
            return back()->with('error', 'Seules les demandes en attente peuvent être refusées.');
        }
        $demande->update(['statut' => 'refusée']);
        return back()->with('success', 'Demande refusée.');
    }
}
