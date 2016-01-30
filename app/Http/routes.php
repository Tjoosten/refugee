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

Route::get('/', function () {

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
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('acl', [
        'as' => 'acl', 'uses' => 'UserManagementController@userList'
    ]);
    Route::get('acl/block/{status}/{id}', [
        'as' => 'acl.block', 'uses' => 'UserManagementController@blockControl'
    ]);
    Route::get('/banned', [
       'as' => 'acl.banned', 'uses' => 'UserManagementController@banMessage'
    ]);
    Route::get('/', 'HomeController@index');
});
