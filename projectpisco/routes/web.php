<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\MotivoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\DetalleingresoController;
use App\Http\Controllers\InventarioController;
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
    return view('auth.login');
});

Auth::routes();
// ruta de configuracion 
Route::resource('configuraciones', ConfiguracionController::class);
// 

// ruta de las categorias del producto
Route::resource('categorias', CategoriaController::class);
// 
// ruta de las medidas del producto
Route::resource('medidas', MedidaController::class);
// 
// ruta de las marcas del producto
Route::resource('marcas', MarcaController::class);
// 
// ruta de las tipos del producto
Route::resource('tipos', TipoController::class);
// 
// ruta de las presentaciones del producto
Route::resource('presentaciones', PresentacionController::class);
// 
// ruta de las motivo del movimiento
Route::resource('motivos', MotivoController::class);
// 
// ruta del producto
Route::resource('productos', ProductoController::class);
// 
// ruta de las ingresos del movimiento
Route::resource('ingresos', IngresoController::class);
Route::get('/entrada/producto', [App\Http\Controllers\IngresoController::class, 'getProducto']);
Route::get('/entrada/medida', [App\Http\Controllers\IngresoController::class, 'getMedida']);

// 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

