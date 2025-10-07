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
   <div class="container py-4">
       <h2 class="text-center mb-4">🌱 Techniques de semis</h2>

       <!-- Illustration principale -->
       <div class="row justify-content-center mb-5">
           <div class="col-md-8 text-center">
               <img src="{{ asset('images/img3.png') }}" class="card-img-top" alt="ulistration">
               <p class="mt-3">Maïs • Riz hybride • Tomates résistantes</p>
               <div class="d-flex justify-content-center gap-3 mt-2">
                   <span class="badge bg-warning text-dark">☀️ Soleil</span>
                   <span class="badge bg-info text-dark">💧 Eau</span>
               </div>
           </div>
       </div>

       <!-- Types de semis -->
       <div class="row g-4">
           <div class="col-md-4">
               <div class="card h-100 shadow-sm">
                   <img src="{{ asset('images/img.png') }}" class="card-img-top" alt="Semi direct">
                   <div class="card-body text-center">
                       <h5 class="card-title">🌾 Semi direct</h5>
                       <p class="card-text">Semis directement en terre sans préparation complexe.</p>
                       <a href="{{ route('semis.direct') }}">lire plus ici</a>
                   </div>
               </div>
           </div>

           <div class="col-md-4">
               <div class="card h-100 shadow-sm">
                   <img src="{{ asset('images/img1.png') }}" class="card-img-top" alt="Semi en ligne">

                   <div class="card-body text-center">
                       <h5 class="card-title">📏 Semi en ligne</h5>
                       <p class="card-text">Semis organisé en rangées pour faciliter l’entretien.</p>
                       <a href="{{ route('semis.ligne') }}">lire plus ici</a>
                   </div>
               </div>
           </div>

           <div class="col-md-4">
               <div class="card h-100 shadow-sm">
                   <img src="{{ asset('images/img2.png') }}" class="card-img-top" alt="Semi pepiniere">
                   <div class="card-body text-center">
                       <h5 class="card-title">🪴 Semi en pépinière</h5>
                       <p class="card-text">Semis en bac ou en pot avant transplantation.</p>
                       <a href="{{ route('semis.pepiniere') }}">lire plus ici</a>
                   </div>
               </div>
           </div>
       </div>
   </div>

   </body>
</html>
