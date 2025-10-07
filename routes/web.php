<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\SemenceController;
use App\Http\Controllers\AgriculteurController;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\IsAdmin;
use \App\Http\Middleware\Agriculteur;
use App\Http\Controllers\GuideController;
use \App\Http\Middleware\Client;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\MeteoController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\SemisController;




Route::get('/', function () {
    return view('welcome');
});
//le guide
Route::get('/guide', [GuideController::class, 'index'])->name('guide.index');

//ici j'essaiye pour voir ce que ca va donner pour les annonce
Route::get('/annonce', function () {
    return view('annonce');

});
//le clendrier agricole

Route::get('/agriculteur/calendrier', [CalendrierController::class, 'index'])
    ->name('agriculteur.calendrier');

Route::get('/annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');

Route::get('/annonce', [AnnonceController::class, 'index'])->name('annonce.index');
Route::post('/annonce', [AnnonceController::class, 'store'])->name('annonce.store');
Route::post('/annonce/{id}/demande', [DemandeController::class, 'store'])->name('demande.store');
// pour voir les demende faites par les utilisateur...
Route::get('/admin/demandes', [DemandeController::class, 'index'])->name('demande.index');
//pour modifier et suprimer une annonce
Route::get('/annonce/{id}/edit', [AnnonceController::class, 'edit'])->name('annonce.edit');
Route::put('/annonce/{id}', [AnnonceController::class, 'update'])->name('annonce.update');
Route::delete('/annonce/{id}', [AnnonceController::class, 'destroy'])->name('annonce.destroy');


//j'essai pour les semence
Route::middleware(['auth', 'role:agriculteur'])->group(function () {
//Route::get('/semence', [SemenceController::class, 'index'])->name('semence.index');
});
Route::get('/semence', [SemenceController::class, 'index'])->name('semence.index');


Route::get('/semence/{saison}', [SemenceController::class, 'showBySaison'])->name('semence.saison');
Route::post('/semence/valider', [SemenceController::class, 'valider'])->name('semence.valider');

//pour la tecnique de semi
Route::get('/semis', [SemenceController::class, 'semis'])->name('semence.semis');

Route::get('/semis/direct', [SemisController::class, 'direct'])->name('semis.direct');
Route::get('/semis/ligne', [SemisController::class, 'ligne'])->name('semis.ligne');
Route::get('/semis/pepiniere', [SemisController::class, 'pepiniere'])->name('semis.pepiniere');


//pour l'entretien des cultures
Route::get('/entretien', [SemenceController::class, 'entretien'])->name('semence.entretien');
//la lutte contre les maladies
Route::get('lutte-maladies', [SemenceController::class, 'lutteMaladies'])->name('semence.lutte-maladies');

//pour la planification des cultures
Route::get('/agriculteur/planification', [AgriculteurController::class, 'planification'])
    ->name('agriculteur.planification');

Route::post('/agriculteur/planification', [AgriculteurController::class, 'storePlanification'])
    ->name('agriculteur.planification.store');


//pour l'api méteo
Route::get('/meteo', [MeteoController::class, 'index'])->name('meteo.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/agriculteur.php';
require __DIR__.'/client.php';
