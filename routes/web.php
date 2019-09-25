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
Route::get('post/postid={id}','postController@create')->name('post.create')->middleware("auth");
Route::get('postUpdate/postid={id}', 'postController@update')->name('post.update');
Route::get('postUpdate/savepostid={id}','postController@save')->name('post.save')->middleware("auth");
Route::get('postUpdate/deleteUserpostid={id}','postController@deleteUser')->name('post.DelUser')->middleware("auth");
Route::get('postUpdate/getAll={id}','postController@getAll')->name('post.getAll')->middleware("auth");
Route::get('postUpdate/updateUserpostid={id}', 'postController@updateUser')->name('post.updateUser')->middleware("auth");
Route::post('postUpdate/updateProjectInfo', 'postController@updateProjectinfo')->name('post.updateProjectInfo')->middleware("auth");
Route::get('news', 'newsController@create')->name('news.create');
// Route::get('postUpdate/createDDpostid={id}', 'postController@createDD')->name('post.createdd')->middleware('auth');
Route::get('post/uploadpostid={id}', 'postController@createDD')->name('post.createdd')->middleware('auth');
Route::post('post/newUploadpostid', 'postController@newUpload')->name('post.newUpload')->middleware('auth');
Route::get('post/getAllFilepostid={id}', 'postController@getAllFile')->name('post.getAllFile')->middleware('auth');
Route::get('post/getDownloadFileid={id}', 'postController@getDownloadFile')->name('post.getDownloadFile');
Route::get('post/delFilepostid={id}', 'postController@delFile')->name('post.delFile')->middleware('auth');
Route::post('post/updateFilepostid', 'postController@updateFile')->name('post.updateFile')->middleware('auth');
Route::get('post/delPost', 'postController@delPost')->name('post.delPost')->middleware('auth');

Auth::routes();

