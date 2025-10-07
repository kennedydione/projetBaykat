<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth','client'])->group( function() {
    Route::prefix('client')->group(function(){
        Route::get('/', function (){return view('welcome');});
        Route::get('/annonce', function () {return view('annonce');});
    });
});
