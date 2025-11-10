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
    
    <h2><marquee><h2><marquee>Bienvenue 👇👇 </marquee></h2></marquee></h2>
    <body>
        
    <div class="container py-4">
        <!-- Bouton de retour -->
        <div class="mb-4">
            <a href="{{ route('semence.index') }}" class="btn btn-retour">
                <i class="bi bi-arrow-left-circle me-2"></i>Retour au choix des semences
            </a>
        </div>
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
                            @php(
                                $images = [
                                    'Riz' => 'images/riz.jpg',
                                    'Arachide' => 'images/arachide.png',
                                    'Maïs' => 'images/mais.jpg',
                                    'Mais' => 'images/mais.jpg',
                                    'Mil' => 'images/mil.jpg',
                                    'Tomate' => 'images/tomate.jpg',
                                    'Oignon' => 'images/oignon.jpg',
                                ]
                            )
                            @php($imgPath = asset($images[$semence['nom']] ?? 'images/b1.png'))
                            <img src="{{ $imgPath }}" alt="{{ $semence['nom'] }}"

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
