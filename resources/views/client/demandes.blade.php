<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }} - Mes demandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📩 Mes demandes</h2>
        <a href="{{ route('annonce.index') }}" class="btn btn-outline-secondary">← Retour aux annonces</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @forelse($demandes as $d)
        <div class="p-3 border rounded mb-2 d-flex justify-content-between align-items-start">
            <div>
                <p class="mb-1"><strong>Annonce :</strong> {{ $d->annonce->titre }}</p>
                <p class="mb-1"><strong>Message :</strong> {{ $d->message }}</p>
                <p class="mb-1"><strong>Quantité :</strong> {{ $d->quantite ?? '-' }}</p>
                <p class="mb-0"><strong>Statut :</strong> 
                    <span class="badge {{ $d->statut === 'acceptée' ? 'bg-success' : ($d->statut === 'refusée' ? 'bg-danger' : ($d->statut === 'annulée' ? 'bg-secondary' : 'bg-warning text-dark')) }}">
                        {{ ucfirst($d->statut) }}
                    </span>
                </p>
            </div>
            <div>
                @if($d->statut === 'en attente')
                    <form method="POST" action="{{ route('client.demandes.annuler', $d) }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Annuler</button>
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
