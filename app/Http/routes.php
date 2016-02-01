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

/**
 * API routing
 */

/**
 * WEB routing.
 */
Route::group(['middleware' => 'web'], function () {
    // Default routes.
    Route::get('/',                       ['as' => 'home', 'uses' => 'HomeController@index']);

    // Authencation routes
    Route::auth();

    // ACL routes.
    Route::get('acl',                     ['as' => 'acl',          'uses' => 'UserManagementController@userList']);
    Route::get('acl/block/{status}/{id}', ['as' => 'acl.block',    'uses' => 'UserManagementController@blockControl']);
    Route::get('banned',                  ['as' => 'acl.banned',   'uses' => 'UserManagementController@banMessage']);

    // Trips routes.
    Route::get('trips',                   ['as' => 'trips.index',  'uses' => 'tripController@index']);
    Route::get('trips/delete/{id}',       ['as' => 'trips.delete', 'uses' => 'tripController@delete']);
    Route::post('trips',                  ['as' => 'trips.create', 'uses' => 'tripController@insert']);
});
