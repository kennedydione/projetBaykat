<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} - Semis en pépinière</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
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
<div class="container py-5">
    <!-- Bouton de retour -->
    <div class="mb-4">
        <a href="{{ route('semence.semis') }}" class="btn btn-retour">
            <i class="bi bi-arrow-left-circle me-2"></i>Retour aux techniques de semis
        </a>
    </div>

    <div class="content-card p-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-warning fw-bold mb-4">
                    <i class="bi bi-flower1 me-2"></i>Semis en pépinière
                </h1>
                
                <div class="mb-4">
                    <img src="{{ asset('images/img2.png') }}" class="img-fluid rounded shadow mb-4" alt="Semis en pépinière" style="max-height: 300px; width: 100%; object-fit: cover;">
                </div>

                <h3 class="text-warning mb-3">Qu'est-ce que le semis en pépinière ?</h3>
                <p class="lead text-muted mb-4">
                    Le semis en pépinière consiste à faire germer et développer les jeunes plants dans un environnement contrôlé 
                    (bacs, pots, ou planches spéciales) avant de les transplanter en pleine terre. Cette méthode est particulièrement 
                    adaptée aux cultures délicates, aux variétés précieuses, et aux conditions climatiques difficiles. 
                    Elle permet un meilleur contrôle de la germination et une protection optimale des jeunes plants.
                </p>

                <h3 class="text-warning mb-3">Avantages</h3>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-warning me-2"></i>Protection des jeunes plants</h5>
                            <p class="mb-0">Les plants sont protégés des intempéries, des ravageurs et des maladies pendant leur phase critique de développement.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-warning me-2"></i>Meilleur taux de germination</h5>
                            <p class="mb-0">Contrôle optimal des conditions (humidité, température, lumière) favorise une germination réussie.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-warning me-2"></i>Gain de temps</h5>
                            <p class="mb-0">Permet de démarrer les cultures avant la saison, optimisant ainsi le calendrier de production.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-warning me-2"></i>Économie de semences</h5>
                            <p class="mb-0">Réduit le gaspillage de semences précieuses en garantissant un meilleur taux de réussite.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-warning me-2"></i>Sélection des meilleurs plants</h5>
                            <p class="mb-0">Permet de choisir uniquement les plants les plus vigoureux pour la transplantation.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-warning me-2"></i>Adaptation progressive</h5>
                            <p class="mb-0">Les plants peuvent être progressivement acclimatés aux conditions extérieures avant transplantation.</p>
                        </div>
                    </div>
                </div>

                <h3 class="text-warning mb-3">Technique de mise en œuvre</h3>
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-warning">
                            <div class="card-body text-center">
                                <div class="display-4 mb-3">1️⃣</div>
                                <h5>Préparation du substrat</h5>
                                <p class="text-muted small">Utilisez un mélange de terre fine, compost et sable (ratio 2:1:1) pour un bon drainage.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-warning">
                            <div class="card-body text-center">
                                <div class="display-4 mb-3">2️⃣</div>
                                <h5>Semis en conteneurs</h5>
                                <p class="text-muted small">Plantez 2-3 graines par pot ou alvéole à 1-2 cm de profondeur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-warning">
                            <div class="card-body text-center">
                                <div class="display-4 mb-3">3️⃣</div>
                                <h5>Entretien</h5>
                                <p class="text-muted small">Arrosez régulièrement, maintenez à l'abri du soleil direct et protégez du froid.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-warning">
                            <div class="card-body text-center">
                                <div class="display-4 mb-3">4️⃣</div>
                                <h5>Éclaircissage</h5>
                                <p class="text-muted small">Conservez uniquement le plant le plus vigoureux dans chaque conteneur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-warning">
                            <div class="card-body text-center">
                                <div class="display-4 mb-3">5️⃣</div>
                                <h5>Transplantation</h5>
                                <p class="text-muted small">Transplantez lorsque les plants ont 3-4 vraies feuilles, de préférence en fin d'après-midi.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="text-warning mb-3">Types de conteneurs</h3>
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card border-warning">
                            <div class="card-body">
                                <h5><i class="bi bi-box-seam text-warning me-2"></i>Pots en plastique</h5>
                                <p class="text-muted small mb-0">Réutilisables, faciles à manipuler. Idéal pour les cultures individuelles.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-warning">
                            <div class="card-body">
                                <h5><i class="bi bi-grid-3x3 text-warning me-2"></i>Alvéoles</h5>
                                <p class="text-muted small mb-0">Pratiques pour les grandes quantités. Facilite la transplantation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-warning">
                            <div class="card-body">
                                <h5><i class="bi bi-recycle text-warning me-2"></i>Récupération</h5>
                                <p class="text-muted small mb-0">Bouteilles, boîtes d'œufs, pots de yaourt recyclés. Économique et écologique.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="text-warning mb-3">Cultures adaptées</h3>
                <div class="d-flex flex-wrap gap-2 mb-4">
                    <span class="badge bg-warning text-dark p-3">🍅 Tomate</span>
                    <span class="badge bg-warning text-dark p-3">🌶️ Piment</span>
                    <span class="badge bg-warning text-dark p-3">🥬 Chou</span>
                    <span class="badge bg-warning text-dark p-3">🥒 Concombre</span>
                    <span class="badge bg-warning text-dark p-3">🌱 Aubergine</span>
                    <span class="badge bg-warning text-dark p-3">🌶️ Poivron</span>
                    <span class="badge bg-warning text-dark p-3">🌿 Basilic</span>
                    <span class="badge bg-warning text-dark p-3">🌾 Riz (repiquage)</span>
                </div>

                <h3 class="text-warning mb-3">Conseils pour une transplantation réussie</h3>
                <div class="alert alert-warning">
                    <ul class="mb-0">
                        <li><strong>Moment optimal :</strong> Transplantez en fin d'après-midi ou par temps nuageux pour réduire le stress.</li>
                        <li><strong>Préparation :</strong> Arrosez bien les plants la veille de la transplantation.</li>
                        <li><strong>Profondeur :</strong> Plantez à la même profondeur qu'en pépinière, ou légèrement plus profond.</li>
                        <li><strong>Espacement :</strong> Respectez les distances recommandées pour chaque culture.</li>
                        <li><strong>Arrosage :</strong> Arrosez immédiatement après transplantation et continuez régulièrement pendant 1-2 semaines.</li>
                        <li><strong>Protection :</strong> Protégez du soleil direct les premiers jours avec un ombrage temporaire.</li>
                    </ul>
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('agriculteur.planification') }}" class="btn btn-warning btn-lg">
                        <i class="bi bi-calendar-check me-2"></i>Planifier avec cette méthode
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
