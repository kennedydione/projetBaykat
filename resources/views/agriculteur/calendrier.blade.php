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
            <h1 class="mb-0">📅 Calendrier Agricole</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('agriculteur.planification') }}" class="btn btn-outline-success">Planifier une culture</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($plans->count() > 0)
            <div class="row g-3">
                @foreach($plans as $plan)
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <h5 class="card-title text-success mb-1">{{ is_array($plan->cultures) ? implode(', ', $plan->cultures) : $plan->cultures }}</h5>
                                        @php(
                                            $badgeClass = strtolower($plan->saison) === 'saison des pluies' ? 'bg-primary' : 'bg-warning text-dark'
                                        )
                                        <span class="badge {{ $badgeClass }}">{{ ucfirst($plan->saison) }}</span>
                                    </div>
                                    <div class="ms-2 d-flex gap-2">
                                        <a href="{{ route('agriculteur.planification.edit', $plan) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                                        <form action="{{ route('agriculteur.planification.destroy', $plan) }}" method="POST" onsubmit="return confirm('Supprimer cette planification ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                                @php($date = $plan->date_semis)
                                @php($today = \Carbon\Carbon::today())
                                @php($alertClass = null)
                                @php($alertText = null)
                                @if($date)
                                    @if($date->isPast() && !$date->isToday())
                                        @php($alertClass = 'alert-danger')
                                        @php($alertText = '⚠️ Semis en retard de ' . $date->diffInDays($today) . ' j')
                                    @elseif($date->isToday())
                                        @php($alertClass = 'alert-warning')
                                        @php($alertText = '⏰ Semis prévu aujourd\'hui')
                                    @elseif($today->diffInDays($date) <= 7)
                                        @php($alertClass = 'alert-warning')
                                        @php($alertText = '🔔 Semis dans ' . $today->diffInDays($date) . ' j')
                                    @endif
                                @endif

                                @if($alertClass && $alertText)
                                    <div class="alert {{ $alertClass }} py-2 px-3 mb-3">
                                        {{ $alertText }}
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <div><strong>Saison :</strong> {{ ucfirst($plan->saison) }}</div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div><strong>Date de semis :</strong> {{ $plan->date_semis ? $plan->date_semis->format('d/m/Y') : 'Non défini' }}</div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div><strong>Superficie :</strong> {{ $plan->superficie ?? '-' }} ha</div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div><strong>Type de sol :</strong> {{ $plan->sol ?? '-' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-3">
                {{ $plans->links() }}
            </div>
        @else
            <div class="alert alert-info">Aucune planification enregistrée pour le moment.</div>
            <a href="{{ route('agriculteur.planification') }}" class="btn btn-success">Commencer une planification</a>
        @endif
    </div>

    </body>
</html>
