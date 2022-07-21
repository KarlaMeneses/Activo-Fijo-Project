<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ActivofijoController;
use App\Http\Controllers\AyudaController;
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
use App\Exports\UserExport;
use App\Http\Controllers\PostNotificationController;
use App\Http\Controllers\ResponsableController;
use App\Models\Responsable;
use Maatwebsite\Excel\Facades\Excel;

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

// $user = User::find(auth()->user()->id);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->names('users');
Route::get('user/perfil/', [userController::class, 'show2'])->name('user.show');
Route::patch('user/update/', [userController::class, 'update2'])->name('user.update');

Route::post('users/reporte', [App\Http\Controllers\UserController::class, 'reporte'])->name('users.reporte');
Route::get('/export', [App\Http\Controllers\UserController::class, 'export'])->name('users.export');

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
Route::get('factura/facturacompra/reporte/{id}', [App\Http\Controllers\FacturaController::class, 'reportec'])->name('factura.facturacompra.reporte');
Route::get('factura/facturacompra/{id}', [App\Http\Controllers\FacturaController::class, 'reportechtml'])->name('factura.facturacompra.reportehmtl');

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
Route::get('factura/facturaventa/reporte/{id}', [App\Http\Controllers\FacturaController::class, 'reportev'])->name('factura.facturaventa.reporte');
Route::get('factura/facturaventa/index/{id}', [App\Http\Controllers\FacturaController::class, 'reportevhtml'])->name('factura.facturaventa.reportehtml');

///Categoria de activo fijos
Route::resource('categorias', CategoriaController::class)->names('categorias');

//NOTAS
Route::resource('notas', NotaController::class)->names('notas');
Route::get('notas/reporte/{id}', [App\Http\Controllers\NotaController::class, 'reporte'])->name('notas.reporte');
Route::get('nota/{id}', [App\Http\Controllers\NotaController::class, 'reportehtml'])->name('notas.reportehtml');
Route::resource('notasventa', NotaventaController::class)->names('notasventa');
Route::post('notasventa/edit', [NotaventaController::class, 'reedit'])->name('notasventa.reedit');
Route::get('notasventa/reporte/{id}', [App\Http\Controllers\NotaventaController::class, 'reporte'])->name('notasventa.reporte');
Route::get('notasventa/index/{id}', [App\Http\Controllers\NotaventaController::class, 'reportehtml'])->name('notasventa.reportehtml');
Route::post('notas/detalle_update/{id}', [DetallenotaController::class, 'detalle_update']);
Route::post('notasventa/detalle_update/{id}', [DetallenotaController::class, 'detalle_update']);

Route::delete('notas/detalle_destroy/{id}', [DetallenotaController::class, 'detalle_destroy']);
Route::delete('notasventa/detalle_destroy/{id}', [DetallenotaController::class, 'detalle_destroy']);
Route::resource('notas', NotaController::class)->names('notas');

//DEPARTAMENTOS
Route::resource('departamentos', DepartamentoController::class)->names('departamentos');

//AYUDA
Route::resource('ayudas', AyudaController::class)->names('ayudas');

//UBICACIONES
Route::resource('ubicaciones', UbicacionController::class)->names('ubicaciones');
//RESPONSABLE
Route::resource('responsables', ResponsableController::class)->names('responsables');

//NOTIFICATION
//Route::get('mantenimientos/index', [PostNotificationController::class, 'sendOfferNotification']);

//REVALORIZACION
Route::resource('revalorizacion', RevalorizacionController::class)->names('revalorizacion');
Route::post('activosfijo/index', [RevalorizacionController::class, 'idactivo'])->name('activosfijo.idactivo');
Route::post('revalorizacion/show', [RevalorizacionController::class, 'aprobado'])->name('revalorizacion.aprobado');
Route::post('activosfijo/reportedina', [App\Http\Controllers\ActivofijoController::class, 'reportedina'])->name('activosfijo.reportedina');




//Route::post('activosfijo/{id}', [ActivofijoController::class, 'calcular'])->name('activosfijo.calcular');
//Route::get('activosfijo.{id}', [ActivofijoController::class, 'calcular'])->name('activosfijo.calcular');
Route::get('activosfijo/show/{id}', [ActivofijoController::class, 'calcular'])->name('activosfijo.calcular');
Route::post('activosfijo/reporte/{id}', [App\Http\Controllers\ActivofijoController::class, 'reporte'])->name('activosfijo.reporte');
//MANTENIMIENTO
Route::get('mantenimientos/index', [App\Http\Controllers\MantenimientoController::class, 'index'])->name('mantenimientos.index');
Route::get('mantenimientos/create', [App\Http\Controllers\MantenimientoController::class, 'create'])->name('mantenimientos.create');
Route::post('mantenimientos/store', [App\Http\Controllers\MantenimientoController::class, 'store'])->name('mantenimientos.store');
Route::get('mantenimientos/edit/{id}', [App\Http\Controllers\MantenimientoController::class, 'edit'])->name('mantenimientos.edit');
Route::put('mantenimientos/update/{id}', [App\Http\Controllers\MantenimientoController::class, 'update'])->name('mantenimientos.update');
Route::get('mantenimientos/show/{id}', [App\Http\Controllers\MantenimientoController::class, 'show'])->name('mantenimientos.show');
Route::delete('mantenimientos/{id}', [App\Http\Controllers\MantenimientoController::class, 'destroy'])->name('mantenimientos.destroy');
Route::get('mantenimiento/reporte_vista', [App\Http\Controllers\MantenimientoController::class, 'reporte_vista'])->name('mantenimiento.reporte_vista');

