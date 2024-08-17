<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{SupportController};

Route::get('/', function () {
    return view('welcome');
});

Route::get("/", [SupportController::class, 'index'])->name("support.index");
