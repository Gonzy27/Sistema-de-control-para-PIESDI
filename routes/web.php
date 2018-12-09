<?php

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

Route::get('/', 'PagesController@index');

Route::get('/contacto', 'PagesController@contact');

Route::get('/prueba', 'PagesController@index');

Route::get('/home', 'PagesController@home');

//Gestión profesionales
Route::resource('profesionales', 'ProfesionalesController');

//formulario reset contraseña
Route::get('/profesionales/ajuste/reset', 'PagesController@formularioResetPass');

//reset contraseña
Route::post('/profesionales/ajuste/passUpdate', 'PagesController@resetPass');
Route::post('/profesionales/ajuste/passUpdateAjax', 'PagesController@resetPassAjax');

//Gestión alumnos
Route::get('/alumnos/mostrar/{id}', 'AlumnosController@mostrar');

//informes participación alumnos en eventos
Route::get('/alumnos/mostrar/pdf/{id}', 'AlumnosController@mostrarPDF');

Route::get('/alumnos/mostrar/pdfAnual/{id}', 'AlumnosController@mostrarPDFAnual');

Route::get('/alumnos/mostrar/excel/{id}', 'AlumnosController@mostrarExcel');

Route::get('/alumnos/mostrar/excelAnual/{id}', 'AlumnosController@mostrarPDFAnual');

Route::post('/alumnos/mostrar/pdfFecha', 'AlumnosController@mostrarPDFFecha');

Route::post('/alumnos/mostrar/excelFecha', 'AlumnosController@mostrarExcelFecha');

Route::get('/alumnos/listar/pdf', 'AlumnosController@listarPdf');

Route::get('/alumnos/listar/excel', 'AlumnosController@listarExcel');

Route::resource('alumnos', 'AlumnosController');

Route::get('/evento', 'PagesController@menuEvento');

Route::resource('eventos', 'EventosController');

Route::get('/evento/listar', 'EventosController@listar');

//informes eventos
Route::post('/evento/pdf', 'EventosController@mostrarPDFFecha');

Route::post('/evento/excel', 'EventosController@mostrarExcelFecha');


//Gestión participantes externos
Route::resource('externos', 'ParticipanteExternoController');

//Envia solicitudes
Route::resource('solicitudes', 'SolicitudesController');

//informes solicitudes
Route::post('solicitudes/listar/pdf', 'SolicitudesController@listarPdf');
Route::post('solicitudes/listar/excel', 'SolicitudesController@listarExcel');

//Envia noticias
Route::resource('noticias', 'NoticiaController');

//Envia noticias
//Route::post('/noticias', 'PagesController@enviarNoticia');

//Obtener datos para los DataTables de edición de evento
Route::get('/tablas/participanteAlumno', 'TablesEditController@getParticipanteAlumno');

Route::get('/tablas/participanteProfesional', 'TablesEditController@getParticipanteProfesional');

Route::get('/tablas/participanteExterno', 'TablesEditController@getParticipanteExterno');

//Eliminar participantes del evento a editar

Route::post('/tablas/deleteAlumno', 'TablesEditController@deleteAlumnoFromEvento');

Route::post('/tablas/deleteProfesional', 'TablesEditController@deleteProfesionalFromEvento');

Route::post('/tablas/deleteExterno', 'TablesEditController@deleteExternoFromEvento');


//Obterner datos para los DataTables que agregan participantes a eventos ya creados
Route::get('/tablas/getAlumno', 'TablesEditController@getNuevosAlumnos');

Route::get('/tablas/getProfesional', 'TablesEditController@getNuevosProfesionales');

Route::get('/tablas/getExterno', 'TablesEditController@getNuevosExternos');

//Agrega nuevos participantes a un evento ya creado 
Route::post('/tablas/addParticipante', 'TablesEditController@addNuevosParticipantes');

//Envia invitaciones
Route::post('/invitaciones', 'PagesController@enviarInvitacion');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//reset contraseña

//Route::post('/forgotPassword', 'ForgotPasswordController@postForgotPassword');
//Route::get('/forgotPassword/reset/{token?}', 'ForgotPasswordController@showResetForm');
//Route::post('/forgotPassword/reset', 'ForgotPasswordController@reset');

