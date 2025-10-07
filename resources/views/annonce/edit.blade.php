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
    <h2><marquee><h2><marquee>Bienvenue dans les annonces plus que vous penser s'y trouve🤣👇👇 </marquee></h2></marquee></h2>

   <body>
   <div class="container py-5">
       <h2 class="mb-4">✏️ Modifier l’annonce</h2>

       <form action="{{ route('annonce.update', $annonce->id) }}" method="POST">
           @csrf
           @method('PUT')

           <div class="mb-3">
               <label for="titre" class="form-label">Titre</label>
               <input type="text" name="titre" value="{{ $annonce->titre }}" class="form-control" required>
           </div>

           <div class="mb-3">
               <label for="description" class="form-label">Description</label>
               <textarea name="description" class="form-control" rows="4" required>{{ $annonce->description }}</textarea>
           </div>

           <div class="mb-3">
               <label for="prix" class="form-label">Prix (FCFA)</label>
               <input type="number" name="prix" value="{{ $annonce->prix }}" class="form-control">
           </div>

           <div class="mb-3">
               <label for="poids" class="form-label">Poids (kg)</label>
               <input type="number" name="poids" value="{{ $annonce->poids }}" class="form-control">
           </div>

           <div class="mb-3">
               <label for="type" class="form-label">Type</label>
               <select name="type" class="form-select">
                   <option value="produit" {{ $annonce->type == 'produit' ? 'selected' : '' }}>Produit</option>
                   <option value="événement" {{ $annonce->type == 'événement' ? 'selected' : '' }}>Événement</option>
                   <option value="projet" {{ $annonce->type == 'projet' ? 'selected' : '' }}>Projet</option>
               </select>
           </div>

           <button type="submit" class="btn btn-primary">💾 Enregistrer</button>
       </form>
   </div>
    </body>
</html>
