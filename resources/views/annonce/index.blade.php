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

    @section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">📢 Toutes les annonces Baykat+</h1>
            <a href="{{ route('annonce.create') }}" class="btn btn-success">
                ➕ Ajouter une annonce
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @forelse($annonces as $annonce)
            <div class="col">
                <div class="card h-100 shadow-sm border-{{ $annonce->type == 'produit' ? 'success' : ($annonce->type == 'événement' ? 'primary' : 'info') }}">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{-- Icône selon le type --}}
                            @if($annonce->type == 'produit')
                            🛒
                            @elseif($annonce->type == 'événement')
                            📅
                            @else
                            🌍
                            @endif
                            {{ $annonce->titre }}
                        </h5>

                        <p class="card-text">{{ $annonce->description }}</p>
                        <!--@if($annonce->prix)
                        <p><strong>Prix :</strong> {{ number_format($annonce->prix, 0, ',', ' ') }} FCFA</p>
                        @endif
                        @if($annonce->poids)
                        <p><strong>Poids :</strong> {{ $annonce->poids }} kg</p>
                        @endif
                        -->

                        {{-- Infos produit --}}
                        @if($annonce->type == 'produit')
                        <ul class="list-unstyled">
                            <li><strong>Prix :</strong> {{ number_format($annonce->prix, 0, ',', ' ') }} FCFA</li>
                            <li><strong>Poids :</strong> {{ $annonce->poids }} kg</li>
                        </ul>
                        @endif

                        {{-- Badge dynamique --}}
                        <span class="badge bg-{{ $annonce->type == 'produit' ? 'success' : ($annonce->type == 'événement' ? 'primary' : 'info') }}">
                            {{ ucfirst($annonce->type) }}
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col">
                <div class="alert alert-warning text-center">
                    Aucune annonce disponible pour le moment.
                </div>
            </div>
            @endforelse
        </div>
    </div>
    </body>
</html>
