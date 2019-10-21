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
Route::get('discoverHydroshare', function(){
	return view('discover');
})->name("discover");
Route::get('addNew', 'addNewController@create')->name('addNew.create');
Route::post('addNew', 'addNewController@add')->name('addNew.add');
Route::get('postUpdate/postid={id}', 'postController@update')->name('post.update');
Route::get('news', 'newsController@create')->name('news.create');
Route::get('post/getDownloadFileid={id}', 'postController@getDownloadFile')->name('post.getDownloadFile');
Route::get('ToolAndServices', 'mkController@createTNS')->name('toolNservices');
Route::get('discoverMekongWater', 'mkController@viewMk')->name('discoverMk');
Route::get('getEventHome', 'eventController@getEvent')->name('getEvent');
Route::get('getSubjectHome', 'subjectController@getSubject')->name('getSubject');
Route::get('topic', 'topicController@createTopic')->name('topic');
Route::get('topicGetSubject', 'topicController@getSubject')->name('topic.subject');
Route::get('topicKeyword', 'topicController@getKeyword')->name('topic.keyword');
Route::get('topicGetPost', 'topicController@getPost')->name("topic.getPost");
Route::get('post/postid={id}','postController@create')->name('post.create');
Route::get('postSearch', 'topicController@searchsk')->name('topic.searchsk');
Route::get('topicSearchSubject={id}', 'topicController@createTopicSubject')->name('topic.searchSubject');
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
	Route::get('createEvents', 'adminController@createEvents')->name('admin.events');
	Route::get('createRoles', 'adminController@createRoles')->name('admin.roles');
	Route::get('createSubjects', 'adminController@createSubjects')->name('admin.subjects');
	Route::post('saveSubject', 'adminController@saveSubject')->name('subject.save');
	Route::get('getSubjects', 'adminController@getSubject')->name('subject.get');
	Route::get('delSubjects', 'adminController@delSubject')->name('subject.del');
	Route::post('updateSubjects', 'adminController@updateSubject')->name('subject.update');
	Route::post('saveRoles', 'adminController@saveRole')->name('role.save');
	Route::get('getRoles', 'adminController@getRole')->name('role.get');
	Route::post('updateRoles', 'adminController@updateRole')->name('role.update');
	Route::get('delRoles', 'adminController@delRole')->name('role.del');
	Route::post('saveEvents', 'adminController@saveEvent')->name('event.save');
	Route::get('getEvents', 'adminController@getEvent')->name('event.get');
	Route::post('updateEvents', 'adminController@updateEvent')->name('event.update');
	Route::get('delEvents', 'adminController@delEvent')->name('event.del');
});
Route::middleware('auth')->group(function(){
	Route::get('getRoles', 'adminController@getRole')->name('role.get');
	Route::get('getSubjects', 'adminController@getSubject')->name('subject.get');
	Route::get('post/delFilepostid={id}', 'postController@delFile')->name('post.delFile');
	Route::get('post/updateFilepostid', 'postController@updateFile')->name('post.updateFile');
	Route::get('post/delPost', 'postController@delPost')->name('post.delPost');
	Route::get('post/uploadpostid={id}', 'postController@createDD')->name('post.createdd');
	Route::post('post/newUploadpostid', 'postController@newUpload')->name('post.newUpload');
	Route::get('post/getAllFilepostid={id}', 'postController@getAllFile')->name('post.getAllFile');
	Route::get('postUpdate/savepostid={id}','postController@save')->name('post.save');
	Route::get('postUpdate/deleteUserpostid={id}','postController@deleteUser')->name('post.DelUser');
	Route::get('postUpdate/getAll={id}','postController@getAll')->name('post.getAll');
	Route::get('postUpdate/updateUserpostid={id}', 'postController@updateUser')->name('post.updateUser');
	Route::post('postUpdate/updateProjectInfo', 'postController@updateProjectinfo')->name('post.updateProjectInfo');
	Route::get('myresources', 'myResourcesController@create')->name('myresources.create');
	Route::get('changepw', 'loginController@changepw')->name('changepw');
	Route::get('getPw', 'loginController@getPw')->name('getpw');
	Route::post('updateMyProfile', 'loginController@updateProfile')->name('update.profile');
});
Auth::routes();