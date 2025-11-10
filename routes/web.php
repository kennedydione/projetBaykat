<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\MeteoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//pour la demande (auth requis)
Route::post('/annonces/{annonce}/demande', [DemandeController::class, 'store'])->middleware('auth')->name('demandes.store');

Route::get('/agriculteur/demandes', [DemandeController::class, 'demandesAgriculteur'])
    ->middleware(['auth', 'agriculteur'])
    ->name('agriculteur.demandes');

// Actions agriculteur sur demandes
Route::post('/agriculteur/demandes/{demande}/accepter', [DemandeController::class, 'accepter'])
    ->middleware(['auth', 'agriculteur'])
    ->name('agriculteur.demandes.accepter');
Route::post('/agriculteur/demandes/{demande}/refuser', [DemandeController::class, 'refuser'])
    ->middleware(['auth', 'agriculteur'])
    ->name('agriculteur.demandes.refuser');

Route::get('/annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');

Route::get('/client/home', function () {
    return view('home.client');
})->middleware(['auth', 'client']);

// Espace client: voir et annuler ses demandes
Route::get('/client/demandes', [DemandeController::class, 'demandesClient'])
    ->middleware(['auth', 'client'])
    ->name('client.demandes');
Route::post('/client/demandes/{demande}/annuler', [DemandeController::class, 'annulerParClient'])
    ->middleware(['auth', 'client'])
    ->name('client.demandes.annuler');

Route::get('/agriculteur/home', function () {
    return view('home.agriculteur');
})->middleware(['auth', 'agriculteur']);

// Redirection pratique: /calendrier -> /agriculteur/calendrier (évite 404 si l'URL courte est utilisée)
Route::get('/calendrier', function () {
    return redirect()->route('agriculteur.calendrier');
})->middleware(['auth', 'agriculteur'])->name('calendrier');

// Redirection pratique: /guide -> /agriculteur/guide (évite 404 si l'URL courte est utilisée)
Route::get('/guide', function () {
    return redirect()->route('guide.index');
})->middleware(['auth', 'agriculteur'])->name('guide');

// Suivi des cultures
Route::get('/suivi', function () {
    return view('suivi.index');
})->middleware(['auth', 'agriculteur'])->name('suivi.index');

Route::get('/admin/home', function () {
    return view('home.admin');
})->middleware(['auth', 'admin']);

// Admin: gestion des utilisateurs
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Redirection des fautes de frappe fréquentes
    Route::get('/demendes', function () {return redirect()->route('admin.demandes.index');});
    Route::get('/stats', [AdminUserController::class, 'stats'])->name('admin.users.stats');
    Route::get('/annonces', [AnnonceController::class, 'adminIndex'])->name('admin.annonces.index');
    Route::get('/annonces-export', [AnnonceController::class, 'adminExport'])->name('admin.annonces.export');
    Route::delete('/annonces/{annonce}', [AnnonceController::class, 'adminDestroy'])->name('admin.annonces.destroy');
    Route::get('/annonces/trash', [AnnonceController::class, 'adminTrash'])->name('admin.annonces.trash');
    Route::put('/annonces/{id}/restore', [AnnonceController::class, 'adminRestore'])->name('admin.annonces.restore');
    Route::delete('/annonces/{id}/force', [AnnonceController::class, 'adminForceDelete'])->name('admin.annonces.force');
    Route::put('/annonces/{annonce}/approve', [AnnonceController::class, 'adminApprove'])->name('admin.annonces.approve');
    Route::put('/annonces/{annonce}/reject', [AnnonceController::class, 'adminReject'])->name('admin.annonces.reject');
    // Demandes (admin)
    Route::get('/demandes', [DemandeController::class, 'adminIndex'])->name('admin.demandes.index');
    Route::put('/demandes/{demande}/accept', [DemandeController::class, 'adminAccept'])->name('admin.demandes.accept');
    Route::put('/demandes/{demande}/reject', [DemandeController::class, 'adminReject'])->name('admin.demandes.reject');
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/trash', [AdminUserController::class, 'trash'])->name('admin.users.trash');
    Route::put('/users/{user}/role', [AdminUserController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::put('/users/{user}/toggle', [AdminUserController::class, 'toggleActive'])->name('admin.users.toggleActive');
    Route::get('/users-export', [AdminUserController::class, 'exportCsv'])->name('admin.users.export');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::put('/users/{id}/restore', [AdminUserController::class, 'restore'])->name('admin.users.restore');
    Route::delete('/users/{id}/force', [AdminUserController::class, 'forceDelete'])->name('admin.users.force');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('rotation/', function () {
    return view('lutte.rotation');
})->middleware(['auth', 'agriculteur'])->name('lutte.rotation');
Route::get('resistance/', function () {
    return view('lutte.resistance');
})->middleware(['auth', 'agriculteur'])->name('lutte.resistance');
Route::get('bioc/', function () {
    return view('lutte.bioc');
})->middleware(['auth', 'agriculteur'])->name('lutte.bioc');

Route::get('binage/', function () {
    return view('entretien.binage');
})->middleware(['auth', 'agriculteur'])->name('entretien.binage');
Route::get('sarclage/', function () {
    return view('entretien.sarclage');
})->middleware(['auth', 'agriculteur'])->name('entretien.sarclage');
Route::get('irrigation/', function () {
    return view('entretien.irrigation');
})->middleware(['auth', 'agriculteur'])->name('entretien.irrigation');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/agriculteur.php';
require __DIR__ . '/client.php';
