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


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', function () {
      return view('welcome');
    });
    
    Route::get('/home', 'HomeController@index');

    //admin routes
    Route::group(['namespace' => 'Admin'], function() {
      Route::get('/admin', 'AdminController@panel');
    });

});

Route::post('/upload', array('as' => 'upload', 'uses' => 'UploaderController@upload'));

Route::get('/test', function () {
  $filename = 'bite';

  $files = [];
  $files['files'][] = ['url' => $filename];
  $files['files'][] = ['url' => $filename];

  return Response::json($files);

});






