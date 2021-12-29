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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/login', "Auth\AuthController@login");


Route::group(['middleware' => ['auth']], function () {


//Rotas para adicionar moradores
Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');
Route::get('/user/edit/{id}', 'UserController@show');
Route::post('/user/edit/{id}', 'UserController@update')->name('user.update');
Route::delete('/user/delete/{id}', 'UserController@destroy');

//Rotas para adicionar sugestões
Route::get('/suggestion', 'SuggestionController@index');
Route::get('/suggestion/create', 'SuggestionController@create');
Route::post('/suggestion/create', 'SuggestionController@store');
Route::get('/suggestion/show/{id}', 'SuggestionController@show');



//Rotas para cadastro movimentações    
Route::get('/movement' , 'MovementController@index');
Route::get('/movement/create' , 'MovementController@create');

});