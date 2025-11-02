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
    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="text-success fw-bold mb-2">🌱 Quelle saison souhaitez-vous planifier ?</h1>
            <p class="text-muted mb-0">Choisissez une saison pour continuer la planification de vos cultures.</p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-md-4">
                <a href="{{ route('semence.saison', ['saison' => 'sèche']) }}" class="text-decoration-none">
                    <div class="card border-warning shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="display-6 mb-2">🌞</div>
                            <h5 class="card-title text-warning fw-bold">Saison sèche</h5>
                            <p class="text-muted small mb-0">Idéale pour cultures résistantes à la chaleur et à faible pluviométrie.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('semence.saison', ['saison' => 'pluie']) }}" class="text-decoration-none">
                    <div class="card border-primary shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="display-6 mb-2">🌧️</div>
                            <h5 class="card-title text-primary fw-bold">Saison des pluies</h5>
                            <p class="text-muted small mb-0">Parfaite pour cultures à cycle court avec besoin hydrique régulier.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="alert alert-info mb-3">
                    Vous pourrez ensuite sélectionner vos cultures, définir la <strong>date de semis</strong> et consulter un <strong>calendrier</strong> avec des alertes.
                </div>
                <div class="d-flex gap-2 justify-content-center">
                    <a href="{{ route('agriculteur.planification') }}" class="btn btn-outline-secondary">🗓️ Accéder à la planification</a>
                    <a href="{{ route('agriculteur.calendrier') }}" class="btn btn-outline-primary">📅 Voir mon calendrier</a>
                    <a href="{{ url('/agriculteur/home') }}" class="btn btn-outline-success">⬅️ Retour à l’accueil agriculteur</a>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
