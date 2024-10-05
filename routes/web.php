<?php

use App\Enums\SupportStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\Api\SupportAPIController;
use App\Http\Controllers\ProfileController;

//  Route::resource('/supports', SupportController::class]);
Route::get("/", [SupportController::class, 'index'])->name("supports.index");

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get("/supports/{id}/edit", [SupportController::class, 'edit'])->name('supports.edit');


    // Route::get("/home", function(){
    //     return view('welcome');
    // });

    Route::get("/supports/create", [SupportController::class, 'create'])->name('supports.create');

    Route::post('/supports/store', [SupportController::class, 'store'])->name('supports.store');

    //tipo put ou patch para updates
    Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');

    Route::get("/supports/{id}", [SupportController::class, 'show'])->name('supports.show');
    //as urls de rotas podem ser repetidas desde que o método HTTP seja diferente,

    Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');


    // Route::get('/me', [AuthController::class, 'me']);
});

/*
 *-----------API-----------------
 */

 Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
