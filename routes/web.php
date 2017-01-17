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

    Route::get( '/', function () {
        return redirect( '/posts' );
    } );


    Auth::routes();

    Route::get( '/home', 'HomeController@index' );

    Route::get( '/posts', 'PostController@index' );

    Route::get( '/create', 'PostController@create' );

    Route::post( '/store', 'PostController@store' );

    Route::get('/posts/delete/{id}', 'PostController@destroy');

    Route::get( '/posts/{id}', 'PostController@show' );

    Route::get( '/edit/{id}', 'PostController@edit' );

    Route::put( '/update/{id}', 'PostController@update' );
