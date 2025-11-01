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

@forelse($demandes as $d)
    <div class="p-3 border rounded mb-2">
        <p><strong>Annonce :</strong> {{ $d->annonce->titre }}</p>
        <p><strong>Client :</strong> {{ $d->client->name }} (ID: {{ $d->client_id }})</p>
        <p><strong>Message :</strong> {{ $d->message }}</p>
        <p><strong>Quantité :</strong> {{ $d->quantite }}</p>
        <p><strong>Statut :</strong> {{ $d->statut }}</p>
    </div>
@empty
    <p>Aucune demande pour le moment.</p>
@endforelse

    </body>
</html>
