<?php

/* ================== Homepage ================== */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::auth();

/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
	$as = config('laraadmin.adminRoute').'.';
	
	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	/* ================== Ajax calls JSON ================== */
	Route::get('/cliente-ajax', 'LA\CitasController@buscarCliente');

	Route::get('/pedicurista-ajax', 'LA\CitasController@buscarPedicurista');

	
	Route::get('/horario-ajax', 'LA\CitasController@buscarHorario');
	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
	
	/* ================== Uploads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
	Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
	Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
	Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');
	
	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');
	
	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');
	
	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');
	
	/* ================== Employees ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
	Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\EmployeesController@change_password');
	
	/* ================== Organizations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/organizations', 'LA\OrganizationsController');
	Route::get(config('laraadmin.adminRoute') . '/organization_dt_ajax', 'LA\OrganizationsController@dtajax');

	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');





	/* ================== Sucursals ================== */
	Route::resource(config('laraadmin.adminRoute') . '/sucursals', 'LA\SucursalsController');
	Route::get(config('laraadmin.adminRoute') . '/sucursal_dt_ajax', 'LA\SucursalsController@dtajax');

	/* ================== Pedicuristas ================== */
	Route::resource(config('laraadmin.adminRoute') . '/pedicuristas', 'LA\PedicuristasController');
	Route::get(config('laraadmin.adminRoute') . '/pedicurista_dt_ajax', 'LA\PedicuristasController@dtajax');

	/* ================== Horarios ================== */
	Route::resource(config('laraadmin.adminRoute') . '/horarios', 'LA\HorariosController');
	Route::get(config('laraadmin.adminRoute') . '/horario_dt_ajax', 'LA\HorariosController@dtajax');

	/* ================== Servicios ================== */
	Route::resource(config('laraadmin.adminRoute') . '/servicios', 'LA\ServiciosController');
	Route::get(config('laraadmin.adminRoute') . '/servicio_dt_ajax', 'LA\ServiciosController@dtajax');

	/* ================== Pedicurista_Servicios ================== */
	Route::resource(config('laraadmin.adminRoute') . '/pedicurista_servicio', 'LA\Pedicurista_ServicioController');
	Route::get(config('laraadmin.adminRoute') . '/pedicurista_servicio_dt_ajax', 'LA\Pedicurista_ServicioController@dtajax');

	/* ================== Citas ================== */
	Route::resource(config('laraadmin.adminRoute') . '/citas', 'LA\CitasController');
	Route::get(config('laraadmin.adminRoute') . '/cita_dt_ajax', 'LA\CitasController@dtajax');

	Route::get(config('laraadmin.adminRoute') . '/createcita', 'LA\CitasController@createcita');

	


	/* ================== Clientes ================== */
	Route::resource(config('laraadmin.adminRoute') . '/clientes', 'LA\ClientesController');
	Route::get(config('laraadmin.adminRoute') . '/cliente_dt_ajax', 'LA\ClientesController@dtajax');

	/* ================== Incapacidads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/incapacidads', 'LA\IncapacidadsController');
	Route::get(config('laraadmin.adminRoute') . '/incapacidad_dt_ajax', 'LA\IncapacidadsController@dtajax');

});
