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
            background-image: url('{{ asset('images/img4.png') }}');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            padding-top: 60px;
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
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
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
        <li class="nav-item"><a class="nav-link" href="/admin/demendes">Demandes</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Contenu principal -->
<div class="container py-5">
    <h1 class="text-center text-bg-danger py-2 px-4 rounded-pill mb-5">🛡️ Bienvenue, Administrateur</h1>

    <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">

        <div class="col">
            <a href="/admin/stats" class="text-decoration-none">
                <div class="card border-danger text-center p-4">
                    <h5 class="text-danger fw-bold">📊 Statistiques globales</h5>
                    <p class="text-muted small">Suivez les performances et les données d’utilisation.</p>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="/admin/users" class="text-decoration-none">
                <div class="card border-primary text-center p-4">
                    <h5 class="text-primary fw-bold">👥 Gérer les utilisateurs</h5>
                    <p class="text-muted small">Modérez les comptes, rôles et accès à la plateforme.</p>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="/admin/annonces" class="text-decoration-none">
                <div class="card border-success text-center p-4">
                    <h5 class="text-success fw-bold">📢 Toutes les annonces</h5>
                    <p class="text-muted small">Consultez et modérez les annonces publiées.</p>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="/admin/demendes" class="text-decoration-none">
                <div class="card border-warning text-center p-4">
                    <h5 class="text-warning fw-bold">📥 Demandes reçues</h5>
                    <p class="text-muted small">Consultez toutes les demandes envoyées par les utilisateurs.</p>
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
