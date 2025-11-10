<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} - Semis en ligne</title>
    
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
            border-left: 4px solid #0d6efd;
            margin-bottom: 15px;
            background: #e7f1ff;
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
                <h1 class="text-primary fw-bold mb-4">
                    <i class="bi bi-grid-3x3 me-2"></i>Semis en ligne
                </h1>
                
                <div class="mb-4">
                    <img src="{{ asset('images/img1.png') }}" class="img-fluid rounded shadow mb-4" alt="Semis en ligne" style="max-height: 300px; width: 100%; object-fit: cover;">
                </div>

                <h3 class="text-primary mb-3">Qu'est-ce que le semis en ligne ?</h3>
                <p class="lead text-muted mb-4">
                    Le semis en ligne consiste à organiser les graines en rangées parallèles et régulières. 
                    Cette méthode permet une meilleure gestion de l'espace, facilite l'entretien des cultures 
                    et optimise l'utilisation des ressources. C'est la technique la plus utilisée pour les grandes cultures 
                    comme le maïs, le riz, le mil et les légumineuses.
                </p>

                <h3 class="text-primary mb-3">Avantages</h3>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-primary me-2"></i>Facilite l'entretien</h5>
                            <p class="mb-0">Les rangées permettent un désherbage mécanique ou manuel plus facile entre les lignes.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-primary me-2"></i>Optimisation de l'espace</h5>
                            <p class="mb-0">Permet de maximiser le nombre de plants par unité de surface tout en maintenant un espacement optimal.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-primary me-2"></i>Meilleure aération</h5>
                            <p class="mb-0">L'espacement entre les lignes favorise la circulation de l'air, réduisant les risques de maladies.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <h5><i class="bi bi-check-circle-fill text-primary me-2"></i>Irrigation facilitée</h5>
                            <p class="mb-0">Les lignes permettent un arrosage ciblé et efficace, surtout pour l'irrigation goutte à goutte.</p>
                        </div>
                    </div>
                </div>

                <h3 class="text-primary mb-3">Technique de mise en œuvre</h3>
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="card h-100 border-primary">
                            <div class="card-body text-center">
                                <div class="display-6 mb-3">1️⃣</div>
                                <h6>Marquage</h6>
                                <p class="text-muted small">Tracez des lignes parallèles avec un cordeau ou un marqueur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100 border-primary">
                            <div class="card-body text-center">
                                <div class="display-6 mb-3">2️⃣</div>
                                <h6>Espacement</h6>
                                <p class="text-muted small">Respectez l'espacement recommandé (30-50 cm entre lignes selon la culture).</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100 border-primary">
                            <div class="card-body text-center">
                                <div class="display-6 mb-3">3️⃣</div>
                                <h6>Semis</h6>
                                <p class="text-muted small">Plantez les graines à intervalles réguliers le long de chaque ligne.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100 border-primary">
                            <div class="card-body text-center">
                                <div class="display-6 mb-3">4️⃣</div>
                                <h6>Recouvrement</h6>
                                <p class="text-muted small">Recouvrez et tassez légèrement pour un bon contact sol-graine.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="text-primary mb-3">Espacements recommandés</h3>
                <div class="table-responsive mb-4">
                    <table class="table table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>Culture</th>
                                <th>Espacement entre lignes</th>
                                <th>Espacement sur la ligne</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Maïs</strong></td>
                                <td>60-80 cm</td>
                                <td>20-30 cm</td>
                            </tr>
                            <tr>
                                <td><strong>Riz</strong></td>
                                <td>20-30 cm</td>
                                <td>15-20 cm</td>
                            </tr>
                            <tr>
                                <td><strong>Mil</strong></td>
                                <td>40-50 cm</td>
                                <td>10-15 cm</td>
                            </tr>
                            <tr>
                                <td><strong>Arachide</strong></td>
                                <td>50-60 cm</td>
                                <td>15-20 cm</td>
                            </tr>
                            <tr>
                                <td><strong>Tomate</strong></td>
                                <td>60-80 cm</td>
                                <td>40-50 cm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 class="text-primary mb-3">Cultures adaptées</h3>
                <div class="d-flex flex-wrap gap-2 mb-4">
                    <span class="badge bg-primary p-3">🌽 Maïs</span>
                    <span class="badge bg-primary p-3">🌾 Riz</span>
                    <span class="badge bg-primary p-3">🌾 Mil</span>
                    <span class="badge bg-primary p-3">🌱 Arachide</span>
                    <span class="badge bg-primary p-3">🍅 Tomate</span>
                    <span class="badge bg-primary p-3">🧅 Oignon</span>
                    <span class="badge bg-primary p-3">🥔 Pomme de terre</span>
                </div>

                <div class="alert alert-info">
                    <h5><i class="bi bi-info-circle me-2"></i>Conseil pratique</h5>
                    <p class="mb-0">
                        Pour un semis en ligne optimal, utilisez un cordeau tendu entre deux piquets pour tracer des lignes droites. 
                        Cela garantit un alignement parfait et facilite les opérations d'entretien ultérieures.
                    </p>
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('agriculteur.planification') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-calendar-check me-2"></i>Planifier avec cette méthode
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
