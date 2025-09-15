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

    @section('content')
    <div class="container py-5">
        <h2 class="mb-4">🌾 Semences pour la saison {{ ucfirst($saison) }}</h2>

        <form action="{{ route('semence.valider') }}" method="POST">
            @csrf
            <input type="hidden" name="saison" value="{{ $saison }}">

            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($semences as $semence)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $semence['nom'] }}</h5>
                            <p class="card-text">{{ $semence['description'] }}</p>
                            <ul class="list-unstyled">
                                <li><strong>Cycle :</strong> {{ $semence['cycle'] }}</li>
                                <li><strong>Rendement :</strong> {{ $semence['rendement'] }} kg/ha</li>
                            </ul>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="choix[]" value="{{ $semence['nom'] }}">
                                <label class="form-check-label">Choisir cette semence</label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-success">✅ Valider ma sélection</button>
            </div>
        </form>
    </div>
    </body>
</html>
