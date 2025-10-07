<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('{{ asset('images/img4.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.95);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.03);
            color:gray;
        }
        h1 {
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="container py-5">
    <h2 class="text-center mb-4">
        <marquee>Bienvenue sur Baykat+ 👇👇</marquee>
    </h2>

    <h1 class="text-center text-bg-secondary py-2 px-4 rounded-pill mb-5">
        🌾 Guide Agricole
    </h1>

    <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">

        <!-- Carte 1 -->
        <div class="col">
            <a href="/semence" class="text-decoration-none">
                <div class="card h-100 border-success shadow-sm text-center p-4">
                    <h5 class="mb-2 text-success fw-bold">🌱 Choix des semences</h5>
                    <hr>
                </div>
            </a>
        </div>

        <!-- Carte 2 -->
        <div class="col">
            <a href="/semis" class="text-decoration-none">
                <div class="card h-100 border-primary shadow-sm text-center p-4">
                    <h5 class="mb-2 text-primary fw-bold">🧪 Techniques de semis</h5>
                    <hr>
                </div>
            </a>
        </div>

        <!-- Carte 3 -->
        <div class="col">
            <a href="/entretien" class="text-decoration-none">
                <div class="card h-100 border-warning shadow-sm text-center p-4">
                    <h5 class="mb-2 text-warning fw-bold">🌿 Entretien des cultures</h5>
                    <hr>
                </div>
            </a>
        </div>

        <!-- Carte 4 -->
        <div class="col">
            <a href="/lutte-maladies" class="text-decoration-none">
                <div class="card h-100 border-danger shadow-sm text-center p-4">
                    <h5 class="mb-2 text-danger fw-bold">🛡️ Lutte contre les maladies</h5>
                    <hr>
                </div>
            </a>
        </div>

        <!-- Carte 5 -->
        <div class="col">
            <a href="agriculteur/planification" class="text-decoration-none">
                <div class="card h-100 border-info shadow-sm text-center p-4">
                    <h5 class="mb-2 text-info fw-bold">📅 Planifier vos cultures</h5>
                    <hr>
                </div>
            </a>
        </div>

    </div>
</div>

</body>
</html>
