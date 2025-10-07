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
    <div class="container mx-auto px-4 py-6">

        <h1 class="text-2xl font-bold mb-6">📅 Calendrier Agricole</h1>

        @if($plans->count() > 0)
        <div class="grid gap-4">
            @foreach($plans as $plan)
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-green-700">{{ implode(', ', $plan->cultures) }}</h2>
                <p><strong>Saison :</strong> {{ ucfirst($plan->saison) }}</p>
                <p><strong>Date de semis :</strong>
                    {{ $plan->date_semis ? $plan->date_semis->format('d/m/Y') : 'Non défini' }}
                </p>
                <p><strong>Superficie :</strong> {{ $plan->superficie ?? '-' }} ha</p>
                <p><strong>Type de sol :</strong> {{ $plan->sol ?? '-' }}</p>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-gray-600">Aucune planification enregistrée.</p>
        @endif

        <!-- Bouton retour -->
        <div class="mt-6">
            <a href="{{ route('agriculteur.planification') }}"
               class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                ⬅ Retour à mes planifications
            </a>
        </div>
    </div>

    </body>
</html>
