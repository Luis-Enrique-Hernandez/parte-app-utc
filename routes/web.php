<?php



Route::get('/', 'Controllerhernandez@welcom');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

	Route::get('/products', 'ProductControllerhernandez@index');  //listar
Route::get('/products/create', 'ProductControllerhernandez@create'); //formulario
Route::Post('/products', 'ProductControllerhernandez@store'); //registrar

Route::get('/products/{id}/edit', 'ProductControllerhernandez@edit');//formulario edicion
Route::Post('/products/{id}/edit', 'ProductControllerhernandez@update'); //actualizar

Route::delete('/products/{id}', 'ProductControllerhernandez@destroy');//formulario eliminar

Route::get('/products/{id}/images', 'ImagesControllerhernandez@index');
Route::Post('/products/{id}/images', 'ImagesControllerhernandez@store'); //registrar
Route::delete('/products/{id}/images', 'ImagesControllerhernandez@destroy');//formulario eliminar

Route::get('/products/{id}/images/select/{image}', 'ImagesControllerhernandez@select');  //Destacar una imagen
    
});



