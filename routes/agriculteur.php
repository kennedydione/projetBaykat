<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth','agriculteur'])->group( function() {
    Route::prefix('agriculteur')->group(function() {
        //pour la pages guides
        Route::get('/guide', [GuideController::class, 'index'])->name('admin.guide.index');


    }

    );
});
