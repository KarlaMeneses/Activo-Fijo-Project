<?php

use App\Http\Controllers\ActivofijoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DetallenotaController;
use App\Http\Controllers\NotaventaController;
use App\Http\Controllers\RevalorizacionController;
use App\Http\Controllers\UbicacionController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->names('users');
Route::get('users/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::resource('activosfijo', ActivofijoController::class)->names('activosfijo');

Route::get('factura/facturacompra/index', [App\Http\Controllers\FacturaController::class, 'indexcompra'])->name('factura.facturacompra.index');
Route::post('factura/facturacompra/store', [App\Http\Controllers\FacturaController::class, 'storecompra'])->name('factura.facturacompra.store');
Route::get('factura/facturacompra/create', [App\Http\Controllers\FacturaController::class, 'createcompra'])->name('factura.facturacompra.create');
Route::get('factura/facturaventa/create', [App\Http\Controllers\FacturaController::class, 'createventa'])->name('factura.facturaventa.create');

///Categoria de activo fijos
Route::resource('categorias', CategoriaController::class)->names('categorias');

//NOTAS
Route::resource('notas', NotaController::class)->names('notas');
Route::resource('notasventa', NotaventaController::class)->names('notasventa');
Route::post('notasventa/edit',[NotaventaController::class,'reedit'])->name('notasventa.reedit');

Route::post('notas/detalle_update/{id}', [DetallenotaController::class, 'detalle_update']);
Route::post('notasventa/detalle_update/{id}', [DetallenotaController::class, 'detalle_update']);

Route::delete('notas/detalle_destroy/{id}', [DetallenotaController::class, 'detalle_destroy']);
Route::delete('notasventa/detalle_destroy/{id}', [DetallenotaController::class, 'detalle_destroy']);

Route::resource('departamentos', DepartamentoController::class)->names('departamentos');
Route::resource('ubicaciones', UbicacionController::class)->names('ubicaciones');

Route::resource('revalorizacion', RevalorizacionController::class)->names('revalorizacion');
