<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil Agriculteur | Baykat+</title>
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
    <h1 class="text-center text-bg-warning py-2 px-4 rounded-pill mb-5">👨‍🌾 Bienvenue, Agriculteur</h1>

    <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
        <div class="col">
            <a href="/agriculteur/planification" class="text-decoration-none">
                <div class="card border-warning text-center p-4">
                    <h5 class="text-warning fw-bold">📅 Planifier mes cultures</h5>
                    <p class="text-muted small">Organisez vos tâches agricoles par saison et parcelle.</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/annonce" class="text-decoration-none">
                <div class="card border-success text-center p-4">
                    <h5 class="text-success fw-bold">📢 Mes annonces</h5>
                    <p class="text-muted small">Publiez vos produits, événements et offres locales.</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/suivi" class="text-decoration-none">
                <div class="card border-info text-center p-4">
                    <h5 class="text-info fw-bold">📈 Suivi des cultures</h5>
                    <p class="text-muted small">Visualisez les indicateurs météo, irrigation et santé.</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/agriculteur/demandes" class="text-decoration-none">
                <div class="card border-info text-center p-4">
                    <h5 class="text-info fw-bold"> gerer mes demandees</h5>
                    <p class="text-muted small">voir les dememde faites par les utilisateur.</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/calendrier" class="text-decoration-none">
                <div class="card border-info text-center p-4">
                    <h5 class="text-info fw-bold">voir le clendrier agricole</h5>
                    <p class="text-muted small">superviser tous les clendrier.</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/guide" class="text-decoration-none">
                <div class="card border-info text-center p-4">
                    <h5 class="text-info fw-bold"> voir le guides</h5>
                    <p class="text-muted small">ici on veras les pages de notre guide.</p>
                </div>
            </a>
        </div>
    </div>
</div>
</body>
</html>
