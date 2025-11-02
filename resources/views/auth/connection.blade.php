<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baykat+') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
 <style>
    .left-box {
      background: linear-gradient(rgba(0, 77, 64, 0.7), rgba(0, 77, 64, 0.7)), 
                  url("/images/b5.png") center center / cover no-repeat;
      min-height: 450px;
    }

    .form-control {
      height: 45px;
    }

    .btn-primary {
      background: #004d40;
      border: none;
      height: 45px;
    }

    .btn-primary:hover {
      background: #003b32;
    }
  </style>
 <body class="bg-light">

    <form action="{{ route('login') }}" method="POST" class="mt-2">
    @csrf
    
    <div class="container py-5">
    <div class="row justify-content-center">
        
        <div class="col-lg-8 col-md-10 col-sm-12 bg-white shadow rounded overflow-hidden">
        <div class="row">
            
            <!-- IMAGE GAUCHE -->
            <div class="col-md-6 left-box"></div>

            <!-- FORMULAIRE DROIT -->
            <div class="col-md-6 p-5">
            <h3 class="text-center mb-4">Se connecter</h3>

            <form>

                <div class="mb-3">
                <label class="form-label">Email ou Téléphone</label>
                <input type="text" class="form-control" placeholder="Entrez vos identifiants" required>
                </div>

                <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" class="form-control" placeholder="Votre mot de passe" required>
                </div>

                <button class="btn btn-primary w-100">Connexion</button>

            </form>

            <p class="text-center mt-3">
                Pas encore de compte ? <a href="/inscription">Créer un compte</a>
            </p>
            </div>

        </div>
        </div>

    </div>
    </div>

</body>
</html>
