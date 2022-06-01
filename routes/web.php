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
use App\Http\Controllers\DepreciacionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->names('users');
/* Route::get('users/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show'); */
/*El apartado de arriba ya se incluye en el resource */
Route::resource('activosfijo', ActivofijoController::class)->names('activosfijo');

// Factura Compra
Route::get('factura/facturacompra/index', [App\Http\Controllers\FacturaController::class, 'indexcompra'])->name('factura.facturacompra.index');
Route::post('factura/facturacompra/store', [App\Http\Controllers\FacturaController::class, 'storecompra'])->name('factura.facturacompra.store');
Route::get('factura/facturacompra/create', [App\Http\Controllers\FacturaController::class, 'createcompra'])->name('factura.facturacompra.create');
Route::get('factura/facturacompra/edit/{id}', [App\Http\Controllers\FacturaController::class, 'editcompra'])->name('factura.facturacompra.edit');
Route::post('factura/facturacompra/update/{id}', [App\Http\Controllers\FacturaController::class, 'updatecompra'])->name('factura.facturacompra.update');
Route::post('factura/facturacompra/{id}', [App\Http\Controllers\FacturaController::class, 'destroycompra'])->name('factura.facturacompra.delete');
Route::get('factura/facturacompra/show/{id}', [App\Http\Controllers\FacturaController::class, 'showcompra'])->name('factura.facturacompra.show');
Route::get('factura/facturacompra/reporte/{id}',[App\Http\Controllers\FacturaController::class,'reportec'])->name('factura.facturacompra.reporte');
// Detalle Factura
Route::post('factura/detallefactura/store', [App\Http\Controllers\DetalleFacturaController::class, 'store'])->name('detallefactura.store');
Route::delete('factura/detallefactura/destroy/{id}', [App\Http\Controllers\DetalleFacturaController::class, 'destroy'])->name('detallefactura.destroy');
// Factura Venta
Route::get('factura/facturaventa/create', [App\Http\Controllers\FacturaController::class, 'createventa'])->name('factura.facturaventa.create');
Route::get('factura/facturaventa/index', [App\Http\Controllers\FacturaController::class, 'indexventa'])->name('factura.facturaventa.index');
Route::post('factura/facturaventa/store', [App\Http\Controllers\FacturaController::class, 'storeventa'])->name('factura.facturaventa.store');
Route::get('factura/facturaventa/edit/{id}', [App\Http\Controllers\FacturaController::class, 'editventa'])->name('factura.facturaventa.edit');
Route::post('factura/facturaventa/update/{id}', [App\Http\Controllers\FacturaController::class, 'updateventa'])->name('factura.facturaventa.update');
Route::post('facuta/facturaventa/{id}', [App\Http\Controllers\FacturaController::class, 'destroyventa'])->name('factura.facturaventa.delete');
Route::get('factura/facturaventa/show/{id}', [App\Http\Controllers\FacturaController::class, 'showventa'])->name('factura.facturaventa.show');
Route::get('factura/facturaventa/reporte/{id}',[App\Http\Controllers\FacturaController::class,'reportev'])->name('factura.facturaventa.reporte');
///Categoria de activo fijos
Route::resource('categorias', CategoriaController::class)->names('categorias');
Route::resource('depreciaciones', DepreciacionController::class)->names('depreciaciones');

//NOTAS
Route::resource('notas', NotaController::class)->names('notas');
Route::resource('notasventa', NotaventaController::class)->names('notasventa');
Route::post('notasventa/edit',[NotaventaController::class,'reedit'])->name('notasventa.reedit');

Route::post('notas/detalle_update/{id}', [DetallenotaController::class, 'detalle_update']);
Route::post('notasventa/detalle_update/{id}', [DetallenotaController::class, 'detalle_update']);

Route::delete('notas/detalle_destroy/{id}', [DetallenotaController::class, 'detalle_destroy']);
Route::delete('notasventa/detalle_destroy/{id}', [DetallenotaController::class, 'detalle_destroy']);

//DEPARTAMENTOS
Route::resource('departamentos', DepartamentoController::class)->names('departamentos');

//UBICACIONES
Route::resource('ubicaciones', UbicacionController::class)->names('ubicaciones');

//REVALORIZACION
Route::resource('revalorizacion', RevalorizacionController::class)->names('revalorizacion');
Route::post('activosfijo/index',[RevalorizacionController::class,'idactivo'])->name('activosfijo.idactivo');

//MANTENIMIENTO
Route::get('mantenimientos/index', [App\Http\Controllers\MantenimientoController::class, 'index'])->name('mantenimientos.index');
Route::get('mantenimientos/create', [App\Http\Controllers\MantenimientoController::class, 'create'])->name('mantenimientos.create');
Route::post('mantenimientos/store', [App\Http\Controllers\MantenimientoController::class, 'store'])->name('mantenimientos.store');
Route::get('mantenimientos/edit/{id}', [App\Http\Controllers\MantenimientoController::class, 'edit'])->name('mantenimientos.edit');
Route::put('mantenimientos/update/{id}', [App\Http\Controllers\MantenimientoController::class, 'update'])->name('mantenimientos.update');
Route::get('mantenimientos/show/{id}', [App\Http\Controllers\MantenimientoController::class, 'show'])->name('mantenimientos.show');
Route::delete('mantenimientos/{id}', [App\Http\Controllers\MantenimientoController::class, 'destroy'])->name('mantenimientos.destroy');

// BITACORA

Route::get('bitacora/downloadTxt', [App\Http\Controllers\BitacoraController::class, 'downloadTxt'])->name('bitacora.downloadTxt');
