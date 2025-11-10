<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} - Lutte contre les maladies</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar-custom {
            backdrop-filter: blur(10px);
            background: rgba(22, 163, 74, 0.95) !important;
        }
        .btn-retour {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        .btn-retour:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #495057 0%, #343a40 100%);
            color: white;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }
        .card a {
            color: #16a34a;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .card a:hover {
            color: #15803d;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="bg-gray-50 text-gray-800">
    <!-- ✅ NAVBAR améliorée -->
    <nav class="navbar-custom text-white shadow-lg sticky top-0 z-50">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <!-- Logo -->
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/b2.png') }}" alt="Baykat+" class="me-2" style="width: 120px; height: 40px; object-fit: cover;">
                    <a href="{{ route('home') }}" class="text-xl fw-bold text-white text-decoration-none ms-2">
                        Baykat+
                    </a>
                </div>

                <!-- Liens de navigation -->
                <div class="d-none d-md-flex align-items-center gap-3">
                    <a href="{{ route('home') }}" class="text-white text-decoration-none">Accueil</a>
                    <a href="{{ route('guide.index') }}" class="text-white text-decoration-none">Guide Agricole</a>
                    <a href="{{ route('meteo.index') }}" class="text-white text-decoration-none">Météo</a>
                    <a href="{{ route('annonce.index') }}" class="text-white text-decoration-none">Annonces</a>

                    @auth
                        @if(Auth::user() && isset(Auth::user()->role) && Auth::user()->role === 'client')
                            <a href="{{ route('client.demandes') }}" class="text-white text-decoration-none">Mes demandes</a>
                        @endif
                        @if(Auth::user() && isset(Auth::user()->role) && Auth::user()->role === 'agriculteur')
                            <a href="{{ route('agriculteur.demandes') }}" class="text-white text-decoration-none">Demandes reçues</a>
                        @endif
                        <a href="{{ route('profile.edit') }}" class="text-white text-decoration-none">Mon Profil</a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light">
                                <i class="bi bi-box-arrow-right me-1"></i>Se déconnecter
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-white text-decoration-none">Connexion</a>
                        <a href="{{ route('register') }}" class="btn btn-light btn-sm px-3">Inscription</a>
                    @endauth
                </div>

                <!-- Menu mobile -->
                <button class="d-md-none btn btn-link text-white" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
                    <i class="bi bi-list fs-4"></i>
                </button>
            </div>

            <!-- Menu mobile collapse -->
            <div class="collapse d-md-none pb-3" id="mobileMenu">
                <div class="d-flex flex-column gap-2">
                    <a href="{{ route('home') }}" class="text-white text-decoration-none py-2">Accueil</a>
                    <a href="{{ route('guide.index') }}" class="text-white text-decoration-none py-2">Guide Agricole</a>
                    <a href="{{ route('meteo.index') }}" class="text-white text-decoration-none py-2">Météo</a>
                    <a href="{{ route('annonce.index') }}" class="text-white text-decoration-none py-2">Annonces</a>
                    @auth
                        <a href="{{ route('profile.edit') }}" class="text-white text-decoration-none py-2">Mon Profil</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white text-decoration-none py-2">Connexion</a>
                        <a href="{{ route('register') }}" class="text-white text-decoration-none py-2">Inscription</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <!-- Bouton de retour -->
        <div class="mb-4">
            <a href="/agriculteur/home" class="btn btn-retour">
                <i class="bi bi-arrow-left-circle me-2"></i>Retour à l'accueil agriculteur
            </a>
        </div>

        <!-- Header -->
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">
                <i class="bi bi-shield-check text-success me-2"></i>Lutte contre les maladies
            </h2>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">
                Protégez vos cultures grâce à des techniques efficaces et durables contre les maladies agricoles.
            </p>
        </div>

        <!-- Illustration principale -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 text-center">
                <img src="{{ asset('images/lutte.png') }}" alt="Lutte contre les maladies" class="img-fluid rounded shadow-lg mb-4" style="max-height: 400px; width: 100%; object-fit: cover;">
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <span class="badge bg-danger fs-6 px-4 py-2">
                        <i class="bi bi-virus me-1"></i>Agents pathogènes
                    </span>
                    <span class="badge bg-success fs-6 px-4 py-2">
                        <i class="bi bi-flower1 me-1"></i>Biocontrôle
                    </span>
                    <span class="badge bg-warning text-dark fs-6 px-4 py-2">
                        <i class="bi bi-search me-1"></i>Diagnostic précoce
                    </span>
                </div>
            </div>
        </div>

        <!-- Méthodes de lutte -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('images/rotation.png') }}" class="card-img-top" alt="Rotation des cultures" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold">
                            <i class="bi bi-arrow-repeat text-primary me-2"></i>Rotation des cultures
                        </h5>
                        <p class="card-text flex-grow-1">Évite l'accumulation de pathogènes dans le sol en alternant les types de cultures.</p>
                        <a href="{{ route('lutte.rotation') }}" class="btn btn-outline-primary mt-auto">
                            <i class="bi bi-arrow-right-circle me-1"></i>Lire plus ici
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('images/res.png') }}" class="card-img-top" alt="Variétés résistantes" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold">
                            <i class="bi bi-shield-fill-check text-success me-2"></i>Variétés résistantes
                        </h5>
                        <p class="card-text flex-grow-1">Utilisez des semences certifiées et adaptées à votre zone pour limiter les risques.</p>
                        <a href="{{ route('lutte.resistance') }}" class="btn btn-outline-success mt-auto">
                            <i class="bi bi-arrow-right-circle me-1"></i>Lire plus ici
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('images/bioc.png') }}" class="card-img-top" alt="Biocontrôle" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold">
                            <i class="bi bi-flower2 text-warning me-2"></i>Biocontrôle
                        </h5>
                        <p class="card-text flex-grow-1">Utilisez des ennemis naturels (champignons, insectes bénéfiques) pour limiter les ravageurs.</p>
                        <a href="{{ route('lutte.bioc') }}" class="btn btn-outline-warning mt-auto">
                            <i class="bi bi-arrow-right-circle me-1"></i>Lire plus ici
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conseils pratiques -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4">
                    <i class="bi bi-lightbulb-fill text-warning me-2"></i>Conseils pratiques
                </h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                            <p class="mb-0">Inspectez régulièrement vos cultures pour détecter les symptômes précoces.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                            <p class="mb-0">Évitez l'humidité excessive qui favorise les champignons et moisissures.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                            <p class="mb-0">Nettoyez les outils et les surfaces pour éviter la propagation des agents pathogènes.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                            <p class="mb-0">Utilisez des traitements naturels ou biologiques avant les produits chimiques.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Menu mobile toggle
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
</script>
</body>
</html>