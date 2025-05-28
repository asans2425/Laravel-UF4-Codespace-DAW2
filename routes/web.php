<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

Route::get('/', function () {
    return view('hola');
});

Route::resource('teams', TeamController::class);
