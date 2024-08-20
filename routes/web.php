<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{SupportController};

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [SupportController::class, 'index'])->name("supports.index");

Route::get("/support/create", [SupportController::class, 'create'])->name('supports.create');

Route::post('/supports/create', [SupportController::class, 'store'])->name('supports.store');

//as urls de rotas podem ser repetidas desde que o método HTTP seja diferente,
