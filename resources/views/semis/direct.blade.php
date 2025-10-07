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

    <div class="container py-5">
        <h1 class="text-success fw-bold mb-4">🌾 Semis direct</h1>
        <p>Le semis direct consiste à planter les graines directement en terre sans préparation complexe.
            Il est adapté aux sols légers et aux cultures résistantes.
        </p>

        <ul>
            <li>✅ Gain de temps</li>
            <li>✅ Moins de travail du sol</li>
            <li>⚠️ Sensible à l’érosion si mal géré</li>
        </ul>

        <a href="{{ route('agriculteur.planification') }}" class="btn btn-outline-success mt-4">📅 Planifier avec cette méthode</a>
    </div>
    </body>
</html>
