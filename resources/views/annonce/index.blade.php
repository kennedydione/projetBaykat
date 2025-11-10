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
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .btn-retour {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        .btn-retour:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #495057 0%, #343a40 100%);
            color: white;
        }
    </style>
</head>

<body>
<div class="container py-4">
    <!-- Bouton de retour -->
    <div class="mb-4">
        <a href="{{ route('home') }}" class="btn btn-retour">
            <i class="bi bi-arrow-left-circle me-2"></i>Retour à l'accueil
        </a>
    </div>
    <div class="p-4 rounded-3 mb-4" style="background: linear-gradient(135deg,#e8f5e9,#ffffff);">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h1 class="h3 mb-1">📢 Toutes les annonces Baykat+</h1>
                <div class="text-muted">Découvrez les produits, services et événements publiés par la communauté.</div>
            </div>
            <div>
                <a href="{{ route('annonce.create') }}" class="btn btn-success">➕ Ajouter une annonce</a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @guest
    <div class="alert alert-info">
        Connectez-vous pour suivre vos demandes et consulter votre historique.
        <a href="{{ route('login') }}" class="alert-link">Se connecter</a>
    </div>
    @endguest

    <form method="GET" class="mb-3">
        <div class="row g-2">
            <div class="col-md-6">
                <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Rechercher une annonce...">
            </div>
            <div class="col-md-3">
                <select name="type" class="form-select" onchange="this.form.submit()">
                    <option value="">Tous les types</option>
                    <option value="produit" {{ request('type')==='produit'?'selected':'' }}>Produit</option>
                    <option value="service" {{ request('type')==='service'?'selected':'' }}>Service</option>
                    <option value="événement" {{ request('type')==='événement'?'selected':'' }}>Événement</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="sort" class="form-select" onchange="this.form.submit()">
                    <option value="recent" {{ request('sort','recent')==='recent'?'selected':'' }}>Plus récentes</option>
                    <option value="prix" {{ request('sort')==='prix'?'selected':'' }}>Prix (desc)</option>
                    <option value="poids" {{ request('sort')==='poids'?'selected':'' }}>Poids (desc)</option>
                </select>
            </div>
        </div>
    </form>

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

                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="badge bg-{{ $annonce->type == 'produit' ? 'success' : ($annonce->type == 'événement' ? 'primary' : 'info') }}">{{ ucfirst($annonce->type) }}</span>
                        <span class="badge bg-light text-dark">Publiée le {{ $annonce->created_at?->format('d/m/Y') }}</span>
                        @if($annonce->created_at && $annonce->created_at->gt(now()->subDays(7)))
                            <span class="badge bg-warning text-dark">Nouveau</span>
                        @endif
                        @if(isset($annonce->status))
                            @php($stBadge = $annonce->status==='approved'?'bg-success':($annonce->status==='rejected'?'bg-danger':'bg-secondary'))
                            <span class="badge {{ $stBadge }}">{{ ucfirst($annonce->status) }}</span>
                        @endif
                    </div>

                    @if($annonce->type == 'produit')
                    <ul class="list-unstyled">
                        <li><strong>Prix :</strong> {{ number_format($annonce->prix, 0, ',', ' ') }} FCFA</li>
                        <li><strong>Poids :</strong> {{ $annonce->poids }} kg</li>
                    </ul>
                    @endif

                    {{-- Boutons Modifier / Supprimer (restreints au propriétaire ou admin) --}}
                    @php($canManage = auth()->check() && (auth()->user()->role === 'admin' || auth()->id() === ($annonce->agriculteur_id ?? null)))
                    @if($canManage)
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('annonce.edit', $annonce->id) }}" class="btn btn-sm btn-outline-secondary">✏️ Modifier</a>

                        <form action="{{ route('annonce.destroy', $annonce->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">🗑️ Supprimer</button>
                        </form>
                    </div>
                    @endif

                    {{-- Formulaire de demande --}}
                    <h6 class="mt-4">📩 Faire une demande</h6>
                    @auth
                        <form action="{{ route('demandes.store', $annonce) }}" method="POST" class="mt-2">
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
                            <button type="submit" class="btn btn-outline-primary btn-sm w-100">Envoyer ma demande</button>
                        </form>
                    @else
                        <div class="alert alert-info mt-2">
                            Veuillez vous connecter pour envoyer une demande.
                            <div class="mt-2 d-flex gap-2">
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Se connecter</a>
                                <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm">Créer un compte</a>
                            </div>
                        </div>
                    @endauth

                    
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
    <div class="d-flex justify-content-center mt-4">
        {{ $annonces->links() }}
    </div>

</div>
</body>
</html>
