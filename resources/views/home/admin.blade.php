<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil Admin | Baykat+</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 60px;
            background: linear-gradient(180deg, #f8fff5 0%, #ffffff 100%);
        }
        .card {
            background-color: rgba(255,255,255,0.95);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.03);
        }
        h1, h5 {
            font-weight: 600;
        }
        .hero {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
        }
        .hero-img {
            background-image: url('{{ asset('images/img4.png') }}');
            background-size: cover;
            background-position: center;
            min-height: 220px;
            filter: brightness(0.85);
        }
        .hero-overlay {
            position: absolute; inset: 0; background: linear-gradient(90deg, rgba(0,0,0,0.45), rgba(0,0,0,0.15));
        }
        .hero-content {
            position: absolute; inset: 0; display: flex; align-items: center; justify-content: center;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">Baykat+</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/admin/home">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/users">Utilisateurs</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/annonces">Annonces</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/demandes">Demandes</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Contenu principal -->
<div class="container py-4">
    <!-- Hero -->
    <div class="hero mb-4">
        <div class="hero-img"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content text-center text-white p-4">
            <h1 class="display-6 mb-0">🛡️ Bienvenue, Administrateur</h1>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">

        <div class="col">
            <a href="/admin/stats" class="text-decoration-none">
                <div class="card border-0 shadow-sm text-center p-4 h-100">
                    <h5 class="text-success fw-bold">📊 Superviser les activités</h5>
                    <p class="text-muted small mb-0">Suivez les performances et les données d’utilisation.</p>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="/admin/users" class="text-decoration-none">
                <div class="card border-0 shadow-sm text-center p-4 h-100">
                    <h5 class="text-primary fw-bold">👥 Gérer les utilisateurs</h5>
                    <p class="text-muted small mb-0">Modérez les comptes, rôles et accès à la plateforme.</p>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="/admin/annonces" class="text-decoration-none">
                <div class="card border-0 shadow-sm text-center p-4 h-100">
                    <h5 class="text-success fw-bold">📢 Modérer les annonces</h5>
                    <p class="text-muted small mb-0">Consultez et modérez les annonces publiées.</p>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="/admin/demandes" class="text-decoration-none">
                <div class="card border-0 shadow-sm text-center p-4 h-100">
                    <h5 class="text-warning fw-bold">📥 Gérer les demandes</h5>
                    <p class="text-muted small mb-0">Consultez toutes les demandes envoyées par les utilisateurs.</p>
                </div>
            </a>
        </div>

    </div>
</div>

<!-- Footer -->
<footer class="text-center py-4 bg-light mt-5 shadow-sm">
    <small>© {{ date('Y') }} Baykat+. Tous droits réservés.</small>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
