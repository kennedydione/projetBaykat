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
       <h2 class="text-center mb-4">🛡️ Lutte contre les maladies</h2>
       <p class="text-center text-muted mb-5">
           Protégez vos cultures grâce à des techniques efficaces et durables contre les maladies agricoles.
       </p>

       <!-- Illustration principale -->
       <div class="row justify-content-center mb-5">
           <div class="col-md-8 text-center">
               <img src="/public/images/lutte-maladies.jpg" alt="Lutte contre les maladies" class="img-fluid rounded shadow">
               <div class="mt-3 d-flex justify-content-center gap-3">
                   <span class="badge bg-danger">🦠 Agents pathogènes</span>
                   <span class="badge bg-success">🌿 Biocontrôle</span>
                   <span class="badge bg-warning text-dark">🔬 Diagnostic précoce</span>
               </div>
           </div>
       </div>

       <!-- Méthodes de lutte -->
       <div class="row g-4">
           <div class="col-md-4">
               <div class="card h-100 shadow-sm">
                   <img src="/public/images/rotation-cultures.jpg" class="card-img-top" alt="Rotation des cultures">
                   <div class="card-body text-center">
                       <h5 class="card-title">🔄 Rotation des cultures</h5>
                       <p class="card-text">Évite l’accumulation de pathogènes dans le sol en alternant les types de cultures.</p>
                   </div>
               </div>
           </div>

           <div class="col-md-4">
               <div class="card h-100 shadow-sm">
                   <img src="/public/images/variétés-résistantes.jpg" class="card-img-top" alt="Variétés résistantes">
                   <div class="card-body text-center">
                       <h5 class="card-title">🌱 Variétés résistantes</h5>
                       <p class="card-text">Utilisez des semences certifiées et adaptées à votre zone pour limiter les risques.</p>
                   </div>
               </div>
           </div>

           <div class="col-md-4">
               <div class="card h-100 shadow-sm">
                   <img src="/public/images/bio.png" class="card-img-top" alt="Biocontrôle">
                   <div class="card-body text-center">
                       <h5 class="card-title">🧬 Biocontrôle</h5>
                       <p class="card-text">Utilisez des ennemis naturels (champignons, insectes bénéfiques) pour limiter les ravageurs.</p>
                   </div>
               </div>
           </div>
       </div>

       <!-- Conseils pratiques -->
       <div class="mt-5">
           <h4>📌 Conseils pratiques</h4>
           <ul class="list-group list-group-flush">
               <li class="list-group-item">Inspectez régulièrement vos cultures pour détecter les symptômes précoces.</li>
               <li class="list-group-item">Évitez l’humidité excessive qui favorise les champignons et moisissures.</li>
               <li class="list-group-item">Nettoyez les outils et les surfaces pour éviter la propagation des agents pathogènes.</li>
               <li class="list-group-item">Utilisez des traitements naturels ou biologiques avant les produits chimiques.</li>
           </ul>
       </div>
   </div>

   </body>
</html>
