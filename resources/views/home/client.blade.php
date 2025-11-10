<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil Client | Baykat+</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-image: url('{{ asset('images/img4.png') }}');
            background-size: cover;
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            background-color: rgba(255,255,255,0.95);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .btn-retour {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-retour:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #495057 0%, #343a40 100%);
            color: white;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <!-- Bouton de retour -->
    <div class="mb-4">
        <a href="{{ route('home') }}" class="btn btn-retour">
            <i class="bi bi-arrow-left-circle me-2"></i>Retour à l'accueil
        </a>
    </div>

    <h1 class="text-center text-bg-success py-2 px-4 rounded-pill mb-5">👋 Bienvenue, cher client</h1>

    <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
        <div class="col">
            <a href="/annonce" class="text-decoration-none">
                <div class="card border-primary text-center p-4">
                    <h5 class="text-primary fw-bold">📢 Annonces récentes</h5>
                    <p class="text-muted small">Consultez les dernières annonces publiées.</p>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="{{ route('client.demandes') }}" class="text-decoration-none">
                <div class="card border-warning text-center p-4">
                    <h5 class="text-warning fw-bold">📩 Mes demandes</h5>
                    <p class="text-muted small">Voir l'historique et le statut de mes demandes.</p>
                </div>
            </a>
        </div>
    </div>
</div>
</body>
</html>
