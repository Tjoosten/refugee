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
Route::group(['middleware' => ['api', 'auth:api']], function() {

        Route::get('/api' ,       'apiController@index');

        // Profile routes.

        // Trips
        Route::get('/trips',   'apitripsController@index');
});

/**
 * WEB routing.
 */
Route::group(['middleware' => 'web'], function () {
    // Default routes.
    Route::get('/',                       ['as' => 'home', 'uses' => 'HomeController@index']);

    // Authencation routes
    Route::auth();

    // ACL routes.
    Route::get('acl',                     ['as' => 'acl',           'uses' => 'UserManagementController@userList']);
    Route::get('acl/block/{status}/{id}', ['as' => 'acl.block',     'uses' => 'UserManagementController@blockControl']);
    Route::get('acl/make/admin/{id}',     ['as' => 'make.admin',    'uses' => 'UserManagementController@makeAdmin']);
    Route::get('acl/make/user/{id}',      ['as' => 'make.user',     'uses' => 'userManagementController@makeUser']);
    Route::get('banned',                  ['as' => 'acl.banned',    'uses' => 'UserManagementController@banMessage']);

    // Profile routes.
    Route::get('/profile',                ['as' => 'profile',       'uses' => 'aclController@profile']);

    // Trips routes.
    Route::get('trips/{selector}',        ['as' => 'trips.index',   'uses' => 'tripController@index']);
    Route::get('trips/delete/{id}',       ['as' => 'trips.delete',  'uses' => 'tripController@delete']);
    Route::get('trips/intrested/{id}',    ['as' => 'trips.intrest', 'uses' => 'tripController@intrested']);
    Route::post('trips',                  ['as' => 'trips.create',  'uses' => 'tripController@insert']);
});
