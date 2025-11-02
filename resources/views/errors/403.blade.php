<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>403 | Accès interdit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="min-height:100vh;">
  <div class="container text-center">
    <h1 class="display-5 text-danger fw-bold">403 — Accès interdit</h1>
    <p class="text-muted">Vous n’avez pas les permissions nécessaires pour accéder à cette page.</p>
    <div class="d-flex gap-2 justify-content-center">
      <a href="{{ url('/') }}" class="btn btn-primary">↩️ Retour à l’accueil</a>
      @auth
        <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary">🏠 Mon tableau de bord</a>
      @endauth
    </div>
  </div>
</body>
</html>
