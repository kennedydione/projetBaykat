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

            <p>La rotation des cultures est une technique agricole consistant à alterner les types de cultures sur une même parcelle sur des cycles réguliers. Son objectif principal est de maintenir ou améliorer la fertilité des sols, en évitant leur épuisement, et de limiter la propagation des maladies et des parasites. Cette méthode permet de bénéficier des besoins nutritifs variés des plantes (par exemple, certaines légumineuses enrichissent le sol en azote) et de briser les cycles de maladies spécifiques à une culture. 
                Principes clés
        Alternance des familles de plantes : On ne cultive pas les mêmes espèces ou celles de la même famille (comme les solanacées : tomates, aubergines) sur le même terrain pendant plusieurs années consécutives.
        Bénéfice des besoins différents : Certaines cultures ont besoin de beaucoup de nutriments (ex: maïs), tandis que d'autres, comme les légumineuses (haricots, pois), fixent l'azote dans le sol pour l'enrichir pour les cultures suivantes.
        Durée du cycle : Le cycle de rotation est planifié sur plusieurs années. Un cycle simple peut comporter deux ou trois cultures, alors que les cycles complexes en incluent une douzaine ou plus, avec une durée totale pouvant aller jusqu'à huit ans pour certaines rotations.
        Maintien de la structure du sol : Des cultures avec des systèmes racinaires différents peuvent aider à ameublir le sol en profondeur, améliorant sa structure. 
        Avantages
        Sol : Maintien de la fertilité, évite l'épuisement des nutriments.
        Maladies et parasites : Réduction des maladies et des ravageurs spécifiques à une culture, limitant le besoin de pesticides.
        Rendements : Optimisation de la production et augmentation des rendements à long terme.
        Diversité : Encouragement de la biodiversité et d'une alimentation plus variée. 
        Mise en œuvre pratique
        Planification : Il est nécessaire de planifier la rotation à l'avance, en tenant compte des types de cultures et de leurs besoins.
        Organisation : Un exemple typique est de diviser le potager en plusieurs sections (par exemple, quatre), et de déplacer chaque année un groupe de légumes d'une section à la suivante pour qu'aucun groupe ne revienne au même endroit avant quatre ans.
        Types de cultures : On peut classer les cultures en différentes catégories : légumineuses (haricots, pois), légumes-racines (carottes, pommes de terre), légumes-feuilles (salades, épinards), et légumes-fruits (courgettes, tomates). 
        Réussir la Rotation des Cultures dans Votre Potager en 2024 !
        16 nov. 2023 — la rotation mais qu'est-ce que ça veut dire est-ce que c'est important dans nos potagers et ben oui je vais vous expli...


        YouTube·Le jardin de Rodolphe
        17:34
        Rotation des cultures : Avantages des pratiques durables
        1 févr. 2024 — Qu'est-ce que la rotation des cultures ? Le principe de la rotation des cultures consiste à cultiver différentes plant...
        favicon
        EOS Data Analytics

        Rotations des cultures - Rodale Institute
        Qu'est-ce que la rotation des cultures? La rotation des cultures est la pratique de planter différentes cultures séquentiellement ...
        favicon
        Rodale Institute

        Tout afficher
        </p>
    
        &copy
        <!-- ✅ Pied de page -->
        <footer class="bg-green-700 text-white text-center py-4">
            <p>&copy; {{ date('Y') }} Baykat+. Tous droits réservés.</p>
        </footer>
</div>
</body>
</html>
