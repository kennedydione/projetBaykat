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
<div class="container mx-auto px-4 py-6">

    <h1 class="text-2xl font-bold mb-6">Planifier mes cultures</h1>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('agriculteur.planification.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Saison -->
        <div>
            <label class="block font-semibold mb-2">Choisir la saison</label>
            <select name="saison" class="w-full border rounded p-2">
                <option value="">-- Sélectionner --</option>
                <option value="saison seche">🌞 Saison sèche</option>
                <option value="saison des pluies">🌧️ Saison des pluies</option>
            </select>
        </div>

        <!-- Cultures -->
        <div>
            <label class="block font-semibold mb-2">Choisir les cultures</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach($cultures as $culture)
                <label class="flex items-center space-x-2 border p-2 rounded">
                    <input type="checkbox" name="cultures[]" value="{{ $culture }}">
                    <span>{{ $culture }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <!-- Superficie -->
        <div>
            <label class="block font-semibold mb-2">Superficie (ha)</label>
            <input type="number" name="superficie" step="0.01" class="w-full border rounded p-2">
        </div>

        <!-- Type de sol -->
        <div>
            <label class="block font-semibold mb-2">Type de sol</label>
            <input type="text" name="sol" placeholder="Ex: sablonneux, argileux..." class="w-full border rounded p-2">
        </div>

        <!-- Date de semis -->
        <div>
            <label class="block font-semibold mb-2">Date de semis prévue</label>
            <input type="date" name="date_semis" class="w-full border rounded p-2">
        </div>

        <!-- Bouton -->
        <div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                Valider ma planification
            </button>
        </div>
    </form>
</div>
</body>
</html>
