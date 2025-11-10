<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} - Binage</title>
    
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
        .card-info {
            border-left: 4px solid #0d6efd;
            transition: transform 0.3s ease;
        }
        .card-info:hover {
            transform: translateX(5px);
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
            <a href="{{ route('semence.entretien') }}" class="btn btn-retour">
                <i class="bi bi-arrow-left-circle me-2"></i>Retour à l'entretien des cultures
            </a>
        </div>

        <!-- Header -->
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">
                <i class="bi bi-tools text-primary me-2"></i>Le Binage
            </h2>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">
                Technique essentielle pour améliorer la structure du sol et favoriser la croissance des cultures.
            </p>
        </div>

        <!-- Image principale -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <img src="{{ asset('images/binage.png') }}" alt="Binage" class="img-fluid rounded shadow-lg" style="max-height: 400px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <!-- Description -->
        <div class="card card-info border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-3">
                    <i class="bi bi-info-circle-fill text-primary me-2"></i>Qu'est-ce que le binage ?
                </h4>
                <p class="mb-0">
                    Le binage est une opération culturale qui consiste à ameublir la couche superficielle du sol (5 à 10 cm de profondeur) 
                    autour des plantes cultivées. Cette technique permet d'aérer le sol, de casser la croûte de battance formée par les pluies, 
                    et de faciliter la pénétration de l'eau et des éléments nutritifs.
                </p>
            </div>
        </div>

        <!-- Avantages -->
        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>Avantages du binage
                        </h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Aération du sol et amélioration de la porosité</li>
                            <li class="mb-2"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Réduction de l'évaporation de l'eau</li>
                            <li class="mb-2"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Facilite la pénétration de l'eau d'irrigation</li>
                            <li class="mb-2"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Améliore l'activité biologique du sol</li>
                            <li class="mb-2"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Favorise le développement racinaire</li>
                            <li class="mb-0"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Élimine les mauvaises herbes naissantes</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">
                            <i class="bi bi-calendar-check text-info me-2"></i>Quand biner ?
                        </h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-clock text-info me-2"></i><strong>Après les pluies :</strong> Pour casser la croûte de battance</li>
                            <li class="mb-2"><i class="bi bi-clock text-info me-2"></i><strong>Avant l'irrigation :</strong> Pour faciliter l'infiltration de l'eau</li>
                            <li class="mb-2"><i class="bi bi-clock text-info me-2"></i><strong>Période de croissance :</strong> Tous les 15 à 20 jours</li>
                            <li class="mb-2"><i class="bi bi-clock text-info me-2"></i><strong>Sol compacté :</strong> Dès que la terre durcit</li>
                            <li class="mb-0"><i class="bi bi-clock text-info me-2"></i><strong>Matin ou soir :</strong> Éviter les heures chaudes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Techniques -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4">
                    <i class="bi bi-gear-fill text-warning me-2"></i>Techniques de binage
                </h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-1-circle-fill text-primary me-3 fs-5"></i>
                            <div>
                                <h6 class="fw-bold">Binage superficiel</h6>
                                <p class="mb-0">Travaillez le sol sur 3-5 cm de profondeur avec une binette ou un sarcloir. Idéal pour les jeunes plants.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-2-circle-fill text-primary me-3 fs-5"></i>
                            <div>
                                <h6 class="fw-bold">Binage profond</h6>
                                <p class="mb-0">Travaillez jusqu'à 10 cm pour les cultures enracinées. Utilisez une houe ou une binette plus large.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-3-circle-fill text-primary me-3 fs-5"></i>
                            <div>
                                <h6 class="fw-bold">Binage en ligne</h6>
                                <p class="mb-0">Binez entre les rangs de culture, en évitant d'endommager les racines des plantes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-4-circle-fill text-primary me-3 fs-5"></i>
                            <div>
                                <h6 class="fw-bold">Binage autour des plants</h6>
                                <p class="mb-0">Formez une petite cuvette autour de chaque plant pour retenir l'eau d'arrosage.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Outils -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4">
                    <i class="bi bi-tool text-secondary me-2"></i>Outils recommandés
                </h4>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="text-center p-3 bg-light rounded">
                                    <i class="bi bi-tools fs-1 text-primary mb-2"></i>
                                    <h6 class="fw-bold">Binette</h6>
                                    <p class="small mb-0">Pour les petits espaces et les cultures délicates</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center p-3 bg-light rounded">
                                    <i class="bi bi-scissors fs-1 text-success mb-2"></i>
                                    <h6 class="fw-bold">Sarcloir</h6>
                                    <p class="small mb-0">Pour couper les mauvaises herbes et ameublir le sol</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center p-3 bg-light rounded">
                                    <i class="bi bi-hammer fs-1 text-warning mb-2"></i>
                                    <h6 class="fw-bold">Houe</h6>
                                    <p class="small mb-0">Pour les grandes surfaces et les sols durs</p>
                                </div>
                            </div>
                        </div>
            </div>
        </div>

        <!-- Précautions -->
        <div class="alert alert-warning border-0 shadow-sm">
            <h5 class="alert-heading">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>Précautions importantes
            </h5>
            <ul class="mb-0">
                <li>Ne binez pas trop profondément pour éviter d'endommager les racines</li>
                <li>Évitez de biner lorsque le sol est trop humide (risque de compaction)</li>
                <li>Respectez une distance minimale de 5-10 cm autour des plants</li>
                <li>Nettoyez vos outils après chaque utilisation pour éviter la propagation de maladies</li>
            </ul>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.querySelector('[data-bs-toggle="collapse"]');
        if (menuBtn) {
            menuBtn.addEventListener('click', function() {
                const target = document.querySelector(menuBtn.getAttribute('data-bs-target'));
                if (target) {
                    target.classList.toggle('show');
                }
            });
        }
    });
</script>
</body>
</html>

