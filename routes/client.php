<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\DemandeController;


Route::middleware(['auth','client'])->group( function() {
    Route::prefix('client')->group(function(){
        Route::get('/', function (){return view('welcome');});
        Route::get('/annonce', function () {return view('annonce');});
              //pour creer une annonce
        //Route::get('/annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');
        //pour une demende annonce
        Route::post('/annonce/{id}/demande', [DemandeController::class, 'store'])->name('demande.store');
    });
});
