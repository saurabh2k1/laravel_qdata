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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');



// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Route::get('users', 'UserController@showAll')->name('users');

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','RoleController');

    Route::resource('users','UserController');

    Route::resource('sites', 'SiteController');

    Route::resource('studies', 'StudyController');
    
    Route::get('/admin/{user}/assignsite', 'AssignStudySite@ShowAssign')->name('assignUser');
    Route::put('/admin/{user}/assignsite', 'AssignStudySite@Assign')->name('assignUser');

});