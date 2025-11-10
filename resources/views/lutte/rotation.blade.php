<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} - Rotation des cultures</title>
    
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
            border-left: 4px solid #0d6efd;
            margin-bottom: 15px;
            background: #e7f1ff;
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
                    <h1 class="text-primary fw-bold mb-4">
                        <i class="bi bi-arrow-repeat me-2"></i>Rotation des cultures
                    </h1>
                    
                    <div class="mb-4">
                        <img src="{{ asset('images/rotation.png') }}" class="img-fluid rounded shadow mb-4" alt="Rotation des cultures" style="max-height: 300px; width: 100%; object-fit: cover;">
                    </div>

                    <h3 class="text-primary mb-3">Qu'est-ce que la rotation des cultures ?</h3>
                    <p class="lead text-muted mb-4">
                        La rotation des cultures est une technique agricole consistant à alterner les types de cultures sur une même parcelle 
                        sur des cycles réguliers. Son objectif principal est de maintenir ou améliorer la fertilité des sols, en évitant leur épuisement, 
                        et de limiter la propagation des maladies et des parasites.
                    </p>

                    <h3 class="text-primary mb-3">Principes clés</h3>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <h5><i class="bi bi-check-circle-fill text-primary me-2"></i>Alternance des familles</h5>
                                <p class="mb-0">On ne cultive pas les mêmes espèces ou celles de la même famille (comme les solanacées : tomates, aubergines) sur le même terrain pendant plusieurs années consécutives.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <h5><i class="bi bi-check-circle-fill text-primary me-2"></i>Bénéfice des besoins différents</h5>
                                <p class="mb-0">Certaines cultures ont besoin de beaucoup de nutriments (ex: maïs), tandis que d'autres, comme les légumineuses, fixent l'azote dans le sol pour l'enrichir.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <h5><i class="bi bi-check-circle-fill text-primary me-2"></i>Durée du cycle</h5>
                                <p class="mb-0">Le cycle de rotation est planifié sur plusieurs années. Un cycle simple peut comporter deux ou trois cultures, alors que les cycles complexes en incluent une douzaine ou plus.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <h5><i class="bi bi-check-circle-fill text-primary me-2"></i>Maintien de la structure</h5>
                                <p class="mb-0">Des cultures avec des systèmes racinaires différents peuvent aider à ameublir le sol en profondeur, améliorant sa structure.</p>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-primary mb-3">Avantages</h3>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="card border-primary h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-flower1 text-primary display-4 mb-3"></i>
                                    <h5>Sol</h5>
                                    <p class="text-muted small mb-0">Maintien de la fertilité, évite l'épuisement des nutriments.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-primary h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-shield-check text-primary display-4 mb-3"></i>
                                    <h5>Maladies</h5>
                                    <p class="text-muted small mb-0">Réduction des maladies et des ravageurs spécifiques à une culture.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-primary h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-graph-up text-primary display-4 mb-3"></i>
                                    <h5>Rendements</h5>
                                    <p class="text-muted small mb-0">Optimisation de la production et augmentation des rendements à long terme.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-primary mb-3">Mise en œuvre pratique</h3>
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <div class="card border-primary">
                                <div class="card-body text-center">
                                    <div class="display-6 mb-3">1️⃣</div>
                                    <h6>Planification</h6>
                                    <p class="text-muted small">Planifiez la rotation à l'avance, en tenant compte des types de cultures.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-primary">
                                <div class="card-body text-center">
                                    <div class="display-6 mb-3">2️⃣</div>
                                    <h6>Organisation</h6>
                                    <p class="text-muted small">Divisez le potager en plusieurs sections et déplacez chaque groupe annuellement.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-primary">
                                <div class="card-body text-center">
                                    <div class="display-6 mb-3">3️⃣</div>
                                    <h6>Classification</h6>
                                    <p class="text-muted small">Classez les cultures : légumineuses, légumes-racines, légumes-feuilles, légumes-fruits.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-primary">
                                <div class="card-body text-center">
                                    <div class="display-6 mb-3">4️⃣</div>
                                    <h6>Suivi</h6>
                                    <p class="text-muted small">Tenez un registre de vos rotations pour éviter les répétitions.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-primary mb-3">Exemple de rotation sur 4 ans</h3>
                    <div class="table-responsive mb-4">
                        <table class="table table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th>Année</th>
                                    <th>Section 1</th>
                                    <th>Section 2</th>
                                    <th>Section 3</th>
                                    <th>Section 4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Année 1</strong></td>
                                    <td>Légumineuses</td>
                                    <td>Légumes-fruits</td>
                                    <td>Légumes-racines</td>
                                    <td>Légumes-feuilles</td>
                                </tr>
                                <tr>
                                    <td><strong>Année 2</strong></td>
                                    <td>Légumes-fruits</td>
                                    <td>Légumes-racines</td>
                                    <td>Légumes-feuilles</td>
                                    <td>Légumineuses</td>
                                </tr>
                                <tr>
                                    <td><strong>Année 3</strong></td>
                                    <td>Légumes-racines</td>
                                    <td>Légumes-feuilles</td>
                                    <td>Légumineuses</td>
                                    <td>Légumes-fruits</td>
                                </tr>
                                <tr>
                                    <td><strong>Année 4</strong></td>
                                    <td>Légumes-feuilles</td>
                                    <td>Légumineuses</td>
                                    <td>Légumes-fruits</td>
                                    <td>Légumes-racines</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="alert alert-info">
                        <h5><i class="bi bi-info-circle me-2"></i>Conseil pratique</h5>
                        <p class="mb-0">
                            Un exemple typique est de diviser le potager en quatre sections et de déplacer chaque année un groupe de légumes 
                            d'une section à la suivante pour qu'aucun groupe ne revienne au même endroit avant quatre ans.
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