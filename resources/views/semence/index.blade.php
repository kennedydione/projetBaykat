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

    <div class="container py-5 text-center">
        <h1 class="mb-4 text-success fw-bold">🌱 Quelle saison souhaitez-vous planifier ?</h1>

        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <a href="{{ route('semence.saison', ['saison' => 'sèche']) }}" class="btn btn-outline-warning w-100 py-3 rounded-pill shadow">
                    🌞 Saison sèche
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('semence.saison', ['saison' => 'pluie']) }}" class="btn btn-outline-primary w-100 py-3 rounded-pill shadow">
                    🌧️ Saison des pluies
                </a>
            </div>
        </div>

        <p class="mt-4 text-muted">Vous pourrez ensuite choisir vos cultures, vos dates et visualiser votre calendrier agricole personnalisé.</p>
    </div>
  <a href="{{ url('/agriculteur/home') }}" class="btn btn-outline-success mb-4">
    ⬅️ Retour à l’accueil agriculteur
</a>
    </body>
</html>
