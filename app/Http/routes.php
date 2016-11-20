<?php

Route::get('/demo', function () {
    return View('welcome');
});
Route::get('/', array('as' => 'home', 'uses' => 'UsersController@getLogin'));
// backend

Route::group(array('prefix' => 'dashboard'), function () {
    Route::get('/', array('as' => 'dashboard', 'uses' => 'DashboardController@index'));
    Route::get('index', array('as' => 'dashboard.index', 'uses' => 'DashboardController@index'));
});

Route::group(array('prefix' => 'users'), function () {
    Route::get('login', array('as' => 'users.login.get', 'uses' => 'UsersController@getLogin'));
    Route::post('login', array('as' => 'users.login', 'uses' => 'UsersController@postLogin'));
    Route::get('logout', array('as' => 'users.logout.get', 'uses' => 'UsersController@getLogout'));
    Route::get('register', array('as' => 'users.register.get', 'uses' => 'UsersController@getRegister'));
    Route::post('create', array('as' => 'users.create', 'uses' => 'UsersController@postCreate'));
    Route::get('client-register', array('as' => 'users.client-register.get', 'uses' => 'UsersController@getClientRegister'));
    Route::get('change-password', array('as' => 'users.change-password.get', 'uses' => 'UsersController@getChangePassword'));
    Route::post('change-password', array('as' => 'users.change-password', 'uses' => 'UsersController@postChangePassword'));
    Route::get('profile', ['as' => 'users.profile', 'uses' => 'UsersController@getProfile']);
    Route::post('profile', ['as' => 'users.save-profile', 'uses' => 'UsersController@saveProfile']);
    Route::get('recover-password', ['as' => 'users.recover-password', 'uses' => 'UsersController@getRecoverPassword']);
    Route::post('recover-password', ['as' => 'users.reset-password', 'uses' => 'UsersController@postRecoverPassword']);
    Route::get('reset-password', ['as' => 'user.reset', 'uses' => 'UsersController@updatedPassword']);
});


