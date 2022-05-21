<?php

use App\Http\Controllers\ActivofijoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DetallenotaController;
use App\Http\Controllers\NotaventaController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\DepreciacionController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->names('users');
Route::get('users/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::resource('activosfijo', ActivofijoController::class)->names('activosfijo');

// Factura Compra
Route::get('factura/facturacompra/index', [App\Http\Controllers\FacturaController::class, 'indexcompra'])->name('factura.facturacompra.index');
Route::post('factura/facturacompra/store', [App\Http\Controllers\FacturaController::class, 'storecompra'])->name('factura.facturacompra.store');
Route::get('factura/facturacompra/create', [App\Http\Controllers\FacturaController::class, 'createcompra'])->name('factura.facturacompra.create');
Route::get('factura/facturacompra/edit/{id}', [App\Http\Controllers\FacturaController::class, 'editcompra'])->name('factura.facturacompra.edit');
Route::post('factura/facturacompra/update/{id}', [App\Http\Controllers\FacturaController::class, 'updatecompra'])->name('factura.facturacompra.update');
Route::post('factura/facturacompra/{id}', [App\Http\Controllers\FacturaController::class, 'destroycompra'])->name('factura.facturacompra.delete');

// Detalle Factura
Route::post('factura/detallefactura/store', [App\Http\Controllers\DetalleFacturaController::class, 'store'])->name('detallefactura.store');
Route::delete('factura/detallefactura/destroy/{id}', [App\Http\Controllers\DetalleFacturaController::class, 'destroy'])->name('detallefactura.destroy');
// Factura Venta
Route::get('factura/facturaventa/create', [App\Http\Controllers\FacturaController::class, 'createventa'])->name('factura.facturaventa.create');
Route::get('factura/facturaventa/index', [App\Http\Controllers\FacturaController::class, 'indexventa'])->name('factura.facturaventa.index');
Route::post('factura/facturaventa/store', [App\Http\Controllers\FacturaController::class, 'storeventa'])->name('factura.facturaventa.store');

//Route::get('factura/facturaventa/edit/{id}', [App\Http\Controllers\UserController::class, 'editDoctor'])->name('users.doctor.edit');
//Route::post('factura/facturaventa/update/{id}', [App\Http\Controllers\UserController::class, 'updateDoctor'])->name('users.doctor.update');
//Route::post('facuta/facturaventa/{id}', [App\Http\Controllers\UserController::class, 'destroyDoctor'])->name('users.doctor.delete');

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

Route::resource('departamentos', DepartamentoController::class)->names('departamentos');
Route::resource('ubicaciones', UbicacionController::class)->names('ubicaciones');
