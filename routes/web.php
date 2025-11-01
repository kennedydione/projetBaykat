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




Route::get('a/', function () {
    return view('welcome');
    });
Route::get('/', function () {
    return view('welcomes');
})->name('home');


//ici j'essaiye pour voir ce que ca va donner pour les annonce
Route::get('/annonce', function () {
    return view('annonce');

});


Route::get('/annonce', [AnnonceController::class, 'index'])->name('annonce.index');
Route::post('/annonce', [AnnonceController::class, 'store'])->name('annonce.store');

// pour voir les demende faites par les utilisateur...
Route::get('/admin/demandes', [DemandeController::class, 'index'])->name('demande.index');



//j'essai pour les semence
Route::middleware(['auth', 'role:agriculteur'])->group(function () {
//Route::get('/semence', [SemenceController::class, 'index'])->name('semence.index');
});
//pour l'api méteo
Route::get('/meteo', [MeteoController::class, 'index'])->name('meteo.index');

//pour la demende
Route::post('/demande', [DemandeController::class, 'store'])->name('/agriculteur.demandes');

Route::get('/agriculteur/demandes', function () {
    return view('agriculteur.demandes');
})->middleware(['auth', 'agriculteur']);

use App\Models\Demande;

Route::get('/agriculteur/demandes', function () {
    $demandes = Demande::where('destinataire_role', 'agriculteur')->get();
    return view('agriculteur.demandes', compact('demandes'));
});

     Route::get('/annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');


Route::get('/client/home', function () {
    return view('home.client');
})->middleware(['auth', 'client']);

Route::get('/agriculteur/home', function () {
    return view('home.agriculteur');
})->middleware(['auth', 'agriculteur']);

Route::get('/admin/home', function () {
    return view('home.admin');
})->middleware(['auth', 'admin']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('rotation/', function () {
    return view('lutte.rotation');
    });
Route::get('resistance/', function () {
    return view('lutte.resistance');
    });
Route::get('bioc/', function () {
    return view('lutte.bioc');
    });

    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/agriculteur.php';
require __DIR__.'/client.php';
