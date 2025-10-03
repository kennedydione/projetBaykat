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




        <h2 class="text-xl font-bold mb-4 text-center">
            <marquee>Bienvenue 👇👇</marquee>
        </h2>

        <h1 class="position-relative py-2 px-4 text-bg-secondary border border-secondary rounded-pill">
            Guide Agricole</h1>

        <div class="container py-4">
            <div class="row g-3 justify-content-center">

                <!-- Bouton 1 -->
                <div class="col-10 col-md-5">
                    <a href="/semence" class="text-decoration-none">
                        <div class="p-4 bg-light rounded-4 shadow-sm text-center border border-success">
                            <h5 class="mb-2">🌱 Choix des semences</h5>
                            <hr>
                        </div>
                    </a>
                </div>

                <!-- Bouton 2 -->
                <div class="col-10 col-md-5">
                    <a href="/techniques" class="text-decoration-none">
                        <div class="p-4 bg-light rounded-4 shadow-sm text-center border border-primary">
                            <h5 class="mb-2">🧪 Techniques de semis</h5>
                            <hr>
                        </div>
                    </a>
                </div>

                <!-- Bouton 3 -->
                <div class="col-10 col-md-5">
                    <a href="/entretien" class="text-decoration-none">
                        <div class="p-4 bg-light rounded-4 shadow-sm text-center border border-warning">
                            <h5 class="mb-2">🌿 Entretien des cultures</h5>
                            <hr>
                        </div>
                    </a>
                </div>

                <!-- Bouton 4 -->
                <div class="col-10 col-md-5">
                    <a href="/maladies" class="text-decoration-none">
                        <div class="p-4 bg-light rounded-4 shadow-sm text-center border border-danger">
                            <h5 class="mb-2">🛡️ Lutte contre les maladies</h5>
                            <hr>
                        </div>
                    </a>
                </div>

            </div>
        </div>

        </body>
</html>
