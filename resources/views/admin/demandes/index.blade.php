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
    <h2><marquee><h2><marquee>Bienvenue dans les annonces plus que vous penser s'y trouve🤣👇👇 </marquee></h2></marquee></h2>

    <body>
    <div class="container py-5">
        <h2 class="mb-4">📩 Toutes les demandes reçues</h2>

        @forelse($demandes as $demande)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">🛒 {{ $demande->annonce->titre }}</h5>
                <p><strong>Nom :</strong> {{ $demande->nom }}</p>
                <p><strong>Email :</strong> {{ $demande->email }}</p>
                <p><strong>Message :</strong> {{ $demande->message }}</p>
                @if($demande->quantite)
                <p><strong>Quantité demandée :</strong> {{ $demande->quantite }} kg</p>
                @endif
                <span class="badge bg-info">Annonce ID : {{ $demande->annonce_id }}</span>
            </div>
        </div>
        @empty
        <div class="alert alert-warning text-center">
            Aucune demande reçue pour le moment.
        </div>
        @endforelse
    </div>
    </body>
</html>
