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
</head>

<body>
 <form method="POST" action="{{ route('register') }}">
    @csrf
   <div class="container py-5">
    <div class="row justify-content-center">
        
        <div class="col-lg-8 col-md-10 col-sm-12 bg-white shadow rounded overflow-hidden">
        <div class="row">
            
            <!-- IMAGE GAUCHE -->
            <div class="col-md-6 left-box"></div>
        <!-- FORMULAIRE DROIT -->
        <div class="col-md-6 p-4">
          <h4 class="text-center mb-4">Créer un compte</h4>

          <form>

            <div class="mb-3">
              <label class="form-label">Nom complet</label>
              <input type="text" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Téléphone</label>
              <input type="text" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Mot de passe</label>
              <input type="password" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Confirmer mot de passe</label>
              <input type="password" class="form-control" required>
            </div>

            <!-- RÔLE -->
            <div class="mb-3">
              <label class="form-label">Choisissez votre rôle</label>
              <select class="form-select" required>
                <option selected disabled>-- Sélectionner --</option>
                <option value="agriculteur">Agriculteur</option>
                <option value="client">Client</option>
              </select>
            </div>

           <button class="btn btn-primary w-100">Créer un compte</button>


          </form>

          <p class="text-center mt-3">
            Déjà inscrit ? <a href="connection">Se connecter</a>
          </p>
        </div>

      </div>
    </div>

  </div>
</div>
</form>
</body>
</html>