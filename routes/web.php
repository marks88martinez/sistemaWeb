<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\SubcategoriasController;
use App\Http\Controllers\ProductoController;


/*
|-----------------------bannerEliminar---------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UsersController::class);
Route::resource('banners', BannersController::class);
// Route::post('banner/bannerEliminar', 'BannersController@bannerEliminar');
Route::post('banner/bannerEliminar/{id}', [BannersController::class, 'bannerEliminar'])->name('banner.bannerEliminar');
Route::post('marca/marcaEliminar/{id}', [MarcasController::class, 'marcaEliminar'])->name('marca.marcaEliminar');
Route::post('categoria/categoriaEliminar/{id}', [CategoriasController::class, 'categoriaEliminar'])->name('categoria.categoriaEliminar');
Route::post('subcategoria/subcategoriaEliminar/{id}', [SubcategoriasController::class, 'subcategoriaEliminar'])->name('subcategoria.subcategoriaEliminar');

Route::resource('marcas', MarcasController::class);
Route::resource('categorias', CategoriasController::class);
Route::resource('subcategorias', SubcategoriasController::class);
Route::resource('productos', ProductoController::class);

