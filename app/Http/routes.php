<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {
    	Route::post('/citaapp', 'API\APICitaController@store');
    	Route::get('/cliente-ajaxapp', 'API\APICitaController@buscarCliente');
	});
Route::auth();
$as = "";
/* ================== Socio Routes ================== */
Route::group(['as' => $as, 'middleware' => ['auth', 'permission:FRANQUICIATARIO_PANEL']], function () {


	Route::get('blog/{id}', 'BlogController@detail');
	Route::get('evento/{id}', 'EventoController@detail');
	Route::get('empresa/{id}', 'EmpresaController@detail');
	/* ================== User Profile Routes ================== */
	Route::get('user_profile', 'UserProfileController@index');

/* ================== ComiteRoutes ================== */
    
	Route::get('front_comite/{id}', 'ComiteController@detail');
	Route::get('/asistencias/email/{id}', 'ComiteController@create_from_email');
    Route::post('/asistencias/create/', 'ComiteController@store');
	Route::get('/asistencias/emailcancelar/{id}', 'ComiteController@cancel_from_email');
	Route::post('/asistencias/update/{id}', 'ComiteController@update');
	Route::get('/encuestas/fromemail/{id}', 'ComiteController@encuesta_from_email');
	Route::post('/encuestas/storeencuesta/{id}', 'ComiteController@store_encuesta');
	


});

/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';
