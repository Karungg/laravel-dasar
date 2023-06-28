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

Route::get('/products/{id}', function ($produkId) {
    return "Products : " . $produkId;
});

Route::get('/products/{id}/items/{item}', function ($produkId, $itemId) {
    return "Products : " . $produkId . " Items : " . $itemId;
});

Route::get('/categories/{id}', function (string $categoryId) {
    return "Categories : " . $categoryId;
})->where('id', '[0-9]+');

Route::get('users/{id?}', function (string $userId = '404') {
    return "Users : " . $userId;
});

Route::get('conflict/{name}', function ($name) {
    return "Conflict " . $name;
});

Route::get('conflict/miftah', function () {
    return "Conflict Miftah";
});
