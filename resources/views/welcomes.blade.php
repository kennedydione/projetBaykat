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
             <img src="{{ asset('images/b2.png') }}" alt="Riz" class="img-fluid rounded-circle mb-3"
                 style="width: 120px; height: 40px; object-fit: cover;">
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-wide hover:text-green-200">
                 Baykat+
            </a>

            <!-- Liens de navigation -->
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="hover:text-green-200">Accueil</a>
                <a href="{{ route('guide.index') }}" class="hover:text-green-200">Guide Agricole</a>
                <a href="{{ route('meteo.index') }}" class="hover:text-green-200">Météo</a>

                @auth
                @if(Auth::user() && isset(Auth::user()->role) && Auth::user()->role === 'client')
                <a href="{{ route('client.demandes') }}" class="hover:text-green-200">Mes demandes</a>
                @endif
                @if(Auth::user() && isset(Auth::user()->role) && Auth::user()->role === 'agriculteur')
                <a href="{{ route('agriculteur.demandes') }}" class="hover:text-green-200">Demandes reçues</a>
                @endif
                <a href="profile" class="hover:text-green-200">Mon Profil</a>
               <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    🔓 Se déconnecter
                </button>
                </form>


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
            @if(Auth::user() && isset(Auth::user()->role) && Auth::user()->role === 'client')
            <a href="{{ route('client.demandes') }}" class="block py-2">Mes demandes</a>
            @endif
            @if(Auth::user() && isset(Auth::user()->role) && Auth::user()->role === 'agriculteur')
            <a href="{{ route('agriculteur.demandes') }}" class="block py-2">Demandes reçues</a>
            @endif
            @else
            <a href="{{ route('login') }}" class="block py-2">Connexion</a>
            <a href="{{ route('register') }}" class="block py-2">Inscription</a>
            @endauth
        </div>
    </nav>

    <!-- Bannière alerte météo -->
    @php($now = \Carbon\Carbon::now())
    <div class="container mt-3">
        <div class="alert alert-warning d-flex justify-content-between align-items-center" role="alert">
            <div>
                <strong>🌦️ Alerte météo:</strong>
                Consultez les prévisions locales avant vos opérations de semis et traitements.
            </div>
            <a href="{{ route('meteo.index') }}" class="btn btn-sm btn-outline-dark">Voir la météo</a>
        </div>
    </div>

    <section class="text-center my-5">
        <h1 class="fw-bold text-success">🌱 Bienvenue sur Baykat+</h1>
        <p class="text-muted">Votre plateforme numérique pour une agriculture intelligente, connectée et communautaire.</p>
    </section>


<div class="row row-cols-1 row-cols-md-3 g-4 text-center">
    <div class="col">
        <a href="/client/home" class="text-decoration-none">
            <div class="card border-success p-4">
                <h5 class="text-success fw-bold">👤 Espace Client</h5>
                <p class="text-muted small">Explorer les produits, envoyer des demandes, contacter un agriculteur.</p>
            </div>
        </a>
    </div>
    <div class="col">
        <a href="/agriculteur/home" class="text-decoration-none">
            <div class="card border-warning p-4">
                <h5 class="text-warning fw-bold">👨‍🌾 Espace Agriculteur</h5>
                <p class="text-muted small">Publier des annonces, suivre les cultures, consulter les guides.</p>
            </div>
        </a>
    </div>
    <div class="col">
        <a href="/admin/home" class="text-decoration-none">
            <div class="card border-danger p-4">
                <h5 class="text-danger fw-bold">🛡️ Espace Admin</h5>
                <p class="text-muted small">Gérer les utilisateurs, modérer les annonces, consulter les statistiques.</p>
            </div>
        </a>
    </div>
