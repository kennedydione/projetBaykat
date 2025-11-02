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
   <h2>📩 Demandes reçues</h2>

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
            <p class="mb-1"><strong>Client :</strong> {{ $d->client->name }} (ID: {{ $d->client_id }})</p>
            <p class="mb-1"><strong>Message :</strong> {{ $d->message }}</p>
            <p class="mb-1"><strong>Quantité :</strong> {{ $d->quantite ?? '-' }}</p>
            @php($isPending = ($d->statut === 'en attente' || empty($d->statut)))
            <p class="mb-0"><strong>Statut :</strong>
                <span class="badge {{ $d->statut === 'acceptée' ? 'bg-success' : ($d->statut === 'refusée' ? 'bg-danger' : ($d->statut === 'annulée' ? 'bg-secondary' : 'bg-warning text-dark')) }}">
                    {{ ucfirst($d->statut ?? 'en attente') }}
                </span>
            </p>
        </div>
        <div>
            <form method="POST" action="{{ route('agriculteur.demandes.accepter', $d) }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-success" {{ $isPending ? '' : 'disabled' }}>Accepter</button>
            </form>
            <form method="POST" action="{{ route('agriculteur.demandes.refuser', $d) }}" class="d-inline ms-1">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger" {{ $isPending ? '' : 'disabled' }}>Refuser</button>
            </form>
        </div>
    </div>
@empty
    <p>Aucune demande pour le moment.</p>
@endforelse

    </body>
</html>
