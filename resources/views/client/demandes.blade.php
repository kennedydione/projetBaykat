<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} - Mes demandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
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
        .card-demande {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .card-demande:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
<div class="container py-4">
    <!-- Boutons de retour -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <a href="/client/home" class="btn btn-retour">
                <i class="bi bi-arrow-left-circle me-2"></i>Retour à l'accueil client
            </a>
        </div>
        <div>
            <a href="{{ route('annonce.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-megaphone me-2"></i>Retour aux annonces
            </a>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="bi bi-envelope-fill text-primary me-2"></i>Mes demandes
        </h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @forelse($demandes as $d)
        <div class="card-demande p-4 mb-3 d-flex justify-content-between align-items-start">
            <div class="flex-grow-1">
                <p class="mb-2">
                    <strong><i class="bi bi-tag-fill text-success me-2"></i>Annonce :</strong> 
                    <span class="text-primary fw-semibold">{{ $d->annonce->titre }}</span>
                </p>
                <p class="mb-2">
                    <strong><i class="bi bi-chat-left-text me-2"></i>Message :</strong> 
                    {{ $d->message }}
                </p>
                <p class="mb-2">
                    <strong><i class="bi bi-box-seam me-2"></i>Quantité :</strong> 
                    <span class="badge bg-info">{{ $d->quantite ?? '-' }}</span>
                </p>
                <p class="mb-0">
                    <strong><i class="bi bi-info-circle me-2"></i>Statut :</strong> 
                    <span class="badge {{ $d->statut === 'acceptée' ? 'bg-success' : ($d->statut === 'refusée' ? 'bg-danger' : ($d->statut === 'annulée' ? 'bg-secondary' : 'bg-warning text-dark')) }}">
                        {{ ucfirst($d->statut) }}
                    </span>
                </p>
            </div>
            <div class="ms-3">
                @if($d->statut === 'en attente')
                    <form method="POST" action="{{ route('client.demandes.annuler', $d) }}" class="mb-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-x-circle me-1"></i>Annuler
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @empty
        <div class="alert alert-info">Aucune demande pour le moment.</div>
    @endforelse
</div>
</body>
</html>
