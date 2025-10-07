<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container py-5">
    <h2 class="mb-4 text-center">
        <marquee>📢 Bienvenue dans les annonces Baykat+ — ce que vous cherchez est sûrement ici 🤣👇👇</marquee>
    </h2>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">📢 Toutes les annonces Baykat+</h1>
        <a href="{{ route('annonce.create') }}" class="btn btn-success">➕ Ajouter une annonce</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @forelse($annonces as $annonce)
        <div class="col">
            <div class="card h-100 shadow-sm border-{{ $annonce->type == 'produit' ? 'success' : ($annonce->type == 'événement' ? 'primary' : 'info') }}">
                <div class="card-body">
                    <h5 class="card-title">
                        @if($annonce->type == 'produit') 🛒
                        @elseif($annonce->type == 'événement') 📅
                        @else 🌍 @endif
                        {{ $annonce->titre }}
                    </h5>

                    <p class="card-text">{{ $annonce->description }}</p>

                    @if($annonce->type == 'produit')
                    <ul class="list-unstyled">
                        <li><strong>Prix :</strong> {{ number_format($annonce->prix, 0, ',', ' ') }} FCFA</li>
                        <li><strong>Poids :</strong> {{ $annonce->poids }} kg</li>
                    </ul>
                    @endif

                    <span class="badge bg-{{ $annonce->type == 'produit' ? 'success' : ($annonce->type == 'événement' ? 'primary' : 'info') }}">
                            {{ ucfirst($annonce->type) }}
                        </span>

                    {{-- Boutons Modifier / Supprimer --}}
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('annonce.edit', $annonce->id) }}" class="btn btn-sm btn-outline-secondary">✏️ Modifier</a>

                        <form action="{{ route('annonce.destroy', $annonce->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">🗑️ Supprimer</button>
                        </form>
                    </div>

                    {{-- Formulaire de demande --}}
                    <form action="{{ route('demande.store', $annonce->id) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-2">
                            <input type="text" name="nom" class="form-control" placeholder="Votre nom" required>
                        </div>
                        <div class="mb-2">
                            <input type="email" name="email" class="form-control" placeholder="Votre email" required>
                        </div>
                        <div class="mb-2">
                            <textarea name="message" class="form-control" rows="2" placeholder="Votre message" required></textarea>
                        </div>
                        @if($annonce->type === 'produit')
                        <div class="mb-2">
                            <input type="number" name="quantite" class="form-control" placeholder="Quantité demandée (kg)">
                        </div>
                        @endif
                        <button type="submit" class="btn btn-outline-primary btn-sm">📩 Faire une demande</button>
                    </form>
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
