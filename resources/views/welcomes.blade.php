<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baykat+ — Agriculture intelligente</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate on Scroll -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- Tailwind (si activé dans ton projet) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fdfaf4;
        }
        .svg-icon {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
<div class="bg-gray-50 text-gray-800">

    <!-- ✅ NAVBAR collante -->
    <nav class="bg-green-700 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-6 py-2 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-wide hover:text-green-200">
                🌾 Baykat+
            </a>

            <!-- Liens de navigation -->
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="hover:text-green-200">Accueil</a>
                <a href="{{ route('guide.index') }}" class="hover:text-green-200">Guide Agricole</a>
                <a href="{{ route('meteo.index') }}" class="hover:text-green-200">Météo</a>

                @auth
                <a href="{{ route('dashboard') }}" class="hover:text-green-200">Mon Profil</a>
                @else
                <a href="{{ route('login') }}" class="hover:text-green-200">Connexion</a>
                <a href="{{ route('register') }}" class="hover:text-green-200">Inscription</a>
                @endauth
            </div>

            <!-- Menu mobile -->
            <div class="md:hidden">
                <button id="menu-btn" class="focus:outline-none text-2xl">☰</button>
            </div>
        </div>

        <!-- Liens mobiles -->
        <div id="mobile-menu" class="hidden bg-green-600 md:hidden px-6 pb-4">
            <a href="{{ route('home') }}" class="block py-2">Accueil</a>
            <a href="{{ route('guide.index') }}" class="block py-2">Guide Agricole</a>
            <a href="{{ route('meteo.index') }}" class="block py-2">Météo</a>

            @auth
            <a href="{{ route('dashboard') }}" class="block py-2">Mon Profil</a>
            @else
            <a href="{{ route('login') }}" class="block py-2">Connexion</a>
            <a href="{{ route('register') }}" class="block py-2">Inscription</a>
            @endauth
        </div>
    </nav>

<!-- Hero -->
<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-2xl font-bold mb-4 text-green-800">
            Des informations précieuses provenant de la météo, des guide de chemein pour l'agriculture et des annoce de produit... sur une plateforme agricole numérique facile à utiliser.
        </h1>
        <p class="text-gray-700 mb-6">
            Plus besoin de passer d’une application à une autre !
            Retrouvez toutes vos données agricoles au même endroit.
        </p>
        <a href="{{ route('register') }}"
           class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
            Commencer maintenant
        </a>
    </div>
</div>


<!-- Aperçu plateforme -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
        <img src="{{ asset('images/b1.png') }}" alt="Dashboard agricole" class="rounded-lg shadow-lg">
        <div>
            <h2 class="text-2xl font-bold mb-4 text-green-800">Une plateforme agricole connectée</h2>
            <p class="text-gray-700 mb-6">
                Notre plateforme rassemble toutes les informations sur vos parcelles :
                météo locale, type de sol, suivi des semis et indicateurs de santé des cultures.
            </p>
            <a href="{{ route('login') }}" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                Découvrir plus →
            </a>
        </div>

           <section class="d-flex justify-content-center align-items-center vh-100">
    <div class="container px-4 text-center">
        <h2 class="text-3xl fw-bold text-success mb-4">📢 Toutes les annonces agricoles</h2>
        <p class="text-muted mb-4">
            Produits disponibles, événements à venir, projets en cours…<br>
            Retrouvez toutes les annonces publiées par la communauté Baykat+.
        </p>
        <a href="{{ route('annonce.index') }}"
           class="btn btn-success px-5 py-3 rounded-pill shadow-sm">
            🔍 Voir les annonces
        </a>
    </div>
</section>



    </div>
</section>

<!-- Suivi intelligent -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
        <div>
            <h2 class="text-2xl font-bold mb-4 text-green-800">Suivi intelligent des cultures</h2>
            <p class="text-gray-700 mb-6">
                Découvrez les tendances, les corrélations et les risques liés à l’irrigation,
                la fertilisation et la protection des plantes pour optimiser votre récolte.
            </p>
            <a href="{{ route('meteo.index') }}"
               class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                Voir les données météo
            </a>
        </div>
        <img src="{{ asset('images/meteo1.png') }}" alt="image  agricole" class="rounded-lg shadow-lg">
    </div>
</section>

<!-- Nos outils -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-green-800 mb-10">🛠️ Nos outils intelligents</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/svg/tractor.svg') }}" class="svg-icon mb-2" alt="Tracteur">
                <p class="text-green-700 font-semibold">Machiner
                    ie connectée</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/svg/plant.svg') }}" class="svg-icon mb-2" alt="Plantation">
                <p class="text-green-700 font-semibold">Suivi des cultures</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/svg/cloud.svg') }}" class="svg-icon mb-2" alt="Météo">
                <p class="text-green-700 font-semibold">Données météo</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/svg/book.svg') }}" class="svg-icon mb-2" alt="Formation">
                <p class="text-green-700 font-semibold">Guides & acompagnement</p>
            </div>
        </div>
    </div>
</section>

<!-- Carousel Actualités -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-green-800 text-center mb-10">📰 Actualités & Produits</h2>
        <div id="carouselBaykat" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="grid md:grid-cols-2 gap-6 items-center">
                        <img src="{{ asset('images/arachide.jpg') }}" class="rounded-lg shadow-lg" alt="Arachide">
                        <div>
                            <h3 class="text-xl font-bold text-green-700">Arachide fraîche</h3>
                            <p class="text-gray-600">Disponible à Djilasse — 1 000 FCFA/kg</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="grid md:grid-cols-2 gap-6 items-center">
                        <img src="{{ asset('images/formation.jpg') }}" class="rounded-lg shadow-lg" alt="Formation">
                        <div>
                            <h3 class="text-xl font-bold text-green-700">Formation agricole</h3>
                            <p class="text-gray-600">Inscrivez-vous avant le 15 octobre</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBaykat" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselBaykat" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

<!-- Appel à l’action -->
<section class="py-16 text-center bg-yellow-50">
    <h2 class="text-3xl font-bold text-green-800 mb-4">🌍 Rejoignez la communauté Baykat+</h2>
    <p class="text-gray-700 mb-6">Partagez vos expériences, vos données et vos conseils avec d'autres agriculteurs.</p>
    <a href="{{ route('register') }}" class="btn btn-success btn-lg">Créer un compte gratuit</a>
</section>

<!-- Footer -->
<footer class="bg-green-900 text-white py-10">
    <div class="container mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div>
            <h4 class="font-bold mb-2">🌱 Baykat+</h4>
            <p>Plateforme pour l’agriculture intelligente et la formation locale.</p>
        </div>
        <div>
            <h4 class="font-bold mb-2">Liens utiles</h4>
            <ul class="space-y-1">
                <li><a href="{{ route('login') }}" class="hover:underline">Connexion</a></li>
                <li><a href="{{ route('register') }}" class="hover:underline">Inscription</a></li>
                <li><a href="{{ route('meteo.index') }}" class="hover:underline">Données météo</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold mb-2">Contact</h4>
            <p>Email : contact@baykat.sn</p>
            <p>Téléphone : +221 XX XXX XX XX</p>
        </div>
    </div>
    <div class="text-center mt-6 text-sm text-green-200">
        &copy
        <!-- ✅ Pied de page -->
        <footer class="bg-green-700 text-white text-center py-4">
            <p>&copy; {{ date('Y') }} Baykat+. Tous droits réservés.</p>
        </footer>
