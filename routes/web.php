<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\SemenceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//ici j'essaiye pour voir ce que ca va donner pour les annonce
Route::get('/annonce', function () {
    return view('annonce');
});
Route::get('/annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');
Route::get('/annonce', [AnnonceController::class, 'index'])->name('annonce.index');
Route::get('/annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');
Route::post('/annonce', [AnnonceController::class, 'store'])->name('annonce.store');

//j'essai pour les semence
Route::middleware(['auth', 'role:agriculteur'])->group(function () {
//Route::get('/semence', [SemenceController::class, 'index'])->name('semence.index');
});
Route::get('/semence', [SemenceController::class, 'index'])->name('semence.index');

Route::get('/semence/{saison}', [SemenceController::class, 'showBySaison'])->name('semence.saison');
Route::post('/semence/valider', [SemenceController::class, 'valider'])->name('semence.valider');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