Route::post('mantenimiento/reporte', [App\Http\Controllers\MantenimientoController::class, 'reporte'])->name('mantenimiento.reporte');

// BITACORA
Route::resource('Bitacora', BitacoraController::class)->names('Bitacora');
Route::get('bitacora/auth', [App\Http\Controllers\BitacoraController::class, 'auth'])->name('bitacora.auth');
Route::post('bitacora/downloadTxt', [App\Http\Controllers\BitacoraController::class, 'downloadTxt'])->name('bitacora.downloadTxt');


// BAJA

Route::get('baja/index', [App\Http\Controllers\BajaController::class, 'index'])->name('baja.index');
Route::post('baja/store', [App\Http\Controllers\BajaController::class, 'store'])->name('baja.store');
Route::get('baja/create', [App\Http\Controllers\BajaController::class, 'create'])->name('baja.create');
Route::get('baja/edit/{id}', [App\Http\Controllers\BajaController::class, 'edit'])->name('baja.edit');
Route::post('baja/update/{id}', [App\Http\Controllers\BajaController::class, 'update'])->name('baja.update');
Route::post('baja/{id}', [App\Http\Controllers\BajaController::class, 'destroy'])->name('baja.delete');
Route::get('baja/reporte/{id}', [App\Http\Controllers\BajaController::class, 'reporte'])->name('baja.reporte');



// EMPRESA

Route::get('empresa/index', [App\Http\Controllers\EmpresaController::class, 'index'])->name('empresa.index');
Route::post('empresa/store', [App\Http\Controllers\EmpresaController::class, 'store'])->name('empresa.store');
Route::get('empresa/create', [App\Http\Controllers\EmpresaController::class, 'create'])->name('empresa.create');
Route::get('empresa/edit', [App\Http\Controllers\EmpresaController::class, 'edit'])->name('empresa.edit');
Route::put('empresa/update', [App\Http\Controllers\EmpresaController::class, 'update'])->name('empresa.update');
Route::post('empresa/delete/{id}', [App\Http\Controllers\EmpresaController::class, 'destroy'])->name('empresa.delete');
Route::get('empresa/show/{id}', [App\Http\Controllers\EmpresaController::class, 'show'])->name('empresa.show');
Route::post('empresa/reporte', [App\Http\Controllers\EmpresaController::class, 'reporte'])->name('empresa.reporte');


// SOLICITUD
Route::get('solicitud/index', [App\Http\Controllers\SolicitudController::class, 'index'])->name('solicitud.index');
Route::get('solicitud/create', [App\Http\Controllers\SolicitudController::class, 'create'])->name('solicitud.create');
Route::post('solicitud/store', [App\Http\Controllers\SolicitudController::class, 'store'])->name('solicitud.store');
Route::post('solicitud/store_act/{id}', [App\Http\Controllers\SolicitudController::class, 'store_act'])->name('solicitud.store_act');
Route::get('solicitud/edit/{id}', [App\Http\Controllers\SolicitudController::class, 'edit'])->name('solicitud.edit');
Route::put('solicitud/update/{id}', [App\Http\Controllers\SolicitudController::class, 'update'])->name('solicitud.update');
Route::get('solicitud/show/{id}', [App\Http\Controllers\SolicitudController::class, 'show'])->name('solicitud.show');
Route::delete('solicitud/{id}', [App\Http\Controllers\SolicitudController::class, 'destroy'])->name('solicitud.destroy');
Route::delete('solicitud_act/{id}', [App\Http\Controllers\SolicitudController::class, 'destroy_act'])->name('solicitud.destroy_act');
/* Route::get('solicitud/activo', [App\Http\Controllers\SolicitudController::class, 'reporte_vista'])->name('solicitud.activo'); */


//TRASPASO
Route::get('traspasos/index', [App\Http\Controllers\TraspasoController::class, 'index'])->name('traspasos.index');
Route::get('traspasos/create', [App\Http\Controllers\TraspasoController::class, 'create'])->name('traspasos.create');
Route::post('traspasos/store', [App\Http\Controllers\TraspasoController::class, 'store'])->name('traspasos.store');
Route::get('traspasos/edit/{id}', [App\Http\Controllers\TraspasoController::class, 'edit'])->name('traspasos.edit');
Route::put('traspasos/update/{id}', [App\Http\Controllers\TraspasoController::class, 'update'])->name('traspasos.update');
/* Route::get('traspasos/show/{id}', [App\Http\Controllers\TraspasoController::class, 'show'])->name('traspasos.show'); */
Route::delete('traspasos/{id}', [App\Http\Controllers\TraspasoController::class, 'destroy'])->name('traspasos.destroy');


