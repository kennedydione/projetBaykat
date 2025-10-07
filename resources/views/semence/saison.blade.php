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
    <h2><marquee><h2><marquee>Bienvenue 👇👇 </marquee></h2></marquee></h2>
    <body>
    <div class="container py-4">
        <h2 class="text-center mb-4">
            🌾 Semences pour la saison {{ ucfirst($saison) }}
        </h2>

        <form method="POST" action="{{ route('semence.valider') }}">
            @csrf
            <input type="hidden" name="saison" value="{{ $saison }}">

            <div class="row g-4 justify-content-center">
                @foreach ($semences as $semence)
                <div class="col-md-4 text-center">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <img src="{{ asset('images/riz.jpg') }}" alt="Riz"

                            class="img-fluid rounded-circle mb-3"
                                 style="width: 120px; height: 120px; object-fit: cover;">
                            <h5 class="card-title">{{ $semence['nom'] }}</h5>
                            <p class="card-text">{{ $semence['description'] }}</p>
                            <p class="text-muted">Cycle : {{ $semence['cycle'] }}<br>Rendement : {{ $semence['rendement'] }} kg/ha</p>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="choix[]" value="{{ $semence['nom'] }}" id="{{ $semence['nom'] }}">
                                <label class="form-check-label" for="{{ $semence['nom'] }}">Choisir cette semence</label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success">✅ Valider ma sélection</button>
            </div>
        </form>
    </div>

    </body>
</html>
