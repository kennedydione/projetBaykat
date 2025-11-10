<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} - Semis direct</title>
    
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
            border-left: 4px solid #16a34a;
            margin-bottom: 15px;
            background: #f0fdf4;
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
                <h1 class="text-success fw-bold mb-4">
                    <i class="bi bi-tree me-2"></i>Semis direct
                </h1>
                
                <div class="mb-4">
                    <img src="{{ asset('images/img.png') }}" class="img-fluid rounded shadow mb-4" alt="Semis direct" style="max-height: 300px; width: 100%; object-fit: cover;">
                </div>

                <h3 class="text-success mb-3">Qu'est-ce que le semis direct ?</h3>
                <p class="lead text-muted mb-4">
                    Le semis direct consiste à planter les graines directement en terre sans préparation complexe du sol. 
                    Cette méthode traditionnelle est particulièrement adaptée aux sols légers et aux cultures résistantes 
                    comme le mil, le sorgho, et certaines variétés de maïs.
                </p>

                <h3 class="text-success mb-3">Avantages</h3>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-success me-2"></i>Gain de temps</h5>
                            <p class="mb-0">Pas besoin de labourer ou de préparer le sol en profondeur, ce qui réduit considérablement le temps de travail.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-success me-2"></i>Moins de travail du sol</h5>
                            <p class="mb-0">Préserve la structure naturelle du sol et réduit l'érosion, surtout en pente.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-success me-2"></i>Économique</h5>
                            <p class="mb-0">Réduit les coûts en carburant et en main-d'œuvre pour la préparation du sol.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-success me-2"></i>Conservation de l'humidité</h5>
                            <p class="mb-0">Le sol non travaillé conserve mieux l'humidité, idéal pour les zones sèches.</p>
                        </div>
                    </div>
                </div>

                <h3 class="text-success mb-3">Inconvénients à considérer</h3>
                <div class="alert alert-warning">
                    <h5><i class="bi bi-exclamation-triangle me-2"></i>Points d'attention</h5>
                    <ul class="mb-0">
                        <li><strong>Sensible à l'érosion :</strong> Si mal géré, surtout en terrain pentu, le sol peut s'éroder plus facilement.</li>
                        <li><strong>Gestion des mauvaises herbes :</strong> Nécessite une attention particulière pour contrôler les adventices.</li>
                        <li><strong>Adaptation du sol :</strong> Nécessite un sol déjà en bon état, pas trop compacté.</li>
                    </ul>
                </div>

                <h3 class="text-success mb-3">Technique de mise en œuvre</h3>
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-success">
                            <div class="card-body text-center">
                                <div class="display-4 mb-3">1️⃣</div>
                                <h5>Préparation minimale</h5>
                                <p class="text-muted small">Nettoyez simplement la surface du sol des débris et mauvaises herbes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-success">
                            <div class="card-body text-center">
                                <div class="display-4 mb-3">2️⃣</div>
                                <h5>Semis</h5>
                                <p class="text-muted small">Plantez les graines à la profondeur appropriée (généralement 2-3 cm).</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-success">
                            <div class="card-body text-center">
                                <div class="display-4 mb-3">3️⃣</div>
                                <h5>Recouvrement</h5>
                                <p class="text-muted small">Recouvrez légèrement avec de la terre fine et tassez délicatement.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="text-success mb-3">Cultures adaptées</h3>
                <div class="d-flex flex-wrap gap-2 mb-4">
                    <span class="badge bg-success p-3">🌾 Mil</span>
                    <span class="badge bg-success p-3">🌽 Sorgho</span>
                    <span class="badge bg-success p-3">🌾 Maïs (certaines variétés)</span>
                    <span class="badge bg-success p-3">🌱 Arachide</span>
                    <span class="badge bg-success p-3">🌾 Haricot</span>
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('agriculteur.planification') }}" class="btn btn-success btn-lg">
                        <i class="bi bi-calendar-check me-2"></i>Planifier avec cette méthode
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>