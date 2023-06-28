<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pzn', function () {
    return "Miftah Fadilah Keren";
});

Route::redirect('/youtube', '/pzn');

Route::fallback(function () {
    return "404";
});

Route::view('/hello', 'hello', ['name' => 'Miftah Fadilah']);

Route::get('/hello-again', function () {
    return view('hello', ['name' => 'Miftah Fadilah']);
});

Route::get('/world', function () {
    return view('hello.world', ['name' => 'Gadis Syalwa Dedisyah Putri']);
});
