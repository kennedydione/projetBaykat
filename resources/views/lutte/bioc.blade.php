<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} - Biocontrôle</title>
    
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
        .content-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .feature-item {
            padding: 15px;
            border-left: 4px solid #ffc107;
            margin-bottom: 15px;
            background: #fffbf0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="bg-gray-50 text-gray-800">
    <!-- ✅ NAVBAR améliorée -->
    <nav class="navbar-custom text-white shadow-lg sticky top-0 z-50">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/b2.png') }}" alt="Baykat+" class="me-2" style="width: 120px; height: 40px; object-fit: cover;">
                    <a href="{{ route('home') }}" class="text-xl fw-bold text-white text-decoration-none ms-2">Baykat+</a>
                </div>
                <div class="d-none d-md-flex align-items-center gap-3">
                    <a href="{{ route('home') }}" class="text-white text-decoration-none">Accueil</a>
                    <a href="{{ route('guide.index') }}" class="text-white text-decoration-none">Guide</a>
                    <a href="{{ route('meteo.index') }}" class="text-white text-decoration-none">Météo</a>
                    @auth
                        <a href="{{ route('profile.edit') }}" class="text-white text-decoration-none">Profil</a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light">Déconnexion</button>
                        </form>
                    @endauth
                </div>
                <button class="d-md-none btn btn-link text-white" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
                    <i class="bi bi-list fs-4"></i>
                </button>
            </div>
            <div class="collapse d-md-none pb-3" id="mobileMenu">
                <div class="d-flex flex-column gap-2">
                    <a href="{{ route('home') }}" class="text-white text-decoration-none py-2">Accueil</a>
                    <a href="{{ route('guide.index') }}" class="text-white text-decoration-none py-2">Guide</a>
                    <a href="{{ route('meteo.index') }}" class="text-white text-decoration-none py-2">Météo</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <!-- Bouton de retour -->
        <div class="mb-4">
            <a href="{{ route('semence.lutte-maladies') }}" class="btn btn-retour">
                <i class="bi bi-arrow-left-circle me-2"></i>Retour à la lutte contre les maladies
            </a>
        </div>

        <div class="content-card p-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-warning fw-bold mb-4">
                        <i class="bi bi-flower2 me-2"></i>Biocontrôle
                    </h1>
                    
                    <div class="mb-4">
                        <img src="{{ asset('images/bioc.png') }}" class="img-fluid rounded shadow mb-4" alt="Biocontrôle" style="max-height: 300px; width: 100%; object-fit: cover;">
                    </div>

                    <h3 class="text-warning mb-3">Qu'est-ce que le biocontrôle ?</h3>
                    <p class="lead text-muted mb-4">
                        Le biocontrôle des cultures consiste à utiliser des mécanismes naturels pour protéger les plantes contre les nuisibles 
                        (ravageurs, maladies, mauvaises herbes) sans recourir aux pesticides chimiques. Il s'appuie sur l'utilisation d'organismes vivants 
                        comme les insectes, les champignons, les bactéries, ou de substances naturelles telles que les phéromones. Ces méthodes visent à gérer 
                        les équilibres naturels plutôt qu'à éradiquer les populations nuisibles, s'inscrivant ainsi dans une approche de protection intégrée et durable.
                    </p>

                    <h3 class="text-warning mb-3">Catégories d'agents de biocontrôle</h3>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <h5><i class="bi bi-bug text-warning me-2"></i>Macro-organismes</h5>
                                <p class="mb-0">Utilisation d'organismes vivants comme les insectes prédateurs (acariens), les insectes parasitoïdes (guêpes) ou les nématodes bénéfiques pour contrôler les ravageurs.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <h5><i class="bi bi-droplet text-warning me-2"></i>Micro-organismes</h5>
                                <p class="mb-0">Recours à des micro-organismes comme les bactéries, les virus ou les champignons pour lutter contre les maladies et les ravageurs.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <h5><i class="bi bi-flower3 text-warning me-2"></i>Médiateurs chimiques</h5>
                                <p class="mb-0">Utilisation de substances comme les phéromones pour perturber la reproduction des insectes ou pour les piéger.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <h5><i class="bi bi-tree text-warning me-2"></i>Substances naturelles</h5>
                                <p class="mb-0">Emploi de composés d'origine minérale, végétale ou animale. Exemple : l'azadirachtine (neem) comme répulsif, ou le thymol comme antifongique.</p>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-warning mb-3">Bénéfices du biocontrôle</h3>
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <div class="card border-warning h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-recycle text-warning display-4 mb-3"></i>
                                    <h6>Réduction chimique</h6>
                                    <p class="text-muted small mb-0">Diminue la dépendance aux pesticides conventionnels.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-warning h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-globe text-warning display-4 mb-3"></i>
                                    <h6>Environnement</h6>
                                    <p class="text-muted small mb-0">Limite l'impact sur les écosystèmes et les auxiliaires.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-warning h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-heart text-warning display-4 mb-3"></i>
                                    <h6>Sécurité</h6>
                                    <p class="text-muted small mb-0">Réduit les risques pour la santé des applicateurs.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-warning h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-cash-coin text-warning display-4 mb-3"></i>
                                    <h6>Rentabilité</h6>
                                    <p class="text-muted small mb-0">Contribue à maintenir la performance technico-économique.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-warning mb-3">Exemples pratiques de biocontrôle</h3>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="card border-warning">
                                <div class="card-body">
                                    <h5><i class="bi bi-bug-fill text-warning me-2"></i>Coccinelles</h5>
                                    <p class="text-muted small mb-0">Prédatrices naturelles des pucerons. Une seule coccinelle peut consommer jusqu'à 100 pucerons par jour.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-warning">
                                <div class="card-body">
                                    <h5><i class="bi bi-flower1 text-warning me-2"></i>Bacillus thuringiensis</h5>
                                    <p class="text-muted small mb-0">Bactérie utilisée contre les chenilles et larves d'insectes. Efficace et sans danger pour l'environnement.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-warning">
                                <div class="card-body">
                                    <h5><i class="bi bi-tree text-warning me-2"></i>Huile de neem</h5>
                                    <p class="text-muted small mb-0">Extrait naturel répulsif contre de nombreux ravageurs. Agit également comme antifongique.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-warning mb-3">Objectifs et principes</h3>
                    <div class="alert alert-warning">
                        <h5><i class="bi bi-info-circle me-2"></i>Approche du biocontrôle</h5>
                        <ul class="mb-0">
                            <li><strong>Gestion des équilibres :</strong> L'objectif principal est de réguler les populations de nuisibles plutôt que de les éliminer complètement.</li>
                            <li><strong>Protection des cultures :</strong> Il protège les plantes contre les maladies, les insectes ravageurs et les adventices.</li>
                            <li><strong>Approche préventive et corrective :</strong> Le biocontrôle peut être utilisé à la fois pour prévenir les infestations et pour gérer les problèmes une fois qu'ils surviennent.</li>
                        </ul>
                    </div>

                    <h3 class="text-warning mb-3">Mise en œuvre pratique</h3>
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <div class="card border-warning">
                                <div class="card-body text-center">
                                    <div class="display-6 mb-3">1️⃣</div>
                                    <h6>Identification</h6>
                                    <p class="text-muted small">Identifiez les ravageurs et maladies présents dans vos cultures.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-warning">
                                <div class="card-body text-center">
                                    <div class="display-6 mb-3">2️⃣</div>
                                    <h6>Choix</h6>
                                    <p class="text-muted small">Sélectionnez l'agent de biocontrôle adapté à votre problème.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-warning">
                                <div class="card-body text-center">
                                    <div class="display-6 mb-3">3️⃣</div>
                                    <h6>Application</h6>
                                    <p class="text-muted small">Appliquez selon les recommandations du produit ou de l'organisme.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-warning">
                                <div class="card-body text-center">
                                    <div class="display-6 mb-3">4️⃣</div>
                                    <h6>Suivi</h6>
                                    <p class="text-muted small">Surveillez l'efficacité et ajustez si nécessaire.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <h5><i class="bi bi-lightbulb me-2"></i>Conseil pratique</h5>
                        <p class="mb-0">
                            Le biocontrôle fonctionne mieux en combinaison avec d'autres pratiques culturales comme la rotation des cultures, 
                            l'utilisation de variétés résistantes et une bonne gestion de l'irrigation. C'est une approche intégrée qui maximise les résultats.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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