<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\SemenceController;
use App\Http\Controllers\AgriculteurController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\SemisController;



Route::middleware(['auth','agriculteur'])->group( function() {
    Route::prefix('agriculteur')->group(function() {
        //pour la pages guides
        Route::get('/guide', [GuideController::class, 'index'])->name('guide.index');
        //le clendrier agricole
        Route::get('/calendrier', [CalendrierController::class, 'index'])->name('agriculteur.calendrier');
        Route::get('/annonce', function () {return view('annonce');});
         //pour creer une annonce
        Route::get('/annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');
        //pour une demende annonce
        Route::post('/annonce/{id}/demande', [DemandeController::class, 'store'])->name('demande.store');
        // pour voir les demende faites par les utilisateur...
        Route::get('/admin/demandes', [DemandeController::class, 'index'])->name('demande.index');
        
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
Route::get('/lutte-maladies', [SemenceController::class, 'lutteMaladies'])->name('semence.lutte-maladies');

//pour la planification des cultures
Route::get('/planification', [AgriculteurController::class, 'planification'])
    ->name('agriculteur.planification');

Route::post('/planification', [AgriculteurController::class, 'storePlanification'])
    ->name('agriculteur.planification.store');

// Edition / suppression de planification
Route::get('/planification/{planification}/edit', [AgriculteurController::class, 'editPlanification'])
    ->name('agriculteur.planification.edit');
Route::put('/planification/{planification}', [AgriculteurController::class, 'updatePlanification'])
    ->name('agriculteur.planification.update');
Route::delete('/planification/{planification}', [AgriculteurController::class, 'destroyPlanification'])
    ->name('agriculteur.planification.destroy');


    }

    );
});
