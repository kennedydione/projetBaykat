<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Admin — Annonces | Baykat+</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">📢 Gestion des annonces</h1>
    <div class="d-flex gap-2">
      <a href="{{ route('admin.annonces.export', ['q'=>request('q'), 'type'=>request('type')]) }}" class="btn btn-success">⬇️ Export CSV</a>
      <a href="{{ route('admin.annonces.trash') }}" class="btn btn-outline-secondary">🗑️ Corbeille</a>
      <a href="{{ url('/admin/home') }}" class="btn btn-outline-secondary">⬅️ Retour admin</a>
    </div>
  </div>

  <form method="GET" class="mb-3">
    <div class="row g-2">
      <div class="col-md-6">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Rechercher par titre, description ou agriculteur...">
      </div>
      <div class="col-md-3">
        <select name="type" class="form-select" onchange="this.form.submit()">
          <option value="">Tous types</option>
          <option value="produit" {{ request('type')==='produit'?'selected':'' }}>Produit</option>
          <option value="service" {{ request('type')==='service'?'selected':'' }}>Service</option>
          <option value="evenement" {{ request('type')==='evenement'?'selected':'' }}>Événement</option>
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
          <th>Titre</th>
          <th>Type</th>
          <th>Statut</th>
          <th>Prix</th>
          <th>Poids</th>
          <th>Agriculteur</th>
          <th>Créé le</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($annonces as $a)
          <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->titre }}</td>
            <td>{{ $a->type ?? '-' }}</td>
            <td>
              @php($badge = match($a->status){
                'approved' => 'bg-success',
                'rejected' => 'bg-danger',
                default => 'bg-secondary'
              })
              <span class="badge {{ $badge }}">{{ ucfirst($a->status ?? 'pending') }}</span>
            </td>
            <td>{{ $a->prix ?? '-' }}</td>
            <td>{{ $a->poids ?? '-' }}</td>
            <td>{{ $a->agriculteur?->name ?? '-' }}</td>
            <td>{{ $a->created_at?->format('d/m/Y') }}</td>
            <td>
              <div class="d-flex flex-wrap gap-1">
                @if(($a->status ?? 'pending') !== 'approved')
                <form action="{{ route('admin.annonces.approve', $a) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <button class="btn btn-sm btn-outline-success" type="submit">Approuver</button>
                </form>
                @endif
                @if(($a->status ?? 'pending') !== 'rejected')
                <form action="{{ route('admin.annonces.reject', $a) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <button class="btn btn-sm btn-outline-warning" type="submit">Refuser</button>
                </form>
                @endif
              <form action="{{ route('admin.annonces.destroy', $a) }}" method="POST" onsubmit="return confirm('Supprimer cette annonce ?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" type="submit">Supprimer</button>
              </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center text-muted">Aucune annonce trouvée.</td>
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
