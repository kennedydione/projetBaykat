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
    <h2><marquee>Ajouter votre annonce🤣👇👇 </marquee></h2>


    @section('content')
    <div class="container py-5">
        <!-- Bouton de retour -->
        <div class="mb-4">
            <a href="{{ route('annonce.index') }}" class="btn btn-retour">
                <i class="bi bi-arrow-left-circle me-2"></i>Retour aux annonces
            </a>
        </div>
        <h2 class="mb-4">📝 Nouvelle annonce</h2>

        <form action="{{ route('annonce.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Prix (FCFA)</label>
                <input type="number" name="prix" id="prix" class="form-control">
            </div>

            <div class="mb-3">
                <label for="poids" class="form-label">Poids (kg)</label>
                <input type="number" name="poids" id="poids" class="form-control">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type d’annonce</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="produit">Produit à vendre</option>
                    <option value="événement">Événement</option>
                    <option value="projet">Projet communautaire</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">📤 Publier l’annonce</button>
        </form>
    </div>
    </body>
</html>