</div>


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
    <div class="container mx-auto px-6">
        <div class="row g-4 align-items-center">
            <div class="col-md-6 order-md-2">
                <img src="{{ asset('images/b1.png') }}" alt="Dashboard agricole" class="rounded-3 shadow-sm w-100">
            </div>
            <div class="col-md-6 order-md-1">
                <h2 class="h3 fw-bold mb-3 text-success">Une plateforme agricole connectée</h2>
                <p class="text-muted">Centralisez météo locale, type de sol, suivi des semis et indicateurs clés pour optimiser vos décisions au quotidien.</p>
                <ul class="list-unstyled text-muted mb-4">
                    <li>✔️ Alerte météo et rappels de semis</li>
                    <li>✔️ Gestion d’annonces et demandes</li>
                    <li>✔️ Guides et bonnes pratiques</li>
                </ul>
                <a href="{{ route('login') }}" class="btn btn-success">Découvrir plus →</a>
            </div>
        </div>
    </div>
</section>

<!-- Bloc annonces -->
<section class="py-16 bg-white">
    <div class="container px-4 text-center">
        <h2 class="h3 fw-bold text-success mb-3">📢 Toutes les annonces agricoles</h2>
        <p class="text-muted mb-4">Produits disponibles, événements à venir, projets en cours… Retrouvez toutes les annonces publiées par la communauté Baykat+.</p>
        <a href="{{ route('annonce.index') }}" class="btn btn-success px-5 py-3 rounded-pill shadow-sm">🔍 Voir les annonces</a>
    </div>
</section>

<!-- Suivi intelligent -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="row g-4 align-items-center">
            <div class="col-md-6">
                <h2 class="h3 fw-bold mb-3 text-success">Suivi intelligent des cultures</h2>
                <p class="text-muted">Tendances, corrélations et risques liés à l’irrigation, la fertilisation et la protection des plantes pour optimiser votre récolte.</p>
                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('meteo.index') }}" class="btn btn-outline-primary">🌦️ Voir la météo</a>
                    <a href="{{ route('agriculteur.calendrier') }}" class="btn btn-outline-success">📅 Mon calendrier</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/meteo1.png') }}" alt="image agricole" class="rounded-3 shadow-sm w-100">
            </div>
        </div>
    </div>
    </section>

<!-- Nos outils -->
<section class="py-16 bg-gray-100">
    <div class="container">
        <h2 class="h3 fw-bold text-success text-center mb-4">🛠️ Nos outils intelligents</h2>
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3">
                <div class="card h-100 shadow-sm p-3">
                    <img src="{{ asset('images/pub.png') }}" class="svg-icon mb-2 mx-auto" alt="Annonce">
                    <p class="text-success fw-semibold mb-0">Annonce publicitaire</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card h-100 shadow-sm p-3">
                    <img src="{{ asset('images/suivi.png') }}" class="svg-icon mb-2 mx-auto" alt="Suivi">
                    <p class="text-success fw-semibold mb-0">Suivi des cultures</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card h-100 shadow-sm p-3">
                    <img src="{{ asset('images/météo.png') }}" class="svg-icon mb-2 mx-auto" alt="Météo">
                    <p class="text-success fw-semibold mb-0">Données météo</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card h-100 shadow-sm p-3">
                    <img src="{{ asset('images/guide.png') }}" class="svg-icon mb-2 mx-auto" alt="Guides">
                    <p class="text-success fw-semibold mb-0">Guides & accompagnement</p>
                </div>
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
                        <img src="{{ asset('images/arachide.png') }}" class="rounded-lg shadow-lg" alt="Arachide">
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
            <p>Plateforme pour l’agriculture intelligente et le guide numérique.</p>
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
            <p>Email : i.dione5@isepdiamniadio.edu.sn</p>
            <p>Téléphone : +221 77 190 70 71</p>
        </div>
    </div>
    <div class="text-center mt-6 text-sm text-green-200">
        &copy
        <!-- ✅ Pied de page -->
        <footer class="bg-green-700 text-white text-center py-4">
            <p>&copy; {{ date('Y') }} Baykat+. Tous droits réservés.</p>
        </footer>
