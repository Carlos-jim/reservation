<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/flights', function () {
    return 'Vuelos';
});


Route::post('/flights', function () {
    return 'Vuelos save';
});


Route::put('/flights/{id}', function () {
    return 'Vuelos update';
});

Route::delete('/flights/{id}', function () {
    return 'Vuelos delete';
});

