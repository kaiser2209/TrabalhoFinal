<?php

use Illuminate\Support\Facades\Route;
use Admin\ProdutoController;
use Admin\CategoriaController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::redirect('/', 'admin/produtos');

Route::prefix('admin')->name('admin.')->group(function () {
    //Route::get('/produtos', 'ProdutoController@listar')->name('produtos.listar');
    /*
    Route::get('/produtos', [ProdutoController::class, 'itens'])->name('produtos.listar');
    Route::get('/produtos/adicionar', [ProdutoController::class, 'formAdicionar'])->name('produtos.form_adicionar');
    Route::post('/produtos/adicionar', [ProdutoController::class, 'adicionar'])->name('produtos.adicionar');
    Route::delete('/produtos/{id}', [ProdutoController::class, 'deletar'])->name('produtos.deletar');
    Route::get('/produtos/{id}', [ProdutoController::class, 'formEditar'])->name('produtos.formEditar');
    Route::put('/produtos/{id}', [ProdutoController::class, 'editar'])->name('produtos.editar');
    */
    //Route::get('/produtos/adicionar', 'ProdutoController@adicionar')->name('produtos.form_adicionar');

    Route::resource('produtos', ProdutoController::class)->except(['show']);
    Route::resource('categorias', CategoriaController::class);
});
