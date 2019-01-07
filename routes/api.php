<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'Api'
], function ($router) {

    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('me', 'AuthController@me');
    $router->get('validate', 'AuthController@validateToken');

});

Route::group([
    'middleware' => 'api',
    'namespace' => 'Api'
], function ($router) {

    $router->apiResource('users', 'UserController');

    $router->apiResource('roles', 'RoleController');

    $router->apiResource('groups', 'GroupController');

    $router->apiResource('permissions', 'PermissionController');

    $router->put('profile','ProfileController@update');

    $router->get('activity','ActivityController@index');

    $router->get('activity/{activity}','ActivityController@show');

});
