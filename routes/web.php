<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', ['uses' =>'App\Http\Controllers\HomeController@index', 'as' =>'home']);

//marcas
Route::get('marcas/index', ['uses' =>'App\Http\Controllers\MarcaController@index', 'as' =>'marcas.index']);
Route::get('marcas/create', ['uses' =>'App\Http\Controllers\MarcaController@create', 'as' =>'marcas.create']);
Route::post('marcas/store', ['uses' =>'App\Http\Controllers\MarcaController@store', 'as' =>'marcas.store']);
Route::get('marcas/show/{id}', ['uses' =>'App\Http\Controllers\MarcaController@show', 'as' =>'marcas.show']);
Route::get('marcas/edit/{id}', ['uses' =>'App\Http\Controllers\MarcaController@edit', 'as' =>'marcas.edit']);
Route::put('marcas/update/{id}', ['uses' =>'App\Http\Controllers\MarcaController@update', 'as' =>'marcas.update']);
Route::get('marcas/delete/{id}', ['uses' =>'App\Http\Controllers\MarcaController@delete', 'as' =>'marcas.delete']);
Route::get('marcas/destroy/{id}', ['uses' =>'App\Http\Controllers\MarcaController@destroy', 'as' =>'marcas.destroy']);
Route::get('marcas/buscar', ['uses' =>'App\Http\Controllers\MarcaController@buscar', 'as' =>'marcas.buscar']);

//produtos
Route::get('produtos/index', ['uses' =>'App\Http\Controllers\ProdutoController@index', 'as' =>'produtos.index']);
Route::get('produtos/create', ['uses' =>'App\Http\Controllers\ProdutoController@create', 'as' =>'produtos.create']);
Route::post('produtos/store', ['uses' =>'App\Http\Controllers\ProdutoController@store', 'as' =>'produtos.store']);
Route::get('produtos/show/{id}', ['uses' =>'App\Http\Controllers\ProdutoController@show', 'as' =>'produtos.show']);
Route::get('produtos/edit/{id}', ['uses' =>'App\Http\Controllers\ProdutoController@edit', 'as' =>'produtos.edit']);
Route::put('produtos/update/{id}', ['uses' =>'App\Http\Controllers\ProdutoController@update', 'as' =>'produtos.update']);
Route::get('produtos/delete/{id}', ['uses' =>'App\Http\Controllers\ProdutoController@delete', 'as' =>'produtos.delete']);
Route::get('produtos/destroy/{id}', ['uses' =>'App\Http\Controllers\ProdutoController@destroy', 'as' =>'produtos.destroy']);
Route::get('produtos/buscar', ['uses' =>'App\Http\Controllers\ProdutoController@buscar', 'as' =>'produtos.buscar']);

//categorias
Route::get('categorias/index', ['uses' =>'App\Http\Controllers\CategoriaController@index', 'as' =>'categorias.index']);
Route::get('categorias/create', ['uses' =>'App\Http\Controllers\CategoriaController@create', 'as' =>'categorias.create']);
Route::post('categorias/store', ['uses' =>'App\Http\Controllers\CategoriaController@store', 'as' =>'categorias.store']);
Route::get('categorias/show/{id}', ['uses' =>'App\Http\Controllers\CategoriaController@show', 'as' =>'categorias.show']);
Route::get('categorias/edit/{id}', ['uses' =>'App\Http\Controllers\CategoriaController@edit', 'as' =>'categorias.edit']);
Route::put('categorias/update/{id}', ['uses' =>'App\Http\Controllers\CategoriaController@update', 'as' =>'categorias.update']);
Route::get('categorias/delete/{id}', ['uses' =>'App\Http\Controllers\CategoriaController@delete', 'as' =>'categorias.delete']);
Route::get('categorias/destroy/{id}', ['uses' =>'App\Http\Controllers\CategoriaController@destroy', 'as' =>'categorias.destroy']);
Route::get('categorias/buscar', ['uses' =>'App\Http\Controllers\CategoriaController@buscar', 'as' =>'categorias.buscar']);


