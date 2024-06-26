<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RegisterController;
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



Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login',function(){return view('login');});
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/register',function(){return view('register');});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth.token'])->group(function () {
    // Aquí van las rutas que deseas proteger con el middleware
    Route::get('/home',function(){return view('home');});
    Route::get('/productos',function(){return view('productos');});
    Route::get('/crearproducto',function(){return view('crearproducto');});
    Route::get('/proveedores',function(){return view('proveedores');});
    Route::get('/crearproveedor',function(){return view('crearproveedor');});

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

});





    // Route::get('/home',function(){return view('home');});
    // Route::get('/productos',function(){return view('productos');});
    // Route::get('/crearproducto',function(){return view('crearproducto');});
    // Route::get('/proveedores',function(){return view('proveedores');});
    // Route::get('/crearproveedor',function(){return view('crearproveedor');});



