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

Route::group( [ 'prefix' => 'auth', 'namespace' => 'Auth' ], function () {
    Route::post( 'login', 'AuthController@login' );
    Route::post( 'logout', 'AuthController@logout' );
    Route::post( 'refresh', 'AuthController@refresh' );
    Route::post( 'me', 'AuthController@me' );
    Route::post( 'register', 'AuthController@register' );
} );

Route::group( [ 'prefix' => 'snippets', 'namespace' => 'Snippets' ], function () {
    Route::get( '', 'SnippetController@index' );
    Route::get( 'me', 'SnippetController@mySnippets' );
    Route::post( '', 'SnippetController@store' );
    Route::get( '{snippet}', 'SnippetController@show' );
    Route::patch( '{snippet}', 'SnippetController@update' );
    Route::delete( '{snippet}', 'SnippetController@destroy' );


    Route::patch( '{snippet}/steps/{step}', 'StepController@update' );
    Route::delete( '{snippet}/steps/{step}', 'StepController@destroy' );
    Route::post( '{snippet}/steps', 'StepController@store' );
} );

Route::group( [ 'prefix' => 'users/{user}', 'namespace' => 'Users' ], function () {
    Route::get( '', 'UserController@show' );
    Route::get( 'snippets', 'SnippetController@index' );
    Route::patch( '', 'UserController@update' );

});
Route::get( 'keys/algolia', 'Keys\AlgoliaKeyController' );
