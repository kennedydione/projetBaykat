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
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">📩 Demandes (administration)</h2>
            <a href="{{ url('/admin/home') }}" class="btn btn-outline-secondary">⬅️ Retour admin</a>
        </div>

        <form method="GET" class="mb-3">
            <div class="row g-2">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Rechercher par nom, email, message...">
                </div>
                <div class="col-md-3">
                    <select name="statut" class="form-select" onchange="this.form.submit()">
                        <option value="">Tous statuts</option>
                        <option value="en attente" {{ request('statut')==='en attente'?'selected':'' }}>En attente</option>
                        <option value="acceptée" {{ request('statut')==='acceptée'?'selected':'' }}>Acceptée</option>
                        <option value="refusée" {{ request('statut')==='refusée'?'selected':'' }}>Refusée</option>
                        <option value="annulée" {{ request('statut')==='annulée'?'selected':'' }}>Annulée</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary w-100" type="submit">Filtrer</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Annonce</th>
                        <th>Client</th>
                        <th>Quantité</th>
                        <th>Message</th>
                        <th>Statut</th>
                        <th>Reçue le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($demandes as $demande)
                    <tr>
                        <td>{{ $demande->id }}</td>
                        <td>{{ $demande->annonce->titre ?? '—' }}</td>
                        <td>
                            <div class="small">
                                {{ $demande->nom }}<br>
                                <span class="text-muted">{{ $demande->email }}</span>
                            </div>
                        </td>
                        <td>{{ $demande->quantite ?? '—' }}</td>
                        <td class="small">{{ Str::limit($demande->message, 60) }}</td>
                        <td>
                            @php($badge = match(strtolower($demande->statut ?? 'en attente')){
                                'acceptée' => 'bg-success',
                                'refusée' => 'bg-danger',
                                'annulée' => 'bg-secondary',
                                default => 'bg-warning text-dark'
                            })
                            <span class="badge {{ $badge }}">{{ ucfirst($demande->statut ?? 'en attente') }}</span>
                        </td>
                        <td>{{ $demande->created_at?->format('d/m/Y H:i') }}</td>
                        <td>
                            @php($isPending = is_null($demande->statut) || trim($demande->statut) === '' || strtolower($demande->statut) === 'en attente')
                            <div class="d-flex gap-1">
                                @if($isPending)
                                <form action="{{ route('admin.demandes.accept', $demande) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-outline-success" type="submit">Accepter</button>
                                </form>
                                <form action="{{ route('admin.demandes.reject', $demande) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-outline-warning" type="submit">Refuser</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Aucune demande trouvée.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $demandes->links() }}
        </div>
    </div>
    </body>
</html>
