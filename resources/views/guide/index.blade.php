<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} | Guide Agricole</title>

    <!-- Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            background-image: url('{{ asset('images/img4.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            padding-top: 80px;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.95);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.03);
            color: gray;
        }
        h1, h5 {
            font-weight: 600;
        }
    </style>
</head>

<body onload="AOS.init();">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">Baykat+</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/guide">Guide</a></li>
        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Contenu principal -->
<div class="container py-5">
    <h2 class="text-center mb-4">
        <marquee>Bienvenue sur Baykat+ 👇👇</marquee>
    </h2>

    <h1 class="text-center text-bg-secondary py-2 px-4 rounded-pill mb-5" data-aos="fade-down">
        🌾 Guide Agricole
    </h1>

    <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">

        @php
            $guides = [
                ['link' => 'agriculteur/semence', 'color' => 'success', 'icon' => '🌱', 'title' => 'Choix des semences', 'desc' => 'Découvrez les semences adaptées à votre sol et climat.'],
                ['link' => 'agrilcuteur/semis', 'color' => 'primary', 'icon' => '🧪', 'title' => 'Techniques de semis', 'desc' => 'Maîtrisez les méthodes de semis pour une germination optimale.'],
                ['link' => 'agriculteur/entretien', 'color' => 'warning', 'icon' => '🌿', 'title' => 'Entretien des cultures', 'desc' => 'Arrosage, désherbage et soins pour des cultures saines.'],
                ['link' => 'agriculteur/lutte-maladies', 'color' => 'danger', 'icon' => '🛡️', 'title' => 'Lutte contre les maladies', 'desc' => 'Prévention et traitement des maladies agricoles.'],
                ['link' => 'agriculteur/planification', 'color' => 'info', 'icon' => '📅', 'title' => 'Planifier vos cultures', 'desc' => 'Organisez votre saison agricole avec efficacité.'],
            ];
        @endphp

        @foreach ($guides as $index => $guide)
            <div class="col" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <a href="{{ $guide['link'] }}" class="text-decoration-none">
                    <div class="card h-100 border-{{ $guide['color'] }} shadow-sm text-center p-4">
                        <h5 class="mb-2 text-{{ $guide['color'] }} fw-bold">
                            {{ $guide['icon'] }} {{ $guide['title'] }}
                        </h5>
                        <p class="text-muted small">{{ $guide['desc'] }}</p>
                        <hr>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</div>

<!-- Footer -->
<footer class="text-center py-4 bg-light mt-5 shadow-sm">
    <small>© {{ date('Y') }} Baykat+. Tous droits réservés.</small>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
