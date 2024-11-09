<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/products', [ProductController::class,'allProduct']);
Route::get('/products/create', [ProductController::class,'productForm']);
Route::post('/products', [ProductController::class, 'storeProduct']);
Route::get('/products/{id}', [ProductController::class, 'showProduct']);
Route::put('/products/{id}', [ProductController::class, 'updateProduct']);
Route::get('/products/{id}/edit', [ProductController::class, 'editProduct']);
Route::delete('/products/{id}', [ProductController::class, 'deleteProduct']);
