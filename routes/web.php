<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BibliotecaDocumentosController;
use App\Http\Controllers\CorteController;
use App\Http\Controllers\FrigorificoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InspeccionController;
use App\Http\Controllers\RecepcionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ListadoDocumentosController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//////USUARIOS////////
Route::match(['get','post'],'/usuarios/listado', [UsuariosController::class, 'usuarios_list'])->name('listUsuarios');
Route::get('/usuarios/edit/{id}', [UsuariosController::class, 'usuario_edit'])->name('editUsuario');
Route::patch('/usuarios/edit/guardar/{id}', [UsuariosController::class, 'guardar_usuario'])->name('guardarEditUsuario');


//////PRODUCTOS////////
Route::match(['get','post'],'/productos/listado', [ProductosController::class, 'productos_list'])->name('listProductos');
Route::get('/productos/edit/{id}', [ProductosController::class, 'producto_edit'])->name('editProducto');
Route::get('/productos/nuevo/', [ProductosController::class, 'producto_nuevo'])->name('nuevoProducto');

Route::post('/productos/nuevo/guardar', [ProductosController::class, 'guardar_producto'])->name('guardarNuevoProducto');
Route::patch('/productos/edit/guardar/{id}', [ProductosController::class, 'guardar_producto'])->name('guardarEditProducto');
Route::post('productos/buscar',[ProductosController::class,'search'])->name('productos.search');

//////////LISTADO DOCUMENTOS///////////////
Route::resource('documentos', ListadoDocumentosController::class);
//////////TAGS///////////////
Route::resource('tags', TagsController::class);

/////////BIBLIOTECA/////////
Route::match(['get','post'],'/biblioteca',[BibliotecaDocumentosController::class,'index'])->name('biblioteca.index');
Route::get('/biblioteca/cargar-documento', [BibliotecaDocumentosController::class, 'create'])->name('biblioteca.create');
Route::post('/biblioteca/cargar-documento', [BibliotecaDocumentosController::class, 'store'])->name('biblioteca.store');
Route::get('/biblioteca/cargar-documento/{$id}/edit', [BibliotecaDocumentosController::class, 'edit'])->name('biblioteca.edit');
Route::patch('/biblioteca/cargar-documento/{$id}', [BibliotecaDocumentosController::class, 'update'])->name('biblioteca.update');
Route::post('/biblioteca/cargar-documento/delete', [BibliotecaDocumentosController::class, 'delete'])->name('biblioteca.delete');
Route::post('/biblioteca/cargar-documento/buscar-proveedor', [BibliotecaDocumentosController::class, 'buscar_proveedor'])->name('biblioteca.buscar.proveedor');
Route::post('/biblioteca/cargar-documento/buscar-producto-proveedor', [BibliotecaDocumentosController::class, 'buscar_producto_proveedor'])->name('biblioteca.buscar.producto.proveedor');

////////INSPECCIONES////////////
Route::match(['get','post'],'/inspecciones/nueva',[InspeccionController::class,'pre_create'])->name('inspecciones.pre.create');
Route::get('/inspecciones/create/{id}/{planilla}',[InspeccionController::class,'create'])->name('inspecciones.create');
Route::match(['get','post'],'/inspecciones/listado-proceso',[InspeccionController::class,'inspeccion_proceso_list'])->name('inspecciones.list.proceso');
Route::match(['get','post'],'/inspecciones/listado-cerrado',[InspeccionController::class,'inspeccion_cerrada_list'])->name('inspecciones.list.cerrado');
Route::post('/inspecciones', [InspeccionController::class, 'store'])->name('inspecciones.store');
Route::patch('/inspecciones/{id}', [InspeccionController::class, 'update'])->name('inspecciones.update');
Route::get('/inspecciones/edit/{id}',[InspeccionController::class,'edit'])->name('inspecciones.edit');
Route::post('/inspecciones/delete', [InspeccionController::class, 'delete'])->name('inspecciones.delete');
#Route::resource('inspecciones', InspeccionController::class);


////////RECEPCIONES////////////
Route::match(['get','post'],'/recepciones/nueva',[RecepcionController::class,'pre_create'])->name('recepciones.pre.create');
Route::get('/recepciones/create/{id}',[RecepcionController::class,'create'])->name('recepciones.create');
Route::match(['get','post'],'/recepciones/listado-proceso',[RecepcionController::class,'recepcion_proceso_list'])->name('recepciones.list.proceso');
Route::match(['get','post'],'/recepciones/listado-cerrado',[RecepcionController::class,'recepcion_cerrada_list'])->name('recepciones.list.cerrado');
Route::post('/recepciones', [RecepcionController::class, 'store'])->name('recepciones.store');
Route::patch('/recepciones/{id}', [RecepcionController::class, 'update'])->name('recepciones.update');
Route::get('/recepciones/edit/{id}',[RecepcionController::class,'edit'])->name('recepciones.edit');
Route::post('/recepciones/delete', [RecepcionController::class, 'delete'])->name('recepciones.delete');


////////FRIGORIFICOS////////////
Route::resource('frigorificos', FrigorificoController::class);

////////CORTES////////////
Route::resource('cortes', CorteController::class);
Route::post('cortes/delete',[CorteController::class,'delete'])->name('cortes.delete');
Route::post('cortes/buscar',[CorteController::class,'search'])->name('cortes.search');