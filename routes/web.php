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

// Home
Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);

// Brand
Route::get('brand', ['as' => 'brand.index', 'uses' => 'BrandController@index']);
Route::get('brand/create', ['as' => 'brand.create', 'uses' => 'BrandController@create']);
Route::get('brand/{id}/edit', ['as' => 'brand.edit', 'uses' => 'BrandController@edit', 'middleware' => 'brand-exists']);
Route::post('brand', ['as' => 'brand.store', 'uses' => 'BrandController@store']);
Route::put('brand/{id}', ['as' => 'brand.update', 'uses' => 'BrandController@update', 'middleware' => 'brand-exists']);

// Model
Route::get('model', ['as' => 'model.index', 'uses' => 'ModelController@index']);
Route::get('model/create', ['as' => 'model.create', 'uses' => 'ModelController@create']);
Route::get('model/{id}/edit', ['as' => 'model.edit', 'uses' => 'ModelController@edit', 'middleware' => 'model-exists']);
Route::post('model', ['as' => 'model.store', 'uses' => 'ModelController@store']);
Route::put('model/{id}', ['as' => 'model.update', 'uses' => 'ModelController@update', 'middleware' => 'model-exists']);
Route::get('model/getModelsByBrand/{id}/{active?}', [
    'as' => 'model.modelsByBrand',
    'uses' => 'ModelController@getModelsByBrand',
    'middleware' => 'brand-exists',
]);

// Engine
Route::get('engine', ['as' => 'engine.index', 'uses' => 'EngineController@index']);
Route::get('engine/create', ['as' => 'engine.create', 'uses' => 'EngineController@create']);
Route::get('engine/{id}/edit', ['as' => 'engine.edit', 'uses' => 'EngineController@edit', 'middleware' => 'engine-exists']);
Route::post('engine', ['as' => 'engine.store', 'uses' => 'EngineController@store']);
Route::put('engine/{id}', ['as' => 'engine.update', 'uses' => 'EngineController@update', 'middleware' => 'engine-exists']);

// Car
Route::get('car', ['as' => 'car.index', 'uses' => 'CarController@index']);
Route::get('car/create', ['as' => 'car.create', 'uses' => 'CarController@create']);
Route::get('car/{id}/edit', ['as' => 'car.edit', 'uses' => 'CarController@edit', 'middleware' => 'car-exists']);
Route::post('car', ['as' => 'car.store', 'uses' => 'CarController@store']);
Route::put('car/{id}', ['as' => 'car.update', 'uses' => 'CarController@update', 'middleware' => 'car-exists']);
