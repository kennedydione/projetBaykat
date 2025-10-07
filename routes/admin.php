<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\AnnonceController;

Route::middleware(['auth','admin'])->group( function() {
;
});    Route::prefix('admin')->group(function() {

    //pour la pages guides


});
