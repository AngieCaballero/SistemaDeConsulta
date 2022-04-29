<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'Controller@holiis');
Route::post('/login', 'LoginController@logIn');

Route::group(['middleware' => ['login']], function() {

    Route::get('/getUser', 'LoginController@getUser');
    Route::get('/getEstudiantes', 'DatosController@getEstudiantes');
    Route::get('/getPostgrados', 'DatosController@getPostgrados');
    Route::get('/getTrabajadores', 'DatosController@getTrabajadores');

});

Route::group(['middleware' => ['admin']], function() {

    Route::post('/createUser', 'UsersController@createUser');
    Route::get('/getUsers', 'UsersController@getUsers');
    Route::post('/editUser', 'UsersController@editUser');
    Route::get('/deletetUser/{id}', 'UsersController@deleteUser');
    Route::get('/changeAdmin/{id}', 'UsersController@changeAdmin');

});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});


