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
Route::get('addNew', 'addNewController@create')->name('addNew.create');
Route::post('addNew', 'addNewController@add')->name('addNew.add');
Route::get('postUpdate/postid={id}', 'postController@update')->name('post.update');
Route::get('news', 'newsController@create')->name('news.create');
Route::get('post/getDownloadFileid={id}', 'postController@getDownloadFile')->name('post.getDownloadFile');
Route::middleware('checkAdmin')->group(function(){
	Route::get('dashboard', 'adminController@createDashboard')->name('admin.dashboard');
	Route::get('usersInformation', 'adminController@createUsers')->name('admin.users');
	Route::get('projectInformation', 'adminController@createProjectInfo')->name('admin.projectInfo');
	Route::get('dashboard/totalPostToday', 'adminController@totalPostToday')->name('admin.tpt');
	Route::get('dashboard/totalUser', 'adminController@totalUser')->name('admin.tu');
	Route::get('dashboard/totalPost', 'adminController@totalPost')->name('admin.tp');
	Route::get('dashboard/totalFileUploaded', 'adminController@totalFileUploaded')->name('admin.tfu');
	Route::get('projectDD', 'adminController@createProjectDD')->name('admin.projectDD');
	Route::get('projectDescription', 'adminController@createProjectDescription')->name('admin.projectDescription');
	Route::get('projectPersonnel', 'adminController@createProjectPersonnel')->name('admin.projectPersonnel');
	Route::get('getProjectDescription', 'adminController@getProjectDescription')->name('admin.getProjectDescription');
	Route::get('getProjectPersonnel', 'adminController@getPP')->name('admin.getPP');
	Route::get('delUser', 'adminController@delUser')->name('admin.delUser');
	Route::get('delPi', 'adminController@delPi')->name('admin.delPi');
	Route::get('delPp', 'adminController@delPp')->name('admin.delPp');
	Route::get('delPd', 'adminController@delPd')->name('admin.delPd');
	Route::get('delPdd', 'adminController@delPdd')->name('admin.delPdd');
});
Route::middleware('auth')->group(function(){
	Route::get('post/delFilepostid={id}', 'postController@delFile')->name('post.delFile');
	Route::post('post/updateFilepostid', 'postController@updateFile')->name('post.updateFile');
	Route::get('post/delPost', 'postController@delPost')->name('post.delPost');
	Route::get('post/uploadpostid={id}', 'postController@createDD')->name('post.createdd');
	Route::post('post/newUploadpostid', 'postController@newUpload')->name('post.newUpload');
	Route::get('post/getAllFilepostid={id}', 'postController@getAllFile')->name('post.getAllFile');
	Route::get('postUpdate/savepostid={id}','postController@save')->name('post.save');
	Route::get('postUpdate/deleteUserpostid={id}','postController@deleteUser')->name('post.DelUser');
	Route::get('postUpdate/getAll={id}','postController@getAll')->name('post.getAll');
	Route::get('postUpdate/updateUserpostid={id}', 'postController@updateUser')->name('post.updateUser');
	Route::post('postUpdate/updateProjectInfo', 'postController@updateProjectinfo')->name('post.updateProjectInfo');
	Route::get('post/postid={id}','postController@create')->name('post.create');
	Route::get('myresources', 'myResourcesController@create')->name('myresources.create');
	Route::get('changepw', 'loginController@changepw')->name('changepw');
	Route::get('getPw', 'loginController@getPw')->name('getpw');
	Route::post('updateMyProfile', 'loginController@updateProfile')->name('update.profile');
});
Auth::routes();