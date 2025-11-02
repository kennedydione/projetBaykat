<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($search = $request->get('q')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%");
            });
        }

        if ($role = $request->get('role')) {
            $query->where('role', $role);
        }

        if ($status = $request->get('status')) {
            if ($status === 'active') $query->where('is_active', true);
            elseif ($status === 'inactive') $query->where('is_active', false);
        }

        $users = $query->orderByDesc('created_at')->paginate(10)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:admin,agriculteur,client',
        ]);
        $user->update(['role' => $validated['role']]);
        return back()->with('status', 'Rôle mis à jour.');
    }

    public function toggleActive(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();
        return back()->with('status', 'Statut du compte mis à jour.');
    }

    public function exportCsv(Request $request)
    {
        $filename = 'users_export_'.now()->format('Ymd_His').'.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($request) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['id','name','email','role','is_active','created_at']);

            $query = User::query();
            if ($search = $request->get('q')) {
                $query->where(function($q) use ($search) {
                    $q->where('name','like',"%$search%")
                      ->orWhere('email','like',"%$search%")
                      ->orWhere('role','like',"%$search%");
                });
            }
            $query->orderBy('id')->chunk(500, function($rows) use ($handle) {
                foreach ($rows as $u) {
                    fputcsv($handle, [$u->id,$u->name,$u->email,$u->role,$u->is_active ? 1:0,$u->created_at]);
                }
            });
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function destroy(User $user)
    {
        // Empêcher la suppression de soi-même pour éviter de se bloquer
        if (auth()->id() === $user->id) {
            return back()->with('status', "Vous ne pouvez pas supprimer votre propre compte.");
        }
        $user->delete();
        return back()->with('status', 'Utilisateur supprimé.');
    }

    public function trash(Request $request)
    {
        $query = User::onlyTrashed();
        if ($search = $request->get('q')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%");
            });
        }
        if ($role = $request->get('role')) {
            $query->where('role', $role);
        }
        $users = $query->orderByDesc('deleted_at')->paginate(10)->withQueryString();
        return view('admin.users.trash', compact('users'));
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        return back()->with('status', 'Utilisateur restauré.');
    }

    public function forceDelete($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();
        return back()->with('status', 'Utilisateur supprimé définitivement.');
    }

    public function stats()
    {
        $total = User::count();
        $admins = User::where('role','admin')->count();
        $agriculteurs = User::where('role','agriculteur')->count();
        $clients = User::where('role','client')->count();
        $actifs = User::where('is_active', true)->count();
        $inactifs = User::where('is_active', false)->count();
        $new7 = User::where('created_at','>=', now()->subDays(7))->count();
        $new30 = User::where('created_at','>=', now()->subDays(30))->count();
        $trashed = User::onlyTrashed()->count();

        return view('admin.users.stats', compact('total','admins','agriculteurs','clients','actifs','inactifs','new7','new30','trashed'));
    }
}
