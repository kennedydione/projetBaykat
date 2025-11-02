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

    <section class="text-center my-5">
        <h1 class="fw-bold text-success">🌱 Bienvenue sur Baykat+</h1>
        <p class="text-muted">Votre plateforme numérique pour une agriculture intelligente, connectée et communautaire.</p>
    </section>

        <p>
            Le biocontrôle des cultures consiste à utiliser des mécanismes naturels pour protéger les plantes contre les nuisibles (ravageurs, maladies, mauvaises herbes) sans recourir aux pesticides chimiques. Il s'appuie sur l'utilisation d'organismes vivants comme les insectes, les champignons, les bactéries, ou de substances naturelles telles que les phéromones. Ces méthodes visent à gérer les équilibres naturels plutôt qu'à éradiquer les populations nuisibles, s'inscrivant ainsi dans une approche de protection intégrée et durable. 
            Catégories d'agents de biocontrôle
            Macro-organismes : Utilisation d'organismes vivants comme les insectes prédateurs (par exemple, les acariens), les insectes parasitoïdes (par exemple, les guêpes) ou les nématodes bénéfiques pour contrôler les ravageurs.
            Micro-organismes : Recours à des micro-organismes comme les bactéries, les virus ou les champignons pour lutter contre les maladies et les ravageurs.
            Médiateurs chimiques : Utilisation de substances comme les phéromones pour perturber la reproduction des insectes ou pour les piéger.
            Substances naturelles : Emploi de composés d'origine minérale, végétale ou animale. Un exemple est l'azadirachtine, extraite de l'arbre de neem, qui agit comme répulsif, ou le thymol, un antifongique. 
            Bénéfices du biocontrôle
            Réduction des produits chimiques : Diminue la dépendance aux pesticides conventionnels.
            Protection de l'environnement : Limite l'impact sur les écosystèmes et les auxiliaires.
            Sécurité pour la santé : Réduit les risques pour la santé des applicateurs.
            Rentabilité : Contribue à maintenir la performance technico-économique des exploitations. 
            Objectifs et principe
            Gestion des équilibres : L'objectif principal est de réguler les populations de nuisibles plutôt que de les éliminer complètement.
            Protection des cultures : Il protège les plantes contre les maladies, les insectes ravageurs et les adventices.
            Approche préventive et corrective : Le biocontrôle peut être utilisé à la fois pour prévenir les infestations et pour gérer les problèmes une fois qu'ils surviennent. 
        </p>
    
        &copy
        <!-- ✅ Pied de page -->
        <footer class="bg-green-700 text-white text-center py-4">
            <p>&copy; {{ date('Y') }} Baykat+. Tous droits réservés.</p>
        </footer>
</div>
</body>
</html>
