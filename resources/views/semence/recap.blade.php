
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
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-3">
                <h2 class="mb-0">📋 Semences sélectionnées</h2>
                @php($saisonLabel = ucfirst($saison))
                @php($badgeClass = strtolower($saison) === 'pluie' || strtolower($saison) === 'saison des pluies' ? 'bg-primary' : 'bg-warning text-dark')
                <span class="badge {{ $badgeClass }}">Saison {{ $saisonLabel }}</span>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('semence.saison', ['saison' => $saison]) }}" class="btn btn-outline-secondary">🔙 Revenir à la sélection</a>
                <a href="{{ route('semence.index') }}" class="btn btn-outline-primary">🏠 Retour à l’accueil</a>
                <button onclick="window.print()" class="btn btn-success">🖨️ Imprimer</button>
            </div>
        </div>

        @php(
            $images = [
                'Riz' => 'images/riz.jpg',
                'Arachide' => 'images/arachide.png',
                'Maïs' => 'images/mais.jpg',
                'Mais' => 'images/mais.jpg',
                'Mil' => 'images/mil.jpg',
                'Tomate' => 'images/tomate.jpg',
                'Oignon' => 'images/oignon.jpg',
            ]
        )

        @php(
            $details = [
                'Riz' => [
                    'matériel' => 'Houes, semoir manuel, cordeau, bottes',
                    'densité' => '80–120 kg/ha (semis en ligne)',
                    'écartement' => '20–25 cm entre lignes, 10–15 cm sur la ligne',
                    'fertilisation' => 'NPK 15-15-15 (150–200 kg/ha) au semis, urée en couverture (100 kg/ha) au tallage',
                    'irrigation' => 'Maintien humide, éviter le stress hydrique aux phases tallage et montaison',
                    'ravageurs' => 'Pyrales, foreurs; maladies: pyriculariose; surveillance hebdomadaire',
                ],
                'Arachide' => [
                    'matériel' => 'Semoir arachide, houe, pulvérisateur',
                    'densité' => '80–100 kg/ha',
                    'écartement' => '45–50 cm entre lignes, 10–15 cm sur la ligne',
                    'fertilisation' => 'Phosphore élevé: NPK 6-20-10 (150–200 kg/ha)',
                    'irrigation' => 'Arrosage régulier à la floraison et formation des gousses',
                    'ravageurs' => 'Chenilles, thrips; maladies: cercosporiose; rotations conseillées',
                ],
                'Maïs' => [
                    'matériel' => 'Semoir maïs, houe, pulvérisateur',
                    'densité' => '18–25 kg/ha',
                    'écartement' => '75–80 cm entre lignes, 25–30 cm sur la ligne',
                    'fertilisation' => 'NPK 15-15-15 (200–250 kg/ha) + urée 100–150 kg/ha en couverture',
                    'irrigation' => 'Critique à la floraison et au remplissage des grains',
                    'ravageurs' => 'Chenille légionnaire, foreurs; traitement préventif recommandé',
                ],
                'Mil' => [
                    'matériel' => 'Semoir, houe, sarcleuse',
                    'densité' => '3–5 kg/ha',
                    'écartement' => '80–100 cm entre lignes, 30–40 cm sur la ligne',
                    'fertilisation' => 'Apport organique + NPK modéré (100–150 kg/ha)',
                    'irrigation' => 'Généralement pluvial, sécuriser démarrage et montaison',
                    'ravageurs' => 'Oiseaux, sésamies; protéger les panicules',
                ],
                'Tomate' => [
                    'matériel' => 'Pépinière, transplantoir, tuteurs, arrosoirs',
                    'densité' => '30–40 000 plants/ha',
                    'écartement' => '80–100 cm entre lignes, 40–50 cm sur la ligne',
                    'fertilisation' => 'Riche en potassium; fractionner NPK et K2O, apport calcium',
                    'irrigation' => 'Régulier sans excès, éviter stress à floraison et fructification',
                    'ravageurs' => 'Tuta absoluta, mildiou; filets et traitements alternés',
                ],
                'Oignon' => [
                    'matériel' => 'Pépinière, transplantoir, binette',
                    'densité' => '350–450 000 plants/ha',
                    'écartement' => '25–30 cm entre lignes, 8–10 cm sur la ligne',
                    'fertilisation' => 'Riche en potasse; éviter excès d’azote en fin de cycle',
                    'irrigation' => 'Fréquent au début, réduire avant la récolte pour le séchage',
                    'ravageurs' => 'Thrips, mildiou; rotations et traitements ciblés',
                ],
            ]
        )

        @if(!empty($choix))
            <div class="row g-4">
                @foreach($choix as $semence)
                    @php($imgPath = asset($images[$semence] ?? 'images/b1.png'))
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <img src="{{ $imgPath }}" alt="{{ $semence }}" class="img-fluid rounded-circle mb-3" style="width:120px;height:120px;object-fit:cover;">
                                <h5 class="card-title mb-2">{{ $semence }}</h5>
                                <p class="text-muted small mb-0">
                                    Rendement optimal si semée entre {{ $saison == 'seche' ? 'novembre et mars' : 'juin et septembre' }}
                                </p>
                                @php($d = $details[$semence] ?? null)
                                @if($d)
                                    <hr>
                                    <ul class="list-group text-start">
                                        <li class="list-group-item"><strong>Matériel:</strong> {{ $d['matériel'] }}</li>
                                        <li class="list-group-item"><strong>Densité:</strong> {{ $d['densité'] }}</li>
                                        <li class="list-group-item"><strong>Écartement:</strong> {{ $d['écartement'] }}</li>
                                        <li class="list-group-item"><strong>Fertilisation:</strong> {{ $d['fertilisation'] }}</li>
                                        <li class="list-group-item"><strong>Irrigation:</strong> {{ $d['irrigation'] }}</li>
                                        <li class="list-group-item"><strong>Ravageurs/Maladies:</strong> {{ $d['ravageurs'] }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">Aucune semence sélectionnée.</div>
        @endif

        <div class="alert alert-info mt-4">
            Pour assurer un bon rendement, respectez les cycles, distances de plantation et besoins en fertilisation.
        </div>
    </div>


    </body>
        </html>
