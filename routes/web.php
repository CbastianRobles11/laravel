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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('agenda','AgendaController');


//la ruta cancela del formulario crea
route::get('/cancelar',function(){

	return redirect()->route('agenda.index')->with('cancelar','Accion Cancelada');

})->name('cancelar');


//si se accede a agenda con el id con la funcion confirm acceder a AgendaControllera la funcion confirm con nombre
route::get('/agenda/{id}/confirm','AgendaController@confirm')->name('agenda.confirm')->middleware('auth');