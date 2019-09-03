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
    return view('home');
});

Route::get('contact','ContactFormController@create')->name("contact.create");
Route::post('contact','ContactFormController@store')->name("contact.store");
Route::get('home', function(){
	return view('home');
})->name("home");
Route::get('discover', function(){
	return view('discover');
})->name("discover");
Route::get('myresources', 'myResourcesController@create')->name('myresources.create')->middleware("auth");
Route::get('addNew', 'addNewController@create')->name('addNew.create');
Route::post('addNew', 'addNewController@add')->name('addNew.add');
// Route::post('register','loginController@insert');
Auth::routes();

