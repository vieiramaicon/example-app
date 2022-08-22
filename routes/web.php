<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $nomes = ['Maicon', 'Vieira', "De Oliveira", "Josefa"];
    $idades = [31, 32, 27, 28, 30];

    return view('welcome', [
        'nomes' => $nomes,
        'idades' => $idades
    ]);
});

Route::get('/contact', function() {
    return view('/contact');
});

Route::get('/product/{id?}', function($id = null) {
    return view('/product', ['id' => $id]);
});

Route::get('/products', function() {
    $search = request('search');

    return view('/products', ['search' => $search]);
});
