<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'web'], function(){
	Route::get('/', 'IndexController@index');
	Route::post('/', 'IndexController@votar');
	Route::get('/sair', 'IndexController@sair');

	Route::get('/enquete', 'EnqueteController@index');
	Route::post('/enquete', 'EnqueteController@criar');
	Route::get('/visualizar-enquetes', 'EnqueteController@visualizar');
	Route::post('/visualizar-enquetes', 'EnqueteController@encerrar');

	Route::get('/login', 'LoginController@index');
	Route::post('/login', 'LoginController@logar');

	Route::get('/registrar', 'RegistrarController@index');
	Route::post('/registrar', 'RegistrarController@salvar');
});
