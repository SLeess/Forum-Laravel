<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{SupportController};

Route::get("/supports/{id}/edit", [SupportController::class, 'edit'])->name('supports.edit');

Route::get("/", [SupportController::class, 'index'])->name("supports.index");

Route::get("/supports/create", [SupportController::class, 'create'])->name('supports.create');

Route::post('/supports/store', [SupportController::class, 'store'])->name('supports.store');

//tipo put ou patch para updates
Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');

Route::get("/supports/{id}", [SupportController::class, 'show'])->name('supports.show');
//as urls de rotas podem ser repetidas desde que o método HTTP seja diferente,

Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
