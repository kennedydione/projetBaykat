<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Suivi des cultures | Baykat+</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">📈 Suivi des cultures</h1>
    <div class="d-flex gap-2">
      <a href="{{ route('agriculteur.planification') }}" class="btn btn-outline-secondary">🗓️ Planifier</a>
      <a href="{{ route('agriculteur.calendrier') }}" class="btn btn-outline-primary">📅 Calendrier</a>
    </div>
  </div>

  <div class="alert alert-info">Cette page présentera prochainement vos indicateurs clés (météo locale, irrigation, santé des cultures) et un historique des tâches issues du calendrier.</div>

  <div class="row g-3">
    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5 class="card-title">🌦️ Météo locale</h5>
          <p class="text-muted mb-0">Intégration prévue avec la page Météo pour afficher les prévisions sur vos dates clés.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5 class="card-title">💧 Irrigation</h5>
          <p class="text-muted mb-0">Suivi des apports d’eau et alertes en cas de déficit sur la période de semis.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5 class="card-title">🪲 Sanitaire</h5>
          <p class="text-muted mb-0">Rappels sur les ravageurs/maladies et bonnes pratiques à chaque stade.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-4">
    <a class="btn btn-outline-success" href="{{ url('/agriculteur/home') }}">⬅️ Retour à l’accueil agriculteur</a>
  </div>
</div>
</body>
</html>
