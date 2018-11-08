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
    return view('auth/login');
});
Route::get('/acerca', function () {
    return view('acerca');
});

Route::resource('almacen/categoria','CategoriaController');
Route::resource('almacen/articulo','ArticuloController');
Route::resource('ventas/cliente','ClienteController');
Route::resource('compras/proveedor','ProveedorController');
Route::resource('compras/ingreso','IngresoController');
Route::resource('ventas/venta','VentaController');
Route::resource('seguridad/usuario','UsuarioController');
Route::resource('almacen/entrega','EntregaController');
Route::resource('personal/empleados','EmpleadosController');
Route::resource('reportes','ReporteController');



//Route::resource('reportes/articulosr','ReporteController');






Route::auth();

Route::get('/home', 'HomeController@index');

//Reportes
Route::get('reportecategorias', 'CategoriaController@reporte');
Route::get('reportearticulos', 'ArticuloController@reporte');
Route::get('reporteclientes', 'ClienteController@reporte');
Route::get('reporteproveedores', 'ProveedorController@reporte');
Route::get('reporteventas', 'VentaController@reporte');
Route::get('reporteventa/{id}', 'VentaController@reportec');
Route::get('reporteingresos', 'IngresoController@reporte'); 
Route::get('reporteingreso/{id}', 'IngresoController@reportec');
Route::get('reporteempleado', 'EmpleadosController@reporte');
Route::get('ringresos', 'IngresoController@ringresos'); 
Route::get('rventas', 'VentaController@rventas');
Route::get('reporteempple', 'EmpleadosController@reporte');
Route::get('entraempleado', 'EmpleadosController@reporteemfe');

Route::get('rcategoria', 'CategoriaController@rcategoria');
Route::get('rcategoriaart', 'ArticuloController@rcategoriaart');


Route::get('reporte-empleados', 'ReporteController@reporteempleados');
Route::get('reporte-articulo', 'ReporteController@reportearticulo'); 
Route::get('reporte-ventas', 'ReporteController@reporteventas');
Route::get('reporte-ingresos', 'ReporteController@reporteingre');
Route::get('reporte-clien', 'ReporteController@reporteclien');





Route::get('/{slug?}', 'HomeController@index');

