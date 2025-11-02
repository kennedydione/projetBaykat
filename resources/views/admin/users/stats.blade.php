<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Statistiques utilisateurs | Baykat+</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">📊 Statistiques des utilisateurs</h1>
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">↩️ Retour à la liste</a>
  </div>

  <div class="row g-3">
    <div class="col-md-3">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <div class="h2 mb-1">{{ $total }}</div>
          <div class="text-muted">Total utilisateurs</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <div class="h2 mb-1 text-danger">{{ $admins }}</div>
          <div class="text-muted">Admins</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <div class="h2 mb-1 text-success">{{ $agriculteurs }}</div>
          <div class="text-muted">Agriculteurs</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <div class="h2 mb-1 text-primary">{{ $clients }}</div>
          <div class="text-muted">Clients</div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <div class="h2 mb-1">{{ $actifs }}</div>
          <div class="text-muted">Comptes actifs</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <div class="h2 mb-1">{{ $inactifs }}</div>
          <div class="text-muted">Comptes inactifs</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <div class="h2 mb-1">{{ $new7 }}</div>
          <div class="text-muted">Nouveaux (7 jours)</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <div class="h2 mb-1">{{ $new30 }}</div>
          <div class="text-muted">Nouveaux (30 jours)</div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <div class="h2 mb-1">{{ $trashed }}</div>
          <div class="text-muted">Supprimés (corbeille)</div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
