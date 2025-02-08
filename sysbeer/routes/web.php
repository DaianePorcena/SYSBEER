<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('app'); // Retorna a view principal do Vue.js
})->where('any', '.*');
