<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ItemController;

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
    Route::get('/produtos', [ProdutoController::class, 'itens'])->name('produtos.listar');
    Route::get('/produtos/adicionar', [ProdutoController::class, 'formAdicionar'])->name('produtos.form_adicionar');
    Route::post('/produtos/adicionar', [ProdutoController::class, 'adicionar'])->name('produtos.adicionar');
    //Route::get('/produtos/adicionar', 'ProdutoController@adicionar')->name('produtos.form_adicionar');
});
