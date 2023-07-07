<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
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
})->name('product.detail');

Route::get('/products/{id}/items/{item}', function ($produkId, $itemId) {
    return "Products : " . $produkId . " Items : " . $itemId;
})->name('product.item.detail');

Route::get('/categories/{id}', function (string $categoryId) {
    return "Categories : " . $categoryId;
})->where('id', '[0-9]+')->name('category.detail');

Route::get('users/{id?}', function (string $userId = '404') {
    return "Users : " . $userId;
})->name('user.detail');

Route::get('conflict/{name}', function ($name) {
    return "Conflict " . $name;
});

Route::get('conflict/miftah', function () {
    return "Conflict Miftah";
});

Route::get('/produk/{id}', function ($id) {
    $link = route('product.detail', [
        'id'    => $id
    ]);
    return "Link : " . $link;
});

Route::get('/produk-redirect/{id}', function ($id) {
    return redirect()->route('product.detail', [
        'id'    => $id
    ]);
});

Route::get('/controller/hello/{name}', [HelloController::class, 'hello']);
Route::get('/controller/request', [HelloController::class, 'request']);

Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);

Route::post('/input/hello/first', [InputController::class, 'helloFirst']);
Route::post('/input/hello/input', [InputController::class, 'helloInput']);
Route::post('/input/hello/array', [InputController::class, 'arrayInput']);

Route::post('/input/type', [InputController::class, 'inputType']);

Route::post('/input/filter/only', [InputController::class, 'filterOnly']);
Route::post('/input/filter/except', [InputController::class, 'filterExcept']);

Route::post('/input/filter/merge', [InputController::class, 'filterMerge']);

Route::post('/file/upload', [FileController::class, 'upload']);
