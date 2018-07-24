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

use Illuminate\Http\Request;

  Route::get('/', 'WelcomeController@welcome');

  Route::get('/task', 'TaskController@index');
  Route::post('/task', 'TaskController@store');
  Route::delete('/task/{task}', 'TaskController@destroy');

  Route::get('auth/callback/{provider}', 'SocialAuthController@callback');
  Route::get('auth/redirect/{provider}', 'SocialAuthController@redirect');
