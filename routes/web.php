<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
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
Route::get('/proveedores',function(){return view('proveedores');});
Route::get('/crearproveedor',function(){return view('crearproveedor');});



Route::post('/login', [AuthController::class, 'login']);


Route::get('/productos', [ProductController::class, 'index']);
Route::post('/productos', [ProductController::class, 'store'])->name('products.store');
Route::delete('/productos/{id}', [ProductController::class, 'destroy'])->name('productos.destroy');
Route::get('/productos/{id}/editar', [ProductController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductController::class, 'update'])->name('productos.update');


Route::get('/proveedores', [ProviderController::class, 'index']);
Route::post('/proveedores', [ProviderController::class, 'store'])->name('provider.store');
Route::delete('/proveedores/{id}', [ProviderController::class, 'destroy'])->name('provider.destroy');
Route::get('/proveedores/{id}/edit', [ProviderController::class, 'edit'])->name('providers.edit');
Route::put('/providers/{id}', [ProviderController::class, 'update'])->name('providers.update');
