<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} - Techniques de semis</title>
    
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
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .card a {
            color: #16a34a;
            text-decoration: none;
            font-weight: 600;
        }
        .card a:hover {
            color: #15803d;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container py-4">
    <!-- Bouton de retour -->
    <div class="mb-4">
        <a href="/agriculteur/home" class="btn btn-retour">
            <i class="bi bi-arrow-left-circle me-2"></i>Retour à l'accueil agriculteur
        </a>
    </div>

    <h2 class="text-center mb-4">
        <i class="bi bi-seedling text-success me-2"></i>Techniques de semis
    </h2>

    <!-- Illustration principale -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center">
            <img src="{{ asset('images/img3.png') }}" class="img-fluid rounded shadow" alt="Illustration semis" style="max-height: 300px; object-fit: cover;">
            <p class="mt-3 text-muted">Maïs • Riz hybride • Tomates résistantes</p>
            <div class="d-flex justify-content-center gap-3 mt-2">
                <span class="badge bg-warning text-dark">
                    <i class="bi bi-sun me-1"></i>Soleil
                </span>
                <span class="badge bg-info text-dark">
                    <i class="bi bi-droplet me-1"></i>Eau
                </span>
            </div>
        </div>
    </div>

    <!-- Types de semis -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ asset('images/img.png') }}" class="card-img-top" alt="Semi direct" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        <i class="bi bi-tree text-success me-2"></i>Semi direct
                    </h5>
                    <p class="card-text">Semis directement en terre sans préparation complexe. Méthode rapide et efficace pour les sols adaptés.</p>
                    <a href="{{ route('semis.direct') }}" class="btn btn-outline-success mt-2">
                        <i class="bi bi-arrow-right-circle me-1"></i>Lire plus ici
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ asset('images/img1.png') }}" class="card-img-top" alt="Semi en ligne" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        <i class="bi bi-grid-3x3 text-primary me-2"></i>Semi en ligne
                    </h5>
                    <p class="card-text">Semis organisé en rangées pour faciliter l'entretien et optimiser l'espace disponible.</p>
                    <a href="{{ route('semis.ligne') }}" class="btn btn-outline-primary mt-2">
                        <i class="bi bi-arrow-right-circle me-1"></i>Lire plus ici
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ asset('images/img2.png') }}" class="card-img-top" alt="Semi pépinière" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        <i class="bi bi-flower1 text-warning me-2"></i>Semi en pépinière
                    </h5>
                    <p class="card-text">Semis en bac ou en pot avant transplantation. Idéal pour les cultures délicates.</p>
                    <a href="{{ route('semis.pepiniere') }}" class="btn btn-outline-warning mt-2">
                        <i class="bi bi-arrow-right-circle me-1"></i>Lire plus ici
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>