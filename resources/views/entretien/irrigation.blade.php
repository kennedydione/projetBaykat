<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} - Irrigation</title>
    
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
            border-left: 4px solid #0dcaf0;
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
                <i class="bi bi-droplet-fill text-info me-2"></i>L'Irrigation
            </h2>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">
                Apportez l'eau nécessaire à vos cultures selon leurs besoins spécifiques pour une croissance optimale.
            </p>
        </div>

        <!-- Image principale -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <img src="{{ asset('images/uri.png') }}" alt="Irrigation" class="img-fluid rounded shadow-lg" style="max-height: 400px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <!-- Description -->
        <div class="card card-info border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-3">
                    <i class="bi bi-info-circle-fill text-info me-2"></i>Qu'est-ce que l'irrigation ?
                </h4>
                <p class="mb-0">
                    L'irrigation est l'apport artificiel d'eau aux cultures pour compenser les déficits hydriques naturels. 
                    Elle permet de maintenir un niveau d'humidité optimal du sol, essentiel pour la croissance, le développement 
                    et la productivité des plantes. Une irrigation bien gérée améliore les rendements et la qualité des récoltes.
                </p>
            </div>
        </div>

        <!-- Avantages -->
        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">
                            <i class="bi bi-check-circle-fill text-info me-2"></i>Avantages de l'irrigation
                        </h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-arrow-right-circle text-info me-2"></i>Assure une croissance régulière des cultures</li>
                            <li class="mb-2"><i class="bi bi-arrow-right-circle text-info me-2"></i>Améliore les rendements et la qualité</li>
                            <li class="mb-2"><i class="bi bi-arrow-right-circle text-info me-2"></i>Permet la culture en saison sèche</li>
                            <li class="mb-2"><i class="bi bi-arrow-right-circle text-info me-2"></i>Réduit les risques de stress hydrique</li>
                            <li class="mb-2"><i class="bi bi-arrow-right-circle text-info me-2"></i>Facilite l'absorption des nutriments</li>
                            <li class="mb-0"><i class="bi bi-arrow-right-circle text-info me-2"></i>Optimise l'utilisation de l'eau</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">
                            <i class="bi bi-calendar-check text-success me-2"></i>Quand irriguer ?
                        </h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-clock text-success me-2"></i><strong>Matin tôt :</strong> Avant 10h pour éviter l'évaporation</li>
                            <li class="mb-2"><i class="bi bi-clock text-success me-2"></i><strong>Soir :</strong> Après 17h pour une meilleure absorption</li>
                            <li class="mb-2"><i class="bi bi-clock text-success me-2"></i><strong>Selon le stade :</strong> Plus fréquent en période de croissance</li>
                            <li class="mb-2"><i class="bi bi-clock text-success me-2"></i><strong>Signes de stress :</strong> Feuilles flétries, sol sec</li>
                            <li class="mb-0"><i class="bi bi-clock text-success me-2"></i><strong>Éviter :</strong> Pendant les heures chaudes (11h-16h)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Méthodes d'irrigation -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4">
                    <i class="bi bi-gear-fill text-warning me-2"></i>Méthodes d'irrigation
                </h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-1-circle-fill text-info me-3 fs-5"></i>
                            <div>
                                <h6 class="fw-bold">Irrigation par aspersion</h6>
                                <p class="mb-0">Arrosage uniforme par jets d'eau. Idéal pour les grandes surfaces et les cultures sensibles. Nécessite une bonne pression d'eau.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-2-circle-fill text-info me-3 fs-5"></i>
                            <div>
                                <h6 class="fw-bold">Irrigation au goutte-à-goutte</h6>
                                <p class="mb-0">Apport d'eau directement au pied des plantes. Économique en eau, réduit l'évaporation et les mauvaises herbes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-3-circle-fill text-info me-3 fs-5"></i>
                            <div>
                                <h6 class="fw-bold">Irrigation par ruissellement</h6>
                                <p class="mb-0">L'eau coule entre les rangs de culture. Simple et peu coûteuse, adaptée aux sols en pente douce.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-4-circle-fill text-info me-3 fs-5"></i>
                            <div>
                                <h6 class="fw-bold">Irrigation manuelle</h6>
                                <p class="mb-0">Arrosage à l'arrosoir ou au tuyau. Contrôle précis, idéal pour les petites surfaces et les cultures délicates.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Besoins en eau -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4">
                    <i class="bi bi-droplet-half text-primary me-2"></i>Besoins en eau selon les cultures
                </h4>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="p-3 bg-light rounded">
                            <h6 class="fw-bold text-success">
                                <i class="bi bi-droplet-fill me-2"></i>Besoins élevés
                            </h6>
                                <p class="small mb-1"><strong>Riz, maïs, tomate, chou</strong></p>
                                <p class="small mb-0">3-5 arrosages par semaine en saison sèche</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-light rounded">
                            <h6 class="fw-bold text-info">
                                <i class="bi bi-droplet me-2"></i>Besoins modérés
                            </h6>
                                <p class="small mb-1"><strong>Haricot, arachide, mil, sorgho</strong></p>
                                <p class="small mb-0">2-3 arrosages par semaine en saison sèche</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-light rounded">
                            <h6 class="fw-bold text-warning">
                                <i class="bi bi-droplet-half me-2"></i>Besoins faibles
                            </h6>
                                <p class="small mb-1"><strong>Manioc, igname, patate douce</strong></p>
                                <p class="small mb-0">1-2 arrosages par semaine en saison sèche</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quantité d'eau -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-3">
                    <i class="bi bi-calculator text-secondary me-2"></i>Quantité d'eau recommandée
                </h4>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Jeunes plants :</strong> 5-10 litres/m² par arrosage</p>
                        <p><strong>Plantes en croissance :</strong> 10-20 litres/m² par arrosage</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Plantes matures :</strong> 15-30 litres/m² par arrosage</p>
                        <p><strong>En période de sécheresse :</strong> Augmenter de 30-50%</p>
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
                <li>Évitez l'excès d'eau qui peut provoquer la pourriture des racines</li>
                <li>Irriguez au niveau du sol, pas sur les feuilles (risque de maladies)</li>
                <li>Adaptez la fréquence selon le type de sol (argileux retient plus l'eau)</li>
                <li>Utilisez de l'eau propre pour éviter la propagation de maladies</li>
                <li>Surveillez les signes de stress hydrique (feuilles flétries, jaunissement)</li>
                <li>Évitez l'irrigation pendant les pluies pour économiser l'eau</li>
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

