<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
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

Route::get('/', [EventController::class, 'index']);

Route::get('/events/create', [EventController::class, 'create']);

Route::get('/events/login', [EventController::class, 'login']);

Route::get('/events/register', [EventController::class, 'register']);

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