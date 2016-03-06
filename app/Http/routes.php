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

// TODO: clean up named routes.

/**
 * API routing.
 */
Route::group(['prefix' => 'api', 'middleware' => ['api', 'auth:api']], function () {

    // Misc routes.
    Route::get('/', 'apiController@index');

    // Profile routes.

    // Trips
    Route::get('/trips', 'apitripsController@index');
    Route::delete('/trips/{id}', 'apitripsController@delete');
});

/*
 * WEB routing.
 */
Route::group(['middleware' => 'web'], function () {
    // Default routes.
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

    // API routes.
    Route::post('/api/regenerate', ['as' => 'api.regenerate', 'uses' => 'aclController@changeApiCredentials']);
    Route::get('/api/docs/trips', ['as' => 'api.docs',       'uses' => 'apiController@docs']);
    Route::get('/api/docs', ['as' => 'api.docs.info',  'uses' => 'apiController@docs']);

    // Authencation routes
    Route::auth();

    // ACL routes.
    Route::get('acl', ['as' => 'acl',           'uses' => 'UserManagementController@userList']);
    Route::get('acl/block/{status}/{id}', ['as' => 'acl.block',     'uses' => 'UserManagementController@blockControl']);
    Route::get('acl/make/admin/{id}', ['as' => 'make.admin',    'uses' => 'UserManagementController@makeAdmin']);
    Route::get('acl/make/user/{id}', ['as' => 'make.user',     'uses' => 'userManagementController@makeUser']);
    Route::get('banned', ['as' => 'acl.banned',    'uses' => 'UserManagementController@banMessage']);

    // Collection points
    Route::get('points', ['as' => 'points.index',  'uses' => 'PointsController@index']);
    Route::post('points', ['as' => 'points.post',   'uses' => 'PointsController@insert']);
    Route::get('points/delete/{id}', ['as' => 'points.destroy', 'uses' => 'PointsController@destroy']);

    // Profile routes.
    Route::get('/profile', ['as' => 'profile',       'uses' => 'aclController@profile']);
    Route::get('/profile/edit', ['as' => 'profile.edit',  'uses' => 'aclController@changeUserCredentialsView']);
    Route::get('/profile/edit/api', ['as' => 'profile.api',   'uses' => 'aclController@changeApiCredentialsView']);
    Route::post('/profile/edit', ['as' => 'profile.post',  'uses' => 'aclController@changeCredentails']);
    Route::delete('/profile/delete/{id}', []);

    // Bug routes.
    Route::get('/bug', ['as' => 'bug.get',       'uses' => 'bugController@view']);
    Route::post('/bug', ['as' => 'bug.post',      'uses' => 'bugController@send']);

    // Trips routes.
    Route::get('trips/{selector}', ['as' => 'trips.index',   'uses' => 'tripController@index']);
    Route::get('trips/delete/{id}', ['as' => 'trips.delete',  'uses' => 'tripController@delete']);
    Route::get('trips/intrested/{id}', ['as' => 'trips.intrest', 'uses' => 'tripController@intrested']);
    Route::post('trips', ['as' => 'trips.create',  'uses' => 'tripController@insert']);
});
