<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} - Variétés résistantes</title>
    
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
            border-left: 4px solid #16a34a;
            margin-bottom: 15px;
            background: #f0fdf4;
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
                    <h1 class="text-success fw-bold mb-4">
                        <i class="bi bi-shield-fill-check me-2"></i>Variétés résistantes
                    </h1>
                    
                    <div class="mb-4">
                        <img src="{{ asset('images/res.png') }}" class="img-fluid rounded shadow mb-4" alt="Variétés résistantes" style="max-height: 300px; width: 100%; object-fit: cover;">
                    </div>

                    <h3 class="text-success mb-3">Qu'est-ce que la résistance des cultures ?</h3>
                    <p class="lead text-muted mb-4">
                        La résistance des cultures fait référence à la capacité des plantes à résister aux maladies, aux ravageurs et aux mauvaises herbes. 
                        Elle est assurée par des méthodes telles que la sélection de variétés génétiquement résistantes et des pratiques agricoles de lutte intégrée. 
                        La résistance aux produits phytosanitaires est un problème majeur causé par leur utilisation intensive, il est donc crucial de mettre en œuvre 
                        des stratégies de gestion de la résistance à long terme.
                    </p>

                    <h3 class="text-success mb-3">Méthodes pour améliorer la résistance</h3>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <h5><i class="bi bi-check-circle-fill text-success me-2"></i>Résistance génétique</h5>
                                <p class="mb-0">Développer des variétés de cultures naturellement résistantes aux maladies et aux ravageurs est un atout majeur. Cependant, les pathogènes peuvent s'adapter, ce qui rend nécessaire une recherche constante.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <h5><i class="bi bi-check-circle-fill text-success me-2"></i>Lutte intégrée</h5>
                                <p class="mb-0">Cette approche combine différentes méthodes pour réduire l'impact des ravageurs : produits phytosanitaires, outils mécaniques et pratiques culturales.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <h5><i class="bi bi-check-circle-fill text-success me-2"></i>Rotation des cultures</h5>
                                <p class="mb-0">Faire alterner différentes cultures sur une même parcelle aide à briser le cycle de vie des ravageurs et des maladies spécialisées.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <h5><i class="bi bi-check-circle-fill text-success me-2"></i>Utilisation raisonnée</h5>
                                <p class="mb-0">Pour éviter la résistance des adventices aux herbicides, il est essentiel de raisonner leur utilisation en combinant différentes stratégies.</p>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-success mb-3">Importance de la gestion de la résistance</h3>
                    <div class="alert alert-success">
                        <h5><i class="bi bi-shield-check me-2"></i>Stratégies essentielles</h5>
                        <ul class="mb-0">
                            <li><strong>Prévention :</strong> Il est crucial d'adopter des stratégies de prévention pour retarder l'apparition de résistances.</li>
                            <li><strong>Approche concertée :</strong> La gestion de la résistance nécessite une approche concertée de tous les acteurs de la filière agricole.</li>
                            <li><strong>Réglementation :</strong> Les réglementations concernant les produits phytosanitaires peuvent freiner le renouvellement des solutions disponibles.</li>
                        </ul>
                    </div>

                    <h3 class="text-success mb-3">Comment choisir des variétés résistantes ?</h3>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="card border-success h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-search text-success display-4 mb-3"></i>
                                    <h5>Recherche</h5>
                                    <p class="text-muted small mb-0">Informez-vous sur les variétés adaptées à votre région et aux maladies locales.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-success h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-award text-success display-4 mb-3"></i>
                                    <h5>Certification</h5>
                                    <p class="text-muted small mb-0">Choisissez des semences certifiées qui garantissent la qualité et la résistance.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-success h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-geo-alt text-success display-4 mb-3"></i>
                                    <h5>Adaptation locale</h5>
                                    <p class="text-muted small mb-0">Privilégiez les variétés testées et adaptées à votre zone climatique.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-success mb-3">Exemples de variétés résistantes</h3>
                    <div class="table-responsive mb-4">
                        <table class="table table-striped">
                            <thead class="table-success">
                                <tr>
                                    <th>Culture</th>
                                    <th>Résistance principale</th>
                                    <th>Avantages</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Riz résistant</strong></td>
                                    <td>Pyriculariose, Helminthosporiose</td>
                                    <td>Rendements stables même en conditions humides</td>
                                </tr>
                                <tr>
                                    <td><strong>Tomate résistante</strong></td>
                                    <td>Mildiou, Fusariose</td>
                                    <td>Réduction des traitements phytosanitaires</td>
                                </tr>
                                <tr>
                                    <td><strong>Maïs résistant</strong></td>
                                    <td>Charançons, Pucerons</td>
                                    <td>Meilleure qualité des grains</td>
                                </tr>
                                <tr>
                                    <td><strong>Arachide résistante</strong></td>
                                    <td>Rouille, Cercosporiose</td>
                                    <td>Rendements améliorés en saison humide</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="alert alert-warning">
                        <h5><i class="bi bi-exclamation-triangle me-2"></i>Attention</h5>
                        <p class="mb-0">
                            Même avec des variétés résistantes, il est important de maintenir de bonnes pratiques culturales et de surveiller régulièrement 
                            vos cultures pour détecter rapidement tout problème.
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