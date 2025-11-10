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

        <h2 class="text-xl font-bold mb-4 text-center">
            <marquee>Bienvenue 👇👇</marquee>
        </h2>

        <div class="container py-5">
            <!-- Bouton de retour -->
            <div class="mb-4">
                <a href="{{ route('home') }}" class="btn btn-retour">
                    <i class="bi bi-arrow-left-circle me-2"></i>Retour à l'accueil
                </a>
            </div>

            <!-- Bannière d'accueil -->
            <div class="bg-success text-white text-center py-3 rounded mb-5 shadow">
                <h2 class="fw-bold">Bienvenue sur Baykat+ 🌿</h2>
                <p class="mb-0">Consultez la météo agricole pour mieux planifier vos semis, arrosages et récoltes.</p>
            </div>

            <!-- Formulaire de recherche -->
            <form method="GET" action="{{ route('meteo.index') }}" class="d-flex justify-content-center mb-5">
                <input type="text" name="ville" value="{{ $ville }}"
                       class="form-control w-50 me-2 rounded-pill shadow-sm" placeholder="🌍 Entrez une ville (ex: Thiès)">
                <button type="submit" class="btn btn-success rounded-pill px-4">🔍 Rechercher</button>
            </form>

            <!-- Météo actuelle -->
            @if($meteo)
            <div class="bg-light p-4 rounded shadow text-center mb-5 border border-success">
                <h2 class="text-success fw-bold">{{ $meteo['name'] }}</h2>
                <p class="display-4">{{ $meteo['main']['temp'] }} °C 🌡</p>
                <p class="text-muted fst-italic">{{ ucfirst($meteo['weather'][0]['description']) }}</p>
                <div class="d-flex justify-content-around mt-3">
                    <span>💨 Vent : {{ $meteo['wind']['speed'] }} m/s</span>
                    <span>💧 Humidité : {{ $meteo['main']['humidity'] }} %</span>
                </div>
            </div>

            <!-- Conseils agricoles dynamiques -->
            @if($meteo['main']['temp'] > 30)
            <div class="alert alert-warning text-center">
                🌞 Température élevée : Pensez à arroser tôt le matin ou en fin de journée.
            </div>
            @elseif($meteo['weather'][0]['main'] === 'Rain')
            <div class="alert alert-info text-center">
                🌧️ Pluie prévue : Évitez les semis aujourd’hui, privilégiez le drainage.
            </div>
            @endif
            @endif

            <!-- Prévisions sur 5 jours -->
            @if($forecast)
            <h2 class="text-primary fw-bold mb-4">📅 Prévisions sur 5 jours</h2>

            @php
            $grouped = collect($forecast['list'])->groupBy(function($item) {
            return \Carbon\Carbon::parse($item['dt_txt'])->format('d/m');
            });
            @endphp

            @foreach($grouped as $date => $items)
            <h4 class="mt-4 text-success fw-bold">📆 {{ $date }}</h4>
            <div class="row">
                @foreach($items as $item)
                <div class="col-md-3 mb-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <p class="fw-semibold">{{ \Carbon\Carbon::parse($item['dt_txt'])->format('H:i') }}</p>
                            <p class="fs-5">{{ $item['main']['temp'] }} °C</p>
                            <p class="text-muted">{{ ucfirst($item['weather'][0]['description']) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            @else
            <p class="text-danger text-center fw-semibold">⚠ Impossible de récupérer les prévisions météo.</p>
            @endif

        </div>
        </body>
</html>
