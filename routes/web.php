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


Route::get('login/vkontakte', 'Auth\LoginController@redirectToProvider');
Route::get('login/vkontakte/callback', 'Auth\LoginController@handleProviderCallback');


Route::group(['middleware' => ['auth']], function () {
   // Route::get('users/{user}/logs', 'Users\UserController@logs')->name('users.logs');

    Route::get('debug', 'HomeController@debug')->name('debug');

    /**
     * Связь пользователя с ролями
     */



    Route::resource('polls/{poll}/vote','Polls\PollVoteController');
   // Route::resource('article/{poll}/vote', 'ArticleController');
    Route::resource('polls/{poll}/result','Polls\PollValueController');
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
        //Route::resource('golosovanie', 'GolosController');
        Route::resource('polls','Polls\PollController');
        Route::resource('mirage','VkPolls\VkPollController');

    Route::get('vkauth', function (\ATehnix\VkClient\Auth $auth) {
        echo "<a href='{$auth->getUrl()}'> Войти через VK.Com </a><hr>";

        if (Request::exists('code')) {
            echo 'Token: '.$auth->getToken(Request::get('code'));
        }
    });



});






