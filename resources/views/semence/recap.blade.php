
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
        <h2 class="mb-4">📋 Semences sélectionnées pour la saison {{ ucfirst($saison) }}</h2>

        <ul class="list-group">
            @foreach($choix as $semence)
            <li class="list-group-item">
                <strong>{{ $semence }}</strong> — Rendement optimal si semée entre {{ $saison == 'seche' ? 'novembre et mars' : 'juin et septembre' }}
            </li>
            @endforeach
        </ul>

        <div class="alert alert-info mt-4">
            Pour assurer un bon rendement, veillez à respecter les cycles, les distances de plantation et les besoins en fertilisation.
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-between">
        <a href="{{ route('semence.saison', ['saison' => $saison]) }}" class="btn btn-outline-secondary">
            🔙 Revenir à la sélection
        </a>

        <a href="{{ route('semence.index') }}" class="btn btn-outline-primary">
            🏠 Retour à l’accueil
        </a>
    </div>


    </body>
</html>
