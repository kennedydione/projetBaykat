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
   <div class="container py-5">
       <h2 class="text-center mb-4">🌿 Entretien des cultures</h2>
       <p class="text-center text-muted mb-5">
           Apprenez à maintenir vos cultures en bonne santé grâce à des techniques simples et efficaces.
       </p>

       <!-- Illustration principale -->
       <div class="row justify-content-center mb-5">
           <div class="col-md-8 text-center">
               <img src="/public/images/entretien-illustration.jpg" alt="Illustration entretien" class="img-fluid rounded shadow">
               <div class="mt-3 d-flex justify-content-center gap-3">
                   <span class="badge bg-success">🌞 Lumière</span>
                   <span class="badge bg-info">💧 Irrigation</span>
                   <span class="badge bg-warning text-dark">🧪 Fertilisation</span>
               </div>
           </div>
       </div>

       <!-- Fiches techniques -->
       <div class="row g-4">
           <div class="col-md-4">
               <div class="card h-100 shadow-sm">
                   <img src="/public/images/binage.jpg" class="card-img-top" alt="Binage">
                   <div class="card-body text-center">
                       <h5 class="card-title">🔧 Binage</h5>
                       <p class="card-text">Remue la terre pour l’aérer et faciliter l’absorption de l’eau.</p>
                   </div>
               </div>
           </div>

           <div class="col-md-4">
               <div class="card h-100 shadow-sm">
                   <img src="/public/images/sarclage.jpg" class="card-img-top" alt="Sarclage">
                   <div class="card-body text-center">
                       <h5 class="card-title">🌾 Sarclage</h5>
                       <p class="card-text">Élimine les mauvaises herbes qui concurrencent les cultures.</p>
                   </div>
               </div>
           </div>

           <div class="col-md-4">
               <div class="card h-100 shadow-sm">
                   <img src="/public/images/irrigation.jpg" class="card-img-top" alt="Irrigation">
                   <div class="card-body text-center">
                       <h5 class="card-title">💧 Irrigation</h5>
                       <p class="card-text">Apporte l’eau nécessaire selon les besoins de chaque plante.</p>
                   </div>
               </div>
           </div>
       </div>

       <!-- Conseils pratiques -->
       <div class="mt-5">
           <h4>📌 Conseils pratiques</h4>
           <ul class="list-group list-group-flush">
               <li class="list-group-item">Utilisez des filets ou clôtures pour protéger vos cultures des animaux.</li>
               <li class="list-group-item">Adoptez la rotation des cultures pour préserver la fertilité du sol.</li>
               <li class="list-group-item">Surveillez régulièrement les signes de maladies ou ravageurs.</li>
               <li class="list-group-item">Favorisez les engrais naturels et le compost pour une agriculture durable.</li>
           </ul>
       </div>
   </div>

   </body>
</html>
