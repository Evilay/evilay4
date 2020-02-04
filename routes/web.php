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

/*Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('home','HomeController@index')->name('home');
Route::group(['middleware'=>['auth']], function(){
    Route::resource('users', 'UserController');
    Route::resource('role','RoleController');
    Route::resource('permissions','PermissionController');
});*/


Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index')->name('home');


/**
 * Маршруты авторизации – отключены
 */
Route::auth();
/**
 * Добавлены маршруты авторизации без регистрации
 */
//Auth::routes(['register' => false, 'reset' => true, 'verify' => true]);


Route::group(['middleware' => ['auth']], function () {
   // Route::get('users/{user}/logs', 'Users\UserController@logs')->name('users.logs');

    /**
     * Связь пользователя с ролями
     */
    Route::get('users/{user}/logs','UserController@logs')->name('users.logs');
    Route::delete('users/{user}/logsDestroy','UserController@logsDestroy')->name('users.logs.destroy');
    Route::delete('roles/mass-destroy','RoleController@massDestroy')->name('roles.mass.destroy');
    Route::get('users/{user}/roles', 'UserController@roles')->name('users.roles');
    Route::patch('users/{user}/roles', 'UserController@rolesUpdate')->name('users.roles.update');
    Route::get('users/{user}/password', 'UserController@password')->name('users.password');
    Route::patch('users/{user}/password', 'UserController@passwordUpdate')->name('users.password.update');
    Route::resource('users', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('permissions', 'PermissionController');
});






