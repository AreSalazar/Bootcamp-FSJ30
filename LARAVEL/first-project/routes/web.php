<?php
//Web siempre va a retornar HTML

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
