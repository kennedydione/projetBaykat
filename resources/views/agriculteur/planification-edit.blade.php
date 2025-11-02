<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Baykat+') }} - Éditer planification</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">✏️ Modifier la planification</h1>
        <a href="{{ route('agriculteur.calendrier') }}" class="btn btn-outline-secondary">⬅ Retour</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('agriculteur.planification.update', $planification) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Saison</label>
                        <select name="saison" class="form-select" required>
                            <option value="saison seche" {{ $planification->saison === 'saison seche' ? 'selected' : '' }}>🌞 Saison sèche</option>
                            <option value="saison des pluies" {{ $planification->saison === 'saison des pluies' ? 'selected' : '' }}>🌧️ Saison des pluies</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Superficie (ha)</label>
                        <input type="number" step="0.01" name="superficie" class="form-control" value="{{ $planification->superficie }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Cultures</label>
                        <div class="row row-cols-2 row-cols-md-3 g-2">
                            @foreach($cultures as $culture)
                                @php($checked = in_array($culture, (array)$planification->cultures))
                                <div class="col">
                                    <div class="form-check border rounded p-2">
                                        <input class="form-check-input" type="checkbox" name="cultures[]" value="{{ $culture }}" id="c-{{ $loop->index }}" {{ $checked ? 'checked' : '' }}>
                                        <label class="form-check-label" for="c-{{ $loop->index }}">{{ $culture }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Type de sol</label>
                        <input type="text" name="sol" class="form-control" value="{{ $planification->sol }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date de semis</label>
                        <input type="date" name="date_semis" class="form-control" value="{{ optional($planification->date_semis)->format('Y-m-d') }}">
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <form action="{{ route('agriculteur.planification.destroy', $planification) }}" method="POST" onsubmit="return confirm('Supprimer cette planification ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                    </form>
                    <button type="submit" class="btn btn-success px-4">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
