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


<body>
<div class="container py-5">
    <!-- Bouton de retour -->
    <div class="mb-4">
        <a href="/agriculteur/home" class="btn btn-retour">
            <i class="bi bi-arrow-left-circle me-2"></i>Retour à l'accueil agriculteur
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">🗓️ Planifier mes cultures</h1>
        <a href="{{ route('agriculteur.calendrier') }}" class="btn btn-outline-success">
            <i class="bi bi-calendar-check me-2"></i>Voir mes planifications
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('agriculteur.planification.store') }}" method="POST">
                @csrf

                <div class="row g-4">
                    <!-- Saison -->
                    <div class="col-md-6">
                        <label class="form-label">Choisir la saison</label>
                        <select name="saison" class="form-select">
                            <option value="">-- Sélectionner --</option>
                            <option value="saison seche">🌞 Saison sèche</option>
                            <option value="saison des pluies">🌧️ Saison des pluies</option>
                        </select>
                    </div>

                    <!-- Superficie -->
                    <div class="col-md-6">
                        <label class="form-label">Superficie (ha)</label>
                        <input type="number" name="superficie" step="0.01" class="form-control" placeholder="Ex: 2.5">
                    </div>

                    <!-- Cultures -->
                    <div class="col-12">
                        <label class="form-label">Choisir les cultures</label>
                        <div class="row row-cols-2 row-cols-md-3 g-2">
                            @foreach($cultures as $culture)
                                <div class="col">
                                    <div class="form-check border rounded p-2">
                                        <input class="form-check-input" type="checkbox" name="cultures[]" value="{{ $culture }}" id="c-{{ $loop->index }}">
                                        <label class="form-check-label" for="c-{{ $loop->index }}">{{ $culture }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Type de sol -->
                    <div class="col-md-6">
                        <label class="form-label">Type de sol</label>
                        <input type="text" name="sol" class="form-control" placeholder="Ex: sablonneux, argileux...">
                    </div>

                    <!-- Date de semis -->
                    <div class="col-md-6">
                        <label class="form-label">Date de semis prévue</label>
                        <input type="date" name="date_semis" class="form-control">
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success px-4">Valider ma planification</button>
                </div>
            </form>
        </div>
    </div>

</div>
</body>
</html>
