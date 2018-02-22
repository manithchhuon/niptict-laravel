<?php 
Route::post('/product/{id}/update','Product\ProductController@update')
	->name('product.update')
	->middleware('can:edit-product');

Route::get('/product/{id}/view','Product\ProductController@view')
	->middleware('can:view-product')
	->name('product.view');

Route::get('/product/{id}/edit','Product\ProductController@edit')
	->middleware('can:edit-product')
	->name('product.edit');

Route::get('/product','Product\ProductController@index')
	->middleware('can:list-product')
	->name('product.index');

Route::get('/product/create','Product\ProductController@create')
	->middleware('can:create-product')
	->name('product.create');

Route::post('/product/store','Product\ProductController@store')
	->middleware('can:create-product')
	->name('product.store');

Route::post('/product/delete','Product\ProductController@delete')
	->middleware('can:delete-product')
	->name('product.delete');

