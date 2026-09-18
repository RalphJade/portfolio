<?php

use Illuminate\Support\Facades\Route;

// Default / Corporate Welcome View
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Retro Theme View
Route::get('/retro', function () {
    return view('retro');
})->name('retro');

// Solo Leveling Theme View
Route::get('/sololeveling', function () {
    return view('sololeveling');
})->name('sololeveling');
