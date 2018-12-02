<?php
 


Route::get('/', 'Controllerhernandez@welcom');

Auth::routes();

Route::get('/search', 'SearchControllerhernandez@show');
Route::get('/products/json', 'SearchControllerhernandez@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductControllerhernandez@show');
Route::get('/categories/{category}', 'CategoryControllerhernandez@show');




Route::Post('/cart', 'CartDetailControllerhernandez@store');
Route::delete('/cart', 'CartDetailControllerhernandez@destroy');
Route::Post('/order', 'CartControllerhernandez@update');

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {

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



	Route::get('/categories', 'CategoryControllerhernandez@index');  //listar
Route::get('/categories/create', 'CategoryControllerhernandez@create'); //formulario
Route::Post('/categories', 'CategoryControllerhernandez@store'); //registrar
Route::get('/categories/{categoryedit}/edit', 'CategoryControllerhernandez@edit');//formulario edicion
Route::Post('/categories/{categoryedit}/edit', 'CategoryControllerhernandez@update'); //actualizar
Route::delete('/categories/{categorydelete}', 'CategoryControllerhernandez@destroy');//formulario eliminar

    
});