Route::group(array('prefix' => 'users'), function () {
    Route::get('/', array('as' => 'users', 'uses' => 'UserController@indexWithoutParam'));
    Route::get('index', array('as' => 'users.list', 'uses' => 'UserController@indexWithoutParam'));
    Route::get('create', array('as' => 'users.create', 'uses' => 'UserController@create'));
    Route::get('edit/{id}', array('as' => 'users.edit', 'uses' => 'UserController@edit'));
    Route::get('export/{type}', array('as' => 'users.export', 'uses' => 'UserController@export'));
    Route::get('index/filter/{param?}', array('as' => 'users.list.param', 'uses' => 'UserController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'users.grid', 'uses' => 'UserController@grid'));
    Route::post('mass-delete', array('as' => 'users.mass-delete', 'uses' => 'UserController@massDelete'));
    Route::post('mass-status', array('as' => 'users.mass-status', 'uses' => 'UserController@massStatus'));
    Route::post('save/{id?}', array('as' => 'users.save', 'uses' => 'UserController@save'));
    Route::get('delete/{id}', array('as' => 'users.delete', 'uses' => 'UserController@delete'));
    Route::get('changer-level', array('as' => 'users.changer_level', 'uses' => 'UserController@changerLevel'));
});


Route::group(array('prefix' => 'roles'), function () {
    Route::get('/', array('as' => 'roles', 'uses' => 'RoleController@indexWithoutParam'));
    Route::get('index', array('as' => 'roles.list', 'uses' => 'RoleController@indexWithoutParam'));
    Route::get('create', array('as' => 'roles.create', 'uses' => 'RoleController@create'));
    Route::get('edit/{id}', array('as' => 'roles.edit', 'uses' => 'RoleController@edit'));
    Route::get('export/{type}', array('as' => 'roles.export', 'uses' => 'RoleController@export'));
    Route::get('index/filter/{param?}', array('as' => 'roles.list.param', 'uses' => 'RoleController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'roles.grid', 'uses' => 'RoleController@grid'));
    Route::post('mass-delete', array('as' => 'roles.mass-delete', 'uses' => 'RoleController@massDelete'));
    Route::post('mass-status', array('as' => 'roles.mass-status', 'uses' => 'RoleController@massStatus'));
    Route::post('save/{id?}', array('as' => 'roles.save', 'uses' => 'RoleController@save'));
    Route::get('delete/{id}', array('as' => 'roles.delete', 'uses' => 'RoleController@delete'));
});

Route::group(array('prefix' => 'permissions'), function () {
    Route::get('/', array('as' => 'permissions', 'uses' => 'PermissionController@indexWithoutParam'));
    Route::get('index', array('as' => 'permissions.list', 'uses' => 'PermissionController@indexWithoutParam'));
    Route::get('create', array('as' => 'permissions.create', 'uses' => 'PermissionController@create'));
    Route::get('edit/{id}', array('as' => 'permissions.edit', 'uses' => 'PermissionController@edit'));
    Route::get('export/{type}', array('as' => 'permissions.export', 'uses' => 'PermissionController@export'));
    Route::get('index/filter/{param?}', array('as' => 'permissions.list.param', 'uses' => 'PermissionController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'permissions.grid', 'uses' => 'PermissionController@grid'));
    Route::post('mass-delete', array('as' => 'permissions.mass-delete', 'uses' => 'PermissionController@massDelete'));
    Route::post('mass-status', array('as' => 'permissions.mass-status', 'uses' => 'PermissionController@massStatus'));
    Route::post('save/{id?}', array('as' => 'permissions.save', 'uses' => 'PermissionController@save'));
    Route::get('delete/{id}', array('as' => 'permissions.delete', 'uses' => 'PermissionController@delete'));
});

Route::group(array('prefix' => 'logs'), function () {
    Route::get('/', array('as' => 'logs', 'uses' => 'LogController@indexWithoutParam'));
    Route::get('index', array('as' => 'logs.list', 'uses' => 'LogController@indexWithoutParam'));
    Route::get('create', array('as' => 'logs.create', 'uses' => 'LogController@create'));
    Route::get('edit/{id}', array('as' => 'logs.edit', 'uses' => 'LogController@edit'));
    Route::get('export/{type}', array('as' => 'logs.export', 'uses' => 'LogController@export'));
    Route::get('index/filter/{param?}', array('as' => 'logs.list.param', 'uses' => 'LogController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'logs.grid', 'uses' => 'LogController@grid'));
    Route::post('mass-delete', array('as' => 'logs.mass-delete', 'uses' => 'LogController@massDelete'));
    Route::post('mass-status', array('as' => 'logs.mass-status', 'uses' => 'LogController@massStatus'));
    Route::post('save/{id?}', array('as' => 'logs.save', 'uses' => 'LogController@save'));
    Route::get('delete/{id}', array('as' => 'logs.delete', 'uses' => 'LogController@delete'));
    Route::post('import', array('as' => 'logs.import', 'uses' => 'LogController@import'));
});
Route::group(array('prefix' => 'rooms'), function () {
    Route::get('/', array('as' => 'rooms', 'uses' => 'RoomController@indexWithoutParam'));
    Route::get('index', array('as' => 'rooms.list', 'uses' => 'RoomController@indexWithoutParam'));
    Route::get('create', array('as' => 'rooms.create', 'uses' => 'RoomController@create'));
    Route::get('edit/{id}', array('as' => 'rooms.edit', 'uses' => 'RoomController@edit'));
    Route::get('export/{type}', array('as' => 'rooms.export', 'uses' => 'RoomController@export'));
    Route::get('index/filter/{param?}', array('as' => 'rooms.list.param', 'uses' => 'RoomController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'rooms.grid', 'uses' => 'RoomController@grid'));
    Route::post('mass-delete', array('as' => 'rooms.mass-delete', 'uses' => 'RoomController@massDelete'));
    Route::post('mass-status', array('as' => 'rooms.mass-status', 'uses' => 'RoomController@massStatus'));
    Route::post('save/{id?}', array('as' => 'rooms.save', 'uses' => 'RoomController@save'));
    Route::get('delete/{id}', array('as' => 'rooms.delete', 'uses' => 'RoomController@delete'));
});
Route::group(array('prefix' => 'levels'), function () {
    Route::get('/', array('as' => 'levels', 'uses' => 'LevelController@indexWithoutParam'));
    Route::get('index', array('as' => 'levels.list', 'uses' => 'LevelController@indexWithoutParam'));
    Route::get('create', array('as' => 'levels.create', 'uses' => 'LevelController@create'));
    Route::get('edit/{id}', array('as' => 'levels.edit', 'uses' => 'LevelController@edit'));
    Route::get('export/{type}', array('as' => 'levels.export', 'uses' => 'LevelController@export'));
    Route::get('index/filter/{param?}', array('as' => 'levels.list.param', 'uses' => 'LevelController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'levels.grid', 'uses' => 'LevelController@grid'));
    Route::post('mass-delete', array('as' => 'levels.mass-delete', 'uses' => 'LevelController@massDelete'));
    Route::post('mass-status', array('as' => 'levels.mass-status', 'uses' => 'LevelController@massStatus'));
    Route::post('save/{id?}', array('as' => 'levels.save', 'uses' => 'LevelController@save'));
    Route::get('delete/{id}', array('as' => 'levels.delete', 'uses' => 'LevelController@delete'));
});

Route::group(array('prefix' => 'months'), function () {
    Route::get('/', array('as' => 'months', 'uses' => 'MonthController@indexWithoutParam'));
    Route::get('index', array('as' => 'months.list', 'uses' => 'MonthController@indexWithoutParam'));
    Route::get('create', array('as' => 'months.create', 'uses' => 'MonthController@create'));
    Route::get('edit/{id}', array('as' => 'months.edit', 'uses' => 'MonthController@edit'));
    Route::get('export/{type}', array('as' => 'months.export', 'uses' => 'MonthController@export'));
    Route::get('index/filter/{param?}', array('as' => 'months.list.param', 'uses' => 'MonthController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'months.grid', 'uses' => 'MonthController@grid'));
    Route::post('mass-delete', array('as' => 'months.mass-delete', 'uses' => 'MonthController@massDelete'));
    Route::post('mass-status', array('as' => 'months.mass-status', 'uses' => 'MonthController@massStatus'));
    Route::post('save/{id?}', array('as' => 'months.save', 'uses' => 'MonthController@save'));
    Route::get('delete/{id}', array('as' => 'months.delete', 'uses' => 'MonthController@delete'));
    Route::get('setcurrent', array('as' => 'months.setcurrent', 'uses' => 'MonthController@setToCurrent'));
});
Route::group(array('prefix' => 'positions'), function () {
    Route::get('/', array('as' => 'positions', 'uses' => 'PositionController@indexWithoutParam'));
    Route::get('index', array('as' => 'positions.list', 'uses' => 'PositionController@indexWithoutParam'));
    Route::get('create', array('as' => 'positions.create', 'uses' => 'PositionController@create'));
    Route::get('edit/{id}', array('as' => 'positions.edit', 'uses' => 'PositionController@edit'));
    Route::get('export/{type}', array('as' => 'positions.export', 'uses' => 'PositionController@export'));
    Route::get('index/filter/{param?}', array('as' => 'positions.list.param', 'uses' => 'PositionController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'positions.grid', 'uses' => 'PositionController@grid'));
    Route::post('mass-delete', array('as' => 'positions.mass-delete', 'uses' => 'PositionController@massDelete'));
    Route::post('mass-status', array('as' => 'positions.mass-status', 'uses' => 'PositionController@massStatus'));
    Route::post('save/{id?}', array('as' => 'positions.save', 'uses' => 'PositionController@save'));
    Route::get('delete/{id}', array('as' => 'positions.delete', 'uses' => 'PositionController@delete'));
    Route::GET('getlist', array('as' => 'positions.getlist', 'uses' => 'PositionController@getList'));

});
Route::group(array('prefix' => 'works'), function () {
    Route::get('/', array('as' => 'works', 'uses' => 'WorkController@indexWithoutParam'));
    Route::get('index', array('as' => 'works.list', 'uses' => 'WorkController@indexWithoutParam'));
    Route::get('create', array('as' => 'works.create', 'uses' => 'WorkController@create'));
    Route::get('edit/{id}', array('as' => 'works.edit', 'uses' => 'WorkController@edit'));
    Route::get('export/{type}', array('as' => 'works.export', 'uses' => 'WorkController@export'));
    Route::get('index/filter/{param?}', array('as' => 'works.list.param', 'uses' => 'WorkController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'works.grid', 'uses' => 'WorkController@grid'));
    Route::post('mass-delete', array('as' => 'works.mass-delete', 'uses' => 'WorkController@massDelete'));
    Route::post('mass-status', array('as' => 'works.mass-status', 'uses' => 'WorkController@massStatus'));
    Route::post('save/{id?}', array('as' => 'works.save', 'uses' => 'WorkController@save'));
    Route::get('delete/{id}', array('as' => 'works.delete', 'uses' => 'WorkController@delete'));
    Route::get('reviews', array('as' => 'works.getlist', 'uses' => 'WorkController@reviews'));
    Route::get('addnew', array('as' => 'works.addnew', 'uses' => 'WorkController@addNew'));


});
Route::group(array('prefix' => 'progress'), function () {
    Route::get('/', array('as' => 'progress', 'uses' => 'ProgressController@indexWithoutParam'));
    Route::get('index', array('as' => 'progress.list', 'uses' => 'ProgressController@indexWithoutParam'));
    Route::get('create', array('as' => 'progress.create', 'uses' => 'ProgressController@create'));
    Route::get('edit/{id}', array('as' => 'progress.edit', 'uses' => 'ProgressController@edit'));
    Route::get('export/{type}', array('as' => 'progress.export', 'uses' => 'ProgressController@export'));
    Route::get('index/filter/{param?}', array('as' => 'progress.list.param', 'uses' => 'ProgressController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'progress.grid', 'uses' => 'ProgressController@grid'));
    Route::post('mass-delete', array('as' => 'progress.mass-delete', 'uses' => 'ProgressController@massDelete'));
    Route::post('mass-status', array('as' => 'progress.mass-status', 'uses' => 'ProgressController@massStatus'));
    Route::post('save/{id?}', array('as' => 'progress.save', 'uses' => 'ProgressController@save'));
    Route::get('delete/{id}', array('as' => 'progress.delete', 'uses' => 'ProgressController@delete'));
    Route::get('reviews', array('as' => 'progress.getlist', 'uses' => 'ProgressController@reviews'));
    Route::get('addnew', array('as' => 'progress.addnew', 'uses' => 'ProgressController@addNew'));


});
Route::group(array('prefix' => 'qualities'), function () {
    Route::get('/', array('as' => 'qualities', 'uses' => 'QualityController@indexWithoutParam'));
    Route::get('index', array('as' => 'qualities.list', 'uses' => 'QualityController@indexWithoutParam'));
    Route::get('create', array('as' => 'qualities.create', 'uses' => 'QualityController@create'));
    Route::get('edit/{id}', array('as' => 'qualities.edit', 'uses' => 'QualityController@edit'));
    Route::get('export/{type}', array('as' => 'qualities.export', 'uses' => 'QualityController@export'));
    Route::get('index/filter/{param?}', array('as' => 'qualities.list.param', 'uses' => 'QualityController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'qualities.grid', 'uses' => 'QualityController@grid'));
    Route::post('mass-delete', array('as' => 'qualities.mass-delete', 'uses' => 'QualityController@massDelete'));
    Route::post('mass-status', array('as' => 'qualities.mass-status', 'uses' => 'QualityController@massStatus'));
    Route::post('save/{id?}', array('as' => 'qualities.save', 'uses' => 'QualityController@save'));
    Route::get('delete/{id}', array('as' => 'qualities.delete', 'uses' => 'QualityController@delete'));
    Route::get('reviews', array('as' => 'qualities.getlist', 'uses' => 'QualityController@reviews'));
    Route::get('addnew', array('as' => 'qualities.addnew', 'uses' => 'QualityController@addNew'));

});
Route::group(array('prefix' => 'contributes'), function () {
    Route::get('/', array('as' => 'contributes', 'uses' => 'ContributeController@indexWithoutParam'));
    Route::get('index', array('as' => 'contributes.list', 'uses' => 'ContributeController@indexWithoutParam'));
    Route::get('create', array('as' => 'contributes.create', 'uses' => 'ContributeController@create'));
    Route::get('edit/{id}', array('as' => 'contributes.edit', 'uses' => 'ContributeController@edit'));
    Route::get('export/{type}', array('as' => 'contributes.export', 'uses' => 'ContributeController@export'));
    Route::get('index/filter/{param?}', array('as' => 'contributes.list.param', 'uses' => 'ContributeController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'contributes.grid', 'uses' => 'ContributeController@grid'));
    Route::post('mass-delete', array('as' => 'contributes.mass-delete', 'uses' => 'ContributeController@massDelete'));
    Route::post('mass-status', array('as' => 'contributes.mass-status', 'uses' => 'ContributeController@massStatus'));
    Route::post('save/{id?}', array('as' => 'contributes.save', 'uses' => 'ContributeController@save'));
    Route::get('delete/{id}', array('as' => 'contributes.delete', 'uses' => 'ContributeController@delete'));
    Route::get('reviews', array('as' => 'contributes.getlist', 'uses' => 'ContributeController@reviews'));
    Route::get('addnew', array('as' => 'contributes.addnew', 'uses' => 'ContributeController@addNew'));

});
Route::group(array('prefix' => 'dignities'), function () {
    Route::get('/', array('as' => 'dignities', 'uses' => 'DignityController@indexWithoutParam'));
    Route::get('index', array('as' => 'dignities.list', 'uses' => 'DignityController@indexWithoutParam'));
    Route::get('create', array('as' => 'dignities.create', 'uses' => 'DignityController@create'));
    Route::get('edit/{id}', array('as' => 'dignities.edit', 'uses' => 'DignityController@edit'));
    Route::get('export/{type}', array('as' => 'dignities.export', 'uses' => 'DignityController@export'));
    Route::get('index/filter/{param?}', array('as' => 'dignities.list.param', 'uses' => 'DignityController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'dignities.grid', 'uses' => 'DignityController@grid'));
    Route::post('mass-delete', array('as' => 'dignities.mass-delete', 'uses' => 'DignityController@massDelete'));
    Route::post('mass-status', array('as' => 'dignities.mass-status', 'uses' => 'DignityController@massStatus'));
    Route::post('save/{id?}', array('as' => 'dignities.save', 'uses' => 'DignityController@save'));
    Route::get('delete/{id}', array('as' => 'dignities.delete', 'uses' => 'DignityController@delete'));
    Route::get('reviews', array('as' => 'dignities.getlist', 'uses' => 'DignityController@reviews'));
    Route::get('addnew', array('as' => 'dignities.addnew', 'uses' => 'DignityController@addNew'));

});
Route::group(array('prefix' => 'discriplines'), function () {
    Route::get('/', array('as' => 'discriplines', 'uses' => 'DiscriplineController@indexWithoutParam'));
    Route::get('index', array('as' => 'discriplines.list', 'uses' => 'DiscriplineController@indexWithoutParam'));
    Route::get('create', array('as' => 'discriplines.create', 'uses' => 'DiscriplineController@create'));
    Route::get('edit/{id}', array('as' => 'discriplines.edit', 'uses' => 'DiscriplineController@edit'));
    Route::get('export/{type}', array('as' => 'discriplines.export', 'uses' => 'DiscriplineController@export'));
    Route::get('index/filter/{param?}', array('as' => 'discriplines.list.param', 'uses' => 'DiscriplineController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'discriplines.grid', 'uses' => 'DiscriplineController@grid'));
    Route::post('mass-delete', array('as' => 'discriplines.mass-delete', 'uses' => 'DiscriplineController@massDelete'));
    Route::post('mass-status', array('as' => 'discriplines.mass-status', 'uses' => 'DiscriplineController@massStatus'));
    Route::post('save/{id?}', array('as' => 'discriplines.save', 'uses' => 'DiscriplineController@save'));
    Route::get('delete/{id}', array('as' => 'discriplines.delete', 'uses' => 'DiscriplineController@delete'));
    Route::get('reviews', array('as' => 'discriplines.getlist', 'uses' => 'DiscriplineController@reviews'));
    Route::get('addnew', array('as' => 'discriplines.addnew', 'uses' => 'DiscriplineController@addNew'));

});
/*
giao việc cho nhân viên
*/
Route::group(array('prefix' => 'staffs'), function () {
    Route::get('/', array('as' => 'staffs', 'uses' => 'StaffController@indexWithoutParam'));
    Route::get('index', array('as' => 'staffs.list', 'uses' => 'StaffController@indexWithoutParam'));
    Route::get('create', array('as' => 'staffs.create', 'uses' => 'StaffController@create'));
    Route::get('edit/{id}', array('as' => 'staffs.edit', 'uses' => 'StaffController@edit'));
    Route::get('export/{type}', array('as' => 'staffs.export', 'uses' => 'StaffController@export'));
    Route::get('index/filter/{param?}', array('as' => 'staffs.list.param', 'uses' => 'StaffController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'staffs.grid', 'uses' => 'StaffController@grid'));
    Route::post('mass-delete', array('as' => 'staffs.mass-delete', 'uses' => 'StaffController@massDelete'));
    Route::post('mass-status', array('as' => 'staffs.mass-status', 'uses' => 'StaffController@massStatus'));
    Route::post('save/{id?}', array('as' => 'staffs.save', 'uses' => 'StaffController@save'));
    Route::get('delete/{id}', array('as' => 'staffs.delete', 'uses' => 'StaffController@delete'));
    Route::get('reviews', array('as' => 'staffs.getlist', 'uses' => 'StaffController@reviews'));
    Route::get('job', array('as' => 'staffs.job', 'uses' => 'StaffController@job'));
    Route::get('job/grid/filter/{param?}', array('as' => 'staffs.job.grid', 'uses' => 'StaffController@gridJob'));
    Route::get('updatejob', array('as' => 'staffs.update', 'uses' => 'StaffController@updateJob'));
    Route::get('addnewjob', array('as' => 'staffs.update', 'uses' => 'StaffController@addNewJob'));
    Route::get('unexpected', array('as' => 'staffs.update', 'uses' => 'StaffController@unexpected'));
    Route::get('dictionary',array('as' => 'staffs.dictionary', 'uses' => 'StaffController@applyDictionary'));
    Route::get('month',array('as' => 'staffs.month', 'uses' => 'StaffController@applyMonth'));
    Route::get('deletejob',array('as' => 'staffs.month', 'uses' => 'StaffController@deleteJob'));
    Route::get('getbandanhgia',array('as' => 'staffs.month', 'uses' => 'StaffController@getBanDanhGia'));
    Route::get('updatejobname',array('as' => 'staffs.updatejobname', 'uses' => 'StaffController@updateJobName'));



});
/*
 * Đánh Giá Nhân Viên
 */

Route::group(array('prefix' => 'rates'), function () {
    Route::get('/', array('as' => 'rates', 'uses' => 'RateController@indexWithoutParam'));
    Route::get('index', array('as' => 'rates.list', 'uses' => 'RateController@indexWithoutParam'));
    Route::get('create', array('as' => 'rates.create', 'uses' => 'RateController@create'));
    Route::get('edit/{id}', array('as' => 'rates.edit', 'uses' => 'RateController@edit'));
    Route::get('export/{type}', array('as' => 'rates.export', 'uses' => 'RateController@export'));
    Route::get('index/filter/{param?}', array('as' => 'rates.list.param', 'uses' => 'RateController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'rates.grid', 'uses' => 'RateController@grid'));
    Route::post('mass-delete', array('as' => 'rates.mass-delete', 'uses' => 'RateController@massDelete'));
    Route::post('mass-status', array('as' => 'rates.mass-status', 'uses' => 'RateController@massStatus'));
    Route::post('save/{id?}', array('as' => 'rates.save', 'uses' => 'RateController@save'));
    Route::get('delete/{id}', array('as' => 'rates.delete', 'uses' => 'RateController@delete'));
    Route::get('reviews', array('as' => 'rates.getlist', 'uses' => 'RateController@reviews'));
    Route::get('job', array('as' => 'rates.job', 'uses' => 'RateController@job'));
    Route::get('job/grid/filter/{param?}', array('as' => 'rates.job.grid', 'uses' => 'RateController@gridJob'));


    Route::get('updatejob', array('as' => 'rates.update', 'uses' => 'RateController@updateJob'));

    /* Tiến Độ*/
    Route::get('tiendo', array('as' => 'rates.tiendo', 'uses' => 'RateController@tienDo'));
    Route::get('tiendo/grid/filter/{param?}', array('as' => 'rates.tiendo.grid', 'uses' => 'RateController@gridTienDo'));
    Route::get('newtiendo', array('as' => 'rates.tiendo.new', 'uses' => 'RateController@newTienDo'));
    Route::get('updatetiendo', array('as' => 'rates.tiendo.update', 'uses' => 'RateController@updateTienDo'));
    Route::get('deletetiendo', array('as' => 'rates.tiendo.update', 'uses' => 'RateController@deleteTienDo'));

    /* Chất Lượng Công Việc*/

    Route::get('chatluong', array('as' => 'rates.chatluong', 'uses' => 'RateController@chatLuong'));
    Route::get('chatluong/grid/filter/{param?}', array('as' => 'rates.chatluong.grid', 'uses' => 'RateController@gridChatLuong'));
    Route::get('newchatluong', array('as' => 'rates.chatluong.new', 'uses' => 'RateController@newChatLuong'));
    Route::get('updatechatluong', array('as' => 'rates.chatluong.update', 'uses' => 'RateController@updateChatLuong'));
    Route::get('deletechatluong', array('as' => 'rates.chatluong.update', 'uses' => 'RateController@deleteChatLuong'));

    /*
     *  Kỷ Luật Lao Động
     */
    Route::get('kyluat', array('as' => 'rates.kyluat', 'uses' => 'RateController@kyLuat'));
    Route::get('kyluat/grid/filter/{param?}', array('as' => 'rates.kyluat.grid', 'uses' => 'RateController@gridKyLuat'));
    Route::get('newkyluat', array('as' => 'rates.kyluat.new', 'uses' => 'RateController@newKyLuat'));
    Route::get('updatekyluat', array('as' => 'rates.kyluat.update', 'uses' => 'RateController@updateKyLuat'));
    Route::get('deletekyluat', array('as' => 'rates.kyluat.update', 'uses' => 'RateController@deleteKyLuat'));
    /*
     * Phẩm Chất Cá Nhân
     */
    Route::get('phamchat', array('as' => 'rates.phamchat', 'uses' => 'RateController@phamChat'));
    Route::get('phamchat/grid/filter/{param?}', array('as' => 'rates.phamchat.grid', 'uses' => 'RateController@gridPhamChat'));
    Route::get('newphamchat', array('as' => 'rates.phamchat.new', 'uses' => 'RateController@newPhamChat'));
    Route::get('updatephamchat', array('as' => 'rates.phamchat.update', 'uses' => 'RateController@updatePhamChat'));
    Route::get('deletephamchat', array('as' => 'rates.phamchat.update', 'uses' => 'RateController@deletePhamChat'));

    /*
     * Đóng Góp
     */

    Route::get('donggop', array('as' => 'rates.donggop', 'uses' => 'RateController@dongGop'));
    Route::get('donggop/grid/filter/{param?}', array('as' => 'rates.donggop.grid', 'uses' => 'RateController@gridDongGop'));
    Route::get('newdonggop', array('as' => 'rates.donggop.new', 'uses' => 'RateController@newDongGop'));
    Route::get('updatedonggop', array('as' => 'rates.donggop.update', 'uses' => 'RateController@updateDongGop'));
    Route::get('deletedonggop', array('as' => 'rates.donggop.update', 'uses' => 'RateController@deleteDongGop'));

    Route::get('updatecheckbox', array('as' => 'rates.donggop.update', 'uses' => 'RateController@updateCheckbox'));
    Route::get('getstatus', array('as' => 'rates.donggop.update', 'uses' => 'RateController@getstatusDanhGia'));
    Route::get('isupdate', array('as' => 'rates.donggop.update', 'uses' => 'RateController@isUpdate'));

});


Route::group(array('prefix' => 'self-rates'), function () {
    Route::get('/', array('as' => 'self_rates', 'uses' => 'SelfRateController@indexWithoutParam'));
    Route::get('index', array('as' => 'self_rates.list', 'uses' => 'SelfRateController@indexWithoutParam'));
    Route::get('create', array('as' => 'self_rates.create', 'uses' => 'SelfRateController@create'));
    Route::get('edit/{id}', array('as' => 'self_rates.edit', 'uses' => 'SelfRateController@edit'));
    Route::get('export/{type}', array('as' => 'self_rates.export', 'uses' => 'SelfRateController@export'));
    Route::get('index/filter/{param?}', array('as' => 'self_rates.list.param', 'uses' => 'SelfRateController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'self_rates.grid', 'uses' => 'SelfRateController@grid'));
    Route::post('mass-delete', array('as' => 'self_rates.mass-delete', 'uses' => 'SelfRateController@massDelete'));
    Route::post('mass-status', array('as' => 'self_rates.mass-status', 'uses' => 'SelfRateController@massStatus'));
    Route::post('save/{id?}', array('as' => 'self_rates.save', 'uses' => 'SelfRateController@save'));
    Route::get('delete/{id}', array('as' => 'self_rates.delete', 'uses' => 'SelfRateController@delete'));
    Route::get('reviews', array('as' => 'self_rates.getlist', 'uses' => 'SelfRateController@reviews'));
    Route::get('job', array('as' => 'self_rates.job', 'uses' => 'SelfRateController@job'));
    Route::get('job/grid/filter/{param?}', array('as' => 'self_rates.job.grid', 'uses' => 'SelfRateController@gridJob'));


    Route::get('updatejob', array('as' => 'self_rates.update', 'uses' => 'SelfRateController@updateJob'));
    Route::get('addnewjob', array('as' => 'self_rates.update', 'uses' => 'SelfRateController@addNewJob'));
    Route::get('unexpected', array('as' => 'self_rates.update', 'uses' => 'SelfRateController@unexpected'));
    Route::get('dictionary',array('as' => 'self_rates.dictionary', 'uses' => 'SelfRateController@applyDictionary'));
    Route::get('month',array('as' => 'self_rates.month', 'uses' => 'SelfRateController@applyMonth'));
//    Route::get('kyluat', array('as' => 'self_rates.kyluat', 'uses' => 'SelfRateController@kyLuat'));
//    Route::get('kyluat/grid/filter/{param?}', array('as' => 'self_rates.kyluat.grid', 'uses' => 'SelfRateController@gridKyLuat'));
    Route::get('phamchat', array('as' => 'self_rates.phamchat', 'uses' => 'SelfRateController@phamChat'));
    Route::get('phamchat/grid/filter/{param?}', array('as' => 'self_rates.phamchat.grid', 'uses' => 'SelfRateController@gridPhamChat'));
   // Route::get('tiendo/grid/filter/{param?}', array('as' => 'self_rates.tiendo.grid', 'uses' => 'SelfRateController@gridTienDo'));
   // Route::get('chatluong', array('as' => 'self_rates.chatluong', 'uses' => 'SelfRateController@chatLuong'));
   // Routee::get('chatluong/grid/filter/{param?}', array('as' => 'self_rates.chatluong.grid', 'uses' => 'SelfRateController@gridChatLuong'));
    Route::get('donggop', array('as' => 'self_rates.donggop', 'uses' => 'SelfRateController@dongGop'));
    Route::get('donggop/grid/filter/{param?}', array('as' => 'self_rates.donggop.grid', 'uses' => 'SelfRateController@gridDongGop'));
    Route::get('congviecchuyenmon', array('as' => 'self_rates.congviecchuyenmon', 'uses' => 'SelfRateController@congViecChuyenMon'));
    Route::get('note', array('as' => 'self_rates.note', 'uses' => 'SelfRateController@note'));

    Route::get('tiendo', array('as' => 'self_rates.tiendo', 'uses' => 'SelfRateController@tienDo'));
    Route::get('tiendo/grid/filter/{param?}', array('as' => 'self_rates.tiendo.grid', 'uses' => 'SelfRateController@gridTiengDo'));
    Route::get('newtiendo', array('as' => 'self_rates.tiendo.new', 'uses' => 'SelfRateController@newTienDo'));
    Route::get('updatetiendo', array('as' => 'self_rates.tiendo.update', 'uses' => 'SelfRateController@updateTienDo'));
    Route::get('deletetiendo', array('as' => 'self_rates.tiendo.update', 'uses' => 'SelfRateController@deleteTienDo'));

    Route::get('chatluong', array('as' => 'self_rates.chatluong', 'uses' => 'SelfRateController@chatLuong'));
    Route::get('chatluong/grid/filter/{param?}', array('as' => 'self_rates.chatluong.grid', 'uses' => 'SelfRateController@gridChatLuong'));
    Route::get('newchatluong', array('as' => 'self_rates.chatluong.new', 'uses' => 'SelfRateController@newChatLuong'));
    Route::get('updatechatluong', array('as' => 'self_rates.chatluong.update', 'uses' => 'SelfRateController@updateChatLuong'));
    Route::get('deletechatluong', array('as' => 'self_rates.chatluong.update', 'uses' => 'SelfRateController@deleteChatLuong'));

    Route::get('kyluat', array('as' => 'self_rates.kyluat', 'uses' => 'SelfRateController@kyLuat'));
    Route::get('kyluat/grid/filter/{param?}', array('as' => 'self_rates.kyluat.grid', 'uses' => 'SelfRateController@gridKyLuat'));
    Route::get('newkyluat', array('as' => 'self_rates.kyluat.new', 'uses' => 'SelfRateController@newKyLuat'));
    Route::get('updatekyluat', array('as' => 'self_rates.kyluat.update', 'uses' => 'SelfRateController@updateKyLuat'));
    Route::get('deletekyluat', array('as' => 'self_rates.kyluat.update', 'uses' => 'SelfRateController@deleteKyLuat'));

    Route::get('phamchat', array('as' => 'self_rates.phamchat', 'uses' => 'SelfRateController@phamChat'));
    Route::get('phamchat/grid/filter/{param?}', array('as' => 'self_rates.phamchat.grid', 'uses' => 'SelfRateController@gridPhamChat'));
    Route::get('newphamchat', array('as' => 'self_rates.phamchat.new', 'uses' => 'SelfRateController@newPhamChat'));
    Route::get('updatephamchat', array('as' => 'self_rates.phamchat.update', 'uses' => 'SelfRateController@updatePhamChat'));
    Route::get('deletephamchat', array('as' => 'self_rates.phamchat.update', 'uses' => 'SelfRateController@deletePhamChat'));

    Route::get('donggop', array('as' => 'self_rates.donggop', 'uses' => 'SelfRateController@dongGop'));
    Route::get('donggop/grid/filter/{param?}', array('as' => 'self_rates.donggop.grid', 'uses' => 'SelfRateController@gridDongGop'));
    Route::get('newdonggop', array('as' => 'self_rates.donggop.new', 'uses' => 'SelfRateController@newDongGop'));
    Route::get('updatedonggop', array('as' => 'self_rates.donggop.update', 'uses' => 'SelfRateController@updateDongGop'));
    Route::get('deletedonggop', array('as' => 'self_rates.donggop.update', 'uses' => 'SelfRateController@deleteDongGop'));
    Route::get('getdiem', array('as' => 'self_rates.getdiem', 'uses' => 'SelfRateController@getDiem'));


});

Route::group(array('prefix' => 'job'), function () {
    Route::get('/', array('as' => 'job', 'uses' => 'JobController@indexWithoutParam'));
    Route::get('index', array('as' => 'job.list', 'uses' => 'JobController@indexWithoutParam'));
    Route::get('create', array('as' => 'job.create', 'uses' => 'JobController@create'));
    Route::get('edit/{id}', array('as' => 'job.edit', 'uses' => 'JobController@edit'));
    Route::get('export/{type}', array('as' => 'job.export', 'uses' => 'JobController@export'));
    Route::get('index/filter/{param?}', array('as' => 'job.list.param', 'uses' => 'JobController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'job.grid', 'uses' => 'JobController@grid'));
    Route::get('reviews', array('as' => 'staffs.getlist', 'uses' => 'JobController@reviews'));
    Route::get('/job', array('as' => 'job', 'uses' => 'JobController@Job'));
});


Route::group(array('prefix' => 'result'), function () {
    Route::get('/', array('as' => 'result', 'uses' => 'RateResultController@indexWithoutParam'));
    Route::get('index', array('as' => 'result.list', 'uses' => 'RateResultController@indexWithoutParam'));
    Route::get('create', array('as' => 'result.create', 'uses' => 'RateResultController@create'));
    Route::get('edit/{id}', array('as' => 'result.edit', 'uses' => 'RateResultController@edit'));
    Route::get('export', array('as' => 'result.export', 'uses' => 'RateResultController@export'));
    Route::get('index/filter/{param?}', array('as' => 'result.list.param', 'uses' => 'RateResultController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'result.grid', 'uses' => 'RateResultController@grid'));
    Route::get('reviews', array('as' => 'staffs.getlist', 'uses' => 'RateResultController@reviews'));
    Route::get('export-all', array('as' => 'result.export_all', 'uses' => 'RateResultController@exportAll'));
    Route::get('apply-all', array('as' => 'result.apply_all', 'uses' => 'RateResultController@applyAll'));
    Route::get('apply', array('as' => 'result.apply', 'uses' => 'RateResultController@apply'));
    Route::get('printketqua', array('as' => 'result.printketqua', 'uses' => 'RateResultController@printKetQua'));

});

Route::group(array('prefix' => 'classification'), function () {
    Route::get('/', array('as' => 'classification', 'uses' => 'ClassificationController@indexWithoutParam'));
    Route::get('index', array('as' => 'classification.list', 'uses' => 'ClassificationController@indexWithoutParam'));
    Route::get('create', array('as' => 'classification.create', 'uses' => 'ClassificationController@create'));
    Route::get('edit/{id}', array('as' => 'classification.edit', 'uses' => 'ClassificationController@edit'));
    Route::get('export', array('as' => 'classification.export', 'uses' => 'ClassificationController@export'));
    Route::get('index/filter/{param?}', array('as' => 'classification.list.param', 'uses' => 'ClassificationController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'classification.grid', 'uses' => 'ClassificationController@grid'));
    Route::get('reviews', array('as' => 'classification.getlist', 'uses' => 'ClassificationController@reviews'));
    Route::get('update', array('as' => 'classification.getlist', 'uses' => 'ClassificationController@updateXepLoai'));
    Route::get('export-all', array('as' => 'classification.export_all', 'uses' => 'ClassificationController@exportAll'));
});
Route::group(array('prefix' => 'my-acount'), function () {
    Route::get('/', array('as' => 'my_acount', 'uses' => 'MyAcountController@indexWithoutParam'));
    Route::post('', array('as' => 'my_acount.save', 'uses' => 'MyAcountController@save'));
});
Route::group(array('prefix' => 'notify'), function () {
    Route::get('/', array('as' => 'notify', 'uses' => 'NotifyController@indexWithoutParam'));
    Route::get('index', array('as' => 'notify.list', 'uses' => 'NotifyController@indexWithoutParam'));
    Route::get('create', array('as' => 'notify.create', 'uses' => 'NotifyController@create'));
    Route::get('edit/{id}', array('as' => 'notify.edit', 'uses' => 'NotifyController@edit'));
    Route::get('export/{type}', array('as' => 'notify.export', 'uses' => 'NotifyController@export'));
    Route::get('index/filter/{param?}', array('as' => 'notify.list.param', 'uses' => 'NotifyController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'notify.grid', 'uses' => 'NotifyController@grid'));
    Route::post('mass-delete', array('as' => 'notify.mass-delete', 'uses' => 'NotifyController@massDelete'));
    Route::post('mass-status', array('as' => 'notify.mass-status', 'uses' => 'NotifyController@massStatus'));
    Route::post('save/{id?}', array('as' => 'notify.save', 'uses' => 'NotifyController@save'));
    Route::get('delete/{id}', array('as' => 'notify.delete', 'uses' => 'NotifyController@delete'));
});

// Nhân vật tiêu biểu .
Route::group(array('prefix' => 'mvp'), function () {
    Route::get('/', array('as' => 'notify', 'uses' => 'NotifyController@indexWithoutParam'));
});

// vị trí công việc.

Route::group(array('prefix' => 'missions'), function () {
    Route::get('/', array('as' => 'missions', 'uses' => 'WorkMissionController@indexWithoutParam'));
    Route::get('index', array('as' => 'missions.list', 'uses' => 'WorkMissionController@indexWithoutParam'));
    Route::get('create', array('as' => 'missions.create', 'uses' => 'WorkMissionController@create'));
    Route::get('edit/{id}', array('as' => 'missions.edit', 'uses' => 'WorkMissionController@edit'));
    Route::get('export/{type}', array('as' => 'missions.export', 'uses' => 'WorkMissionController@export'));
    Route::get('index/filter/{param?}', array('as' => 'missions.list.param', 'uses' => 'WorkMissionController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'missions.grid', 'uses' => 'WorkMissionController@grid'));
    Route::post('mass-delete', array('as' => 'missions.mass-delete', 'uses' => 'WorkMissionController@massDelete'));
    Route::post('mass-status', array('as' => 'missions.mass-status', 'uses' => 'WorkMissionController@massStatus'));
    Route::post('save/{id?}', array('as' => 'missions.save', 'uses' => 'WorkMissionController@save'));
    Route::get('delete/{id}', array('as' => 'missions.delete', 'uses' => 'WorkMissionController@delete'));
    Route::get('getlist', array('as' => 'missions.getlist', 'uses' => 'WorkMissionController@getList'));

});
Route::group(array('prefix' => 'points'), function () {
    Route::get('/', array('as' => 'points', 'uses' => 'PointController@indexWithoutParam'));
    Route::get('index', array('as' => 'points.list', 'uses' => 'PointController@indexWithoutParam'));
    Route::get('create', array('as' => 'points.create', 'uses' => 'PointController@create'));
    Route::get('edit/{id}', array('as' => 'points.edit', 'uses' => 'PointController@edit'));
    Route::get('export/{type}', array('as' => 'points.export', 'uses' => 'PointController@export'));
    Route::get('index/filter/{param?}', array('as' => 'points.list.param', 'uses' => 'PointController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'points.grid', 'uses' => 'PointController@grid'));
    Route::post('mass-delete', array('as' => 'points.mass-delete', 'uses' => 'PointController@massDelete'));
    Route::post('mass-status', array('as' => 'points.mass-status', 'uses' => 'PointController@massStatus'));
    Route::post('save/{id?}', array('as' => 'points.save', 'uses' => 'PointController@save'));
    Route::get('delete/{id}', array('as' => 'points.delete', 'uses' => 'PointController@delete'));
    Route::get('getlist', array('as' => 'points.getlist', 'uses' => 'PointController@getList'));

});


Route::group(array('prefix' => 'mvps'), function () {
    Route::get('/', array('as' => 'mvps', 'uses' => 'MvpController@indexWithoutParam'));
    Route::get('index', array('as' => 'mvps.list', 'uses' => 'MvpController@indexWithoutParam'));
    Route::get('create', array('as' => 'mvps.create', 'uses' => 'MvpController@create'));
    Route::get('edit/{id}', array('as' => 'mvps.edit', 'uses' => 'MvpController@edit'));
    Route::get('export/{type}', array('as' => 'mvps.export', 'uses' => 'MvpController@export'));
    Route::get('index/filter/{param?}', array('as' => 'mvps.list.param', 'uses' => 'MvpController@index'));
    Route::get('grid/filter/{param?}', array('as' => 'mvps.grid', 'uses' => 'MvpController@grid'));
    Route::post('mass-delete', array('as' => 'mvps.mass-delete', 'uses' => 'MvpController@massDelete'));
    Route::post('mass-status', array('as' => 'mvps.mass-status', 'uses' => 'MvpController@massStatus'));
    Route::post('save/{id?}', array('as' => 'mvps.save', 'uses' => 'MvpController@save'));
    Route::get('addnew', array('as' => 'mvps.addnew', 'uses' => 'MvpController@addNew'));
    Route::get('delete/{id}', array('as' => 'mvps.delete', 'uses' => 'MvpController@delete'));
    Route::get('reviews', array('as' => 'mvps.reviews', 'uses' => 'MvpController@reviews'));

});