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
        La résistance des cultures fait référence à la capacité des plantes à résister aux maladies, aux ravageurs et aux mauvaises herbes, et est assurée par des méthodes telles que la sélection de variétés génétiquement résistantes et des pratiques agricoles de lutte intégrée. La résistance aux produits phytosanitaires est un problème majeur causé par leur utilisation intensive, il est donc crucial de mettre en œuvre des stratégies de gestion de la résistance à long terme pour préserver l'efficacité des solutions de protection des cultures. 
        Méthodes pour améliorer la résistance des cultures
        Résistance génétique des variétés : Développer des variétés de cultures naturellement résistantes aux maladies et aux ravageurs est un atout majeur. Cependant, les pathogènes peuvent s'adapter, ce qui rend nécessaire une recherche constante pour développer de nouvelles variétés résistantes.
        Lutte intégrée contre les ravageurs : Cette approche combine différentes méthodes pour réduire l'impact des ravageurs et des maladies, notamment l'utilisation de produits phytosanitaires, d'outils mécaniques et de pratiques culturales.
        Rotation des cultures : Faire alterner différentes cultures sur une même parcelle aide à briser le cycle de vie des ravageurs, des mauvaises herbes et des maladies qui s'installent et se spécialisent dans une culture spécifique.
        Méthodes de travail du sol : Des techniques comme le hersage, le roulage et l'arrachage peuvent être utilisées pour lutter contre les mauvaises herbes, en fonction de la parcelle et des adventices visées.
        Utilisation raisonnée des herbicides : Pour éviter la résistance des adventices aux herbicides, il est essentiel de raisonner leur utilisation en combinant différentes stratégies et en surveillant le développement d'espèces résistantes. 
        Importance de la gestion de la résistance
        Prévention : Il est crucial d'adopter des stratégies de prévention pour retarder l'apparition de résistances, afin de garantir l'efficacité à long terme des solutions de protection des cultures.
        Stratégies concertées : La gestion de la résistance nécessite une approche concertée de tous les acteurs de la filière agricole, de la recherche à la production.
        Pression réglementaire : Les réglementations concernant les produits phytosanitaires peuvent freiner le renouvellement des solutions disponibles, renforçant l'importance de la gestion des résistances. 
        </p>
    
        &copy
        <!-- ✅ Pied de page -->
        <footer class="bg-green-700 text-white text-center py-4">
            <p>&copy; {{ date('Y') }} Baykat+. Tous droits réservés.</p>
        </footer>
</div>
</body>
</html>
