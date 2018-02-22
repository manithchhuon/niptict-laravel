<?php 
Route::post('/category/{id}/update','Category\CategoryController@update')
	->middleware('can:edit-category')
	->name('category.update');

Route::get('/category/{id}/view','Category\CategoryController@view')
	->middleware('can:view-category')
	->name('category.view');

Route::get('/category/{id}/edit','Category\CategoryController@edit')
	->middleware('can:edit-category')
	->name('category.edit');

Route::get('/category','Category\CategoryController@index')
	->middleware('can:list-category')
	->name('category.index');

Route::get('/category/create','Category\CategoryController@create')
	->middleware('can:create-category')
	->name('category.create');

Route::post('/category/store','Category\CategoryController@store')
->middleware('can:create-category')
->name('category.store');

Route::post('/category/delete','Category\CategoryController@delete')
->middleware('can:delete-category')
->name('category.delete');

