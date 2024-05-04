<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
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
    return view('login');
});
Route::get('/home',function(){return view('home');});
Route::get('/productos',function(){return view('productos');});
Route::get('/crearproducto',function(){return view('crearproducto');});


Route::post('/login', [AuthController::class, 'login']);


Route::get('/productos', [ProductController::class, 'index']);
Route::post('/productos', [ProductController::class, 'store'])->name('products.store');
Route::delete('/productos/{id}', [ProductController::class, 'destroy'])->name('productos.destroy');


// Route::get('/products', [ApiController::class, 'index']);
// Route::post('/products', [ApiController::class, 'store']);
// Route::put('/products/{id}', [ApiController::class, 'update']);
// Route::delete('/products/{id}', [ApiController::class, 'destroy']);
