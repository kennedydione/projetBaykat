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
    <h2><marquee><h2><marquee>Bienvenue 👇👇 </marquee></h2></marquee></h2>
    @section('content')
    <div class="container">
        <h1 class="mb-4">Guide agricole</h1>
        <div class="list-group">
            @foreach($rubriques as $rubrique)
            <a href="{{ route('guide.show', $rubrique['slug']) }}" class="list-group-item list-group-item-action">
                {{ $rubrique['titre'] }}
            </a>
            @endforeach
        </div>
    </div>
    @endsection
    </body>
</html>
