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



Route::resource('upload','api\PostController');


Route::get('cms', 'CmsController@index');
Route::get('template', 'TemplateController@index');
Route::get('template/modify', 'TemplateController@modify');

Route::resource('company', 'CompanyController');
Route::resource('contact_person', 'Contact_personController');
Route::resource('commodity', 'CommodityController');