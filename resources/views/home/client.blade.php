<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil Client | Baykat+</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>
<body>
<div class="container py-5">
    <h1 class="text-center text-bg-success py-2 px-4 rounded-pill mb-5">👋 Bienvenue, cher client</h1>

    <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
        <div class="col">
            <a href="/produits" class="text-decoration-none">
                <div class="card border-success text-center p-4">
                    <h5 class="text-success fw-bold">🛍️ Produits agricoles</h5>
                    <p class="text-muted small">Explorez les produits disponibles à l’achat.</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/annonce" class="text-decoration-none">
                <div class="card border-primary text-center p-4">
                    <h5 class="text-primary fw-bold">📢 Annonces récentes</h5>
                    <p class="text-muted small">Consultez les dernières annonces publiées.</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/contact-agriculteur" class="text-decoration-none">
                <div class="card border-info text-center p-4">
                    <h5 class="text-info fw-bold">💬 Contacter un agriculteur</h5>
                    <p class="text-muted small">Posez vos questions ou demandez un devis.</p>
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
