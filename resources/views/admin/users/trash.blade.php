<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Corbeille — Utilisateurs | Baykat+</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">🗑️ Corbeille — Utilisateurs supprimés</h1>
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">↩️ Retour à la liste</a>
  </div>

  <form method="GET" class="mb-3">
    <div class="row g-2">
      <div class="col-md-6">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Rechercher par nom ou email...">
      </div>
      <div class="col-md-3">
        <select name="role" class="form-select" onchange="this.form.submit()">
          <option value="">Tous rôles</option>
          <option value="admin" {{ request('role')==='admin'?'selected':'' }}>Admin</option>
          <option value="agriculteur" {{ request('role')==='agriculteur'?'selected':'' }}>Agriculteur</option>
          <option value="client" {{ request('role')==='client'?'selected':'' }}>Client</option>
        </select>
      </div>
      <div class="col-md-3">
        <button class="btn btn-primary w-100" type="submit">Filtrer</button>
      </div>
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
          <th>Supprimé le</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->role) }}</td>
            <td>{{ $user->deleted_at?->format('d/m/Y H:i') }}</td>
            <td class="d-flex gap-1">
              <form action="{{ route('admin.users.restore', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-sm btn-outline-success" type="submit">Restaurer</button>
              </form>
              <form action="{{ route('admin.users.force', $user->id) }}" method="POST" onsubmit="return confirm('Suppression définitive ? Cette action est irréversible.');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" type="submit">Supprimer définitivement</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center text-muted">Corbeille vide.</td>
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
