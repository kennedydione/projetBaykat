<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Baykat+') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!--lien de boostrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
   <body>
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
   <div class="container py-5">
       <h2 class="text-center mb-4">🛡️ Lutte contre les maladies</h2>
       <p class="text-center text-muted mb-5">
           Protégez vos cultures grâce à des techniques efficaces et durables contre les maladies agricoles.
       </p>

       <!-- Illustration principale -->
       <div class="row justify-content-center mb-5">
           <div class="col-md-8 text-center">
               <img src="{{ asset('images/lutte.png') }}" alt="Lutte contre les maladies" class="img-fluid rounded shadow">
               <div class="mt-3 d-flex justify-content-center gap-3">
                   <span class="badge bg-danger">🦠 Agents pathogènes</span>
                   <span class="badge bg-success">🌿 Biocontrôle</span>
                   <span class="badge bg-warning text-dark">🔬 Diagnostic précoce</span>
               </div>
           </div>
       </div>

       <!-- Méthodes de lutte -->
       <div class="row g-4">
           <div class="col-md-4">
               <div class="card h-100 shadow-sm">
                   <img src="{{ asset('images/rotation.png') }}" class="card-img-top" alt="Rotation des cultures">
                   <div class="card-body text-center">
                       <h5 class="card-title">🔄 Rotation des cultures</h5>
                       <p class="card-text">Évite l’accumulation de pathogènes dans le sol en alternant les types de cultures.</p>
                   </div>
                    <a href="{{ route('lutte.rotation') }}">lire plus ici</a>
               </div>
           </div>

           <div class="col-md-4">
               <div class="card h-100 shadow-sm">
                   <img src="{{ asset('images/res.png') }}" class="card-img-top" alt="Variétés résistantes">
                   <div class="card-body text-center">
                       <h5 class="card-title">🌱 Variétés résistantes</h5>
                       <p class="card-text">Utilisez des semences certifiées et adaptées à votre zone pour limiter les risques.</p>
                   </div>
                    <a href="{{ route('lutte.resistance') }}">lire plus ici</a>
               </div>
           </div>

           <div class="col-md-4">
               <div class="card h-100 shadow-sm">
                   <img src="{{ asset('images/bioc.png') }}" class="card-img-top" alt="Biocontrôle">
                   <div class="card-body text-center">
                       <h5 class="card-title">🧬 Biocontrôle</h5>
                       <p class="card-text">Utilisez des ennemis naturels (champignons, insectes bénéfiques) pour limiter les ravageurs.</p>
                   </div>
                    <a href="{{ route('lutte.bioc') }}">lire plus ici</a>
               </div>
           </div>
       </div>

       <!-- Conseils pratiques -->
       <div class="mt-5">
           <h4>📌 Conseils pratiques</h4>
           <ul class="list-group list-group-flush">
               <li class="list-group-item">Inspectez régulièrement vos cultures pour détecter les symptômes précoces.</li>
               <li class="list-group-item">Évitez l’humidité excessive qui favorise les champignons et moisissures.</li>
               <li class="list-group-item">Nettoyez les outils et les surfaces pour éviter la propagation des agents pathogènes.</li>
               <li class="list-group-item">Utilisez des traitements naturels ou biologiques avant les produits chimiques.</li>
           </ul>
       </div>
   </div>
    <a href="{{ url('/agriculteur/home') }}" class="btn btn-outline-success mb-4">
    ⬅️ Retour à l’accueil agriculteur
</a>

   </body>
</html>
