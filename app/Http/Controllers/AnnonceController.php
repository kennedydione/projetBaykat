<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    // Affiche la liste des annonces
    public function index(Request $request)
    {
        $query = Annonce::query()->where('status','approved');
        if ($search = $request->get('q')) {
            $query->where(function($q) use ($search){
                $q->where('titre','like',"%$search%")
                  ->orWhere('description','like',"%$search%");
            });
        }
        if ($type = $request->get('type')) {
            $query->where('type', $type);
        }
        $sort = $request->get('sort', 'recent');
        if ($sort === 'prix') {
            $query->orderByDesc('prix');
        } elseif ($sort === 'poids') {
            $query->orderByDesc('poids');
        } else {
            $query->latest();
        }
        $annonces = $query->paginate(8)->withQueryString();
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

        $data = $request->all();
        $data['agriculteur_id'] = Auth::id();
        Annonce::create($data);

        return redirect()->route('annonce.index')->with('success', 'Annonce ajoutée avec succès !');
    }

    // ================= ADMIN =================
    public function adminIndex(Request $request)
    {
        $query = Annonce::query()->with('agriculteur');

        if ($search = $request->get('q')) {
            $query->where(function($q) use ($search){
                $q->where('titre','like',"%$search%")
                  ->orWhere('description','like',"%$search%")
                  ->orWhereHas('agriculteur', function($qq) use ($search){
                      $qq->where('name','like',"%$search%")
                         ->orWhere('email','like',"%$search%");
                  });
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->get('type'));
        }

        $annonces = $query->latest()->paginate(10)->withQueryString();
        return view('admin.annonces.index', compact('annonces'));
    }

    public function adminExport(Request $request)
    {
        $filename = 'annonces_export_'.now()->format('Ymd_His').'.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($request) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['id','titre','type','prix','poids','agriculteur','created_at']);
            $query = Annonce::query()->with('agriculteur');
            if ($search = $request->get('q')) {
                $query->where(function($q) use ($search){
                    $q->where('titre','like',"%$search%")
                      ->orWhere('description','like',"%$search%")
                      ->orWhereHas('agriculteur', function($qq) use ($search){
                          $qq->where('name','like',"%$search%")
                             ->orWhere('email','like',"%$search%");
                      });
                });
            }
            $query->orderBy('id')->chunk(500, function($rows) use ($handle){
                foreach ($rows as $a) {
                    fputcsv($handle, [
                        $a->id,
                        $a->titre,
                        $a->type ?? '',
                        $a->prix ?? '',
                        $a->poids ?? '',
                        $a->agriculteur?->name,
                        $a->created_at,
                    ]);
                }
            });
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function adminDestroy(Annonce $annonce)
    {
        $annonce->delete();
        return back()->with('success','Annonce supprimée.');
    }

    public function adminTrash(Request $request)
    {
        $query = Annonce::onlyTrashed()->with('agriculteur');
        if ($search = $request->get('q')) {
            $query->where(function($q) use ($search){
                $q->where('titre','like',"%$search%")
                  ->orWhere('description','like',"%$search%")
                  ->orWhereHas('agriculteur', function($qq) use ($search){
                      $qq->where('name','like',"%$search%")
                         ->orWhere('email','like',"%$search%");
                  });
            });
        }
        $annonces = $query->orderByDesc('deleted_at')->paginate(10)->withQueryString();
        return view('admin.annonces.trash', compact('annonces'));
    }

    public function adminRestore($id)
    {
        $a = Annonce::onlyTrashed()->findOrFail($id);
        $a->restore();
        return back()->with('success','Annonce restaurée.');
    }

    public function adminForceDelete($id)
    {
        $a = Annonce::onlyTrashed()->findOrFail($id);
        $a->forceDelete();
        return back()->with('success','Annonce supprimée définitivement.');
    }

    public function adminApprove(Annonce $annonce)
    {
        $annonce->update(['status' => 'approved']);
        return back()->with('success','Annonce approuvée.');
    }

    public function adminReject(Annonce $annonce)
    {
        $annonce->update(['status' => 'rejected']);
        return back()->with('success','Annonce refusée.');
    }
}
