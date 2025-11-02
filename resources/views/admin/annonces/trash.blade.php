<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Admin — Corbeille Annonces | Baykat+</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">🗑️ Corbeille — Annonces supprimées</h1>
    <a href="{{ route('admin.annonces.index') }}" class="btn btn-outline-secondary">↩️ Retour</a>
  </div>

  <form method="GET" class="mb-3">
    <div class="row g-2">
      <div class="col-md-8">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Rechercher par titre, description ou agriculteur...">
      </div>
      <div class="col-md-4">
        <button class="btn btn-primary w-100" type="submit">Filtrer</button>
      </div>
    </div>
  </form>

  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Titre</th>
          <th>Agriculteur</th>
          <th>Supprimée le</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($annonces as $a)
          <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->titre }}</td>
            <td>{{ $a->agriculteur?->name ?? '-' }}</td>
            <td>{{ $a->deleted_at?->format('d/m/Y H:i') }}</td>
            <td class="d-flex gap-1">
              <form action="{{ route('admin.annonces.restore', $a->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-sm btn-outline-success" type="submit">Restaurer</button>
              </form>
              <form action="{{ route('admin.annonces.force', $a->id) }}" method="POST" onsubmit="return confirm('Suppression définitive de cette annonce ?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" type="submit">Supprimer définitivement</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center text-muted">Corbeille vide.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="d-flex justify-content-center">
    {{ $annonces->links() }}
  </div>
</div>
</body>
</html>
