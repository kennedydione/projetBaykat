<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Gestion des utilisateurs | Baykat+</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">👥 Gestion des utilisateurs</h1>
    <div class="d-flex gap-2">
      <a href="{{ route('admin.users.trash') }}" class="btn btn-outline-secondary">🗑️ Corbeille</a>
      <a href="{{ route('admin.users.export', ['q'=>request('q')]) }}" class="btn btn-success">⬇️ Export CSV</a>
      <a href="{{ url('/admin/home') }}" class="btn btn-outline-secondary">⬅️ Retour admin</a>
    </div>
  </div>

  <form method="GET" class="mb-3">
    <div class="input-group">
      <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Rechercher par nom, email ou rôle...">
      <button class="btn btn-primary" type="submit">Rechercher</button>
    </div>
  </form>

  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Rôle</th>
          <th>Statut</th>
          <th>Créé le</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <form action="{{ route('admin.users.updateRole', $user) }}" method="POST" class="d-flex align-items-center gap-2">
                @csrf
                @method('PUT')
                <select name="role" class="form-select form-select-sm" onchange="this.form.submit()">
                  <option value="admin" {{ $user->role==='admin'?'selected':'' }}>Admin</option>
                  <option value="agriculteur" {{ $user->role==='agriculteur'?'selected':'' }}>Agriculteur</option>
                  <option value="client" {{ $user->role==='client'?'selected':'' }}>Client</option>
                </select>
              </form>
            </td>
            <td>
              <span class="badge {{ $user->is_active ? 'bg-success' : 'bg-secondary' }}">
                {{ $user->is_active ? 'Actif' : 'Inactif' }}
              </span>
            </td>
            <td>{{ $user->created_at?->format('d/m/Y') }}</td>
            <td>
              <form action="{{ route('admin.users.toggleActive', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-sm {{ $user->is_active ? 'btn-outline-warning' : 'btn-outline-success' }}" type="submit">
                  {{ $user->is_active ? 'Désactiver' : 'Activer' }}
                </button>
              </form>
              <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="mt-1" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" type="submit">Supprimer</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center text-muted">Aucun utilisateur trouvé.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="d-flex justify-content-center">
    {{ $users->links() }}
  </div>
</div>
</body>
</html>
