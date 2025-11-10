<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil Agriculteur | Baykat+</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            position: relative;
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        /* Carrousel d'arrière-plan */
        .background-slideshow {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        
        .background-slideshow img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            animation: fadeInOut 20s infinite;
        }
        
        .background-slideshow img:nth-child(1) {
            animation-delay: 0s;
        }
        
        .background-slideshow img:nth-child(2) {
            animation-delay: 5s;
        }
        
        .background-slideshow img:nth-child(3) {
            animation-delay: 10s;
        }
        
        .background-slideshow img:nth-child(4) {
            animation-delay: 15s;
        }
        
        @keyframes fadeInOut {
            0% {
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            25% {
                opacity: 1;
            }
            35% {
                opacity: 0;
            }
            100% {
                opacity: 0;
            }
        }
        
        /* Overlay sombre pour améliorer la lisibilité */
        .background-slideshow::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }
        
        .container {
            position: relative;
            z-index: 1;
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
    <!-- Carrousel d'arrière-plan -->
    <div class="background-slideshow">
        <img src="{{ asset('images/img4.png') }}" alt="Background 1">
        <img src="{{ asset('images/img1.png') }}" alt="Background 2">
        <img src="{{ asset('images/img2.png') }}" alt="Background 3">
        <img src="{{ asset('images/img3.png') }}" alt="Background 4">
    </div>

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
                    <h5 class="text-success fw-bold">📢 Publier une annonce</h5>
                    <p class="text-muted small">Publiez vos produits, événements et offres locales.</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/agriculteur/demandes" class="text-decoration-none">
                <div class="card border-info text-center p-4">
                    <h5 class="text-info fw-bold"> Traiter demande</h5>
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
