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

/**
 * Show Task Dashboard
 **/
Route::get('/', function () {
  return view('tasks');
});

/**
 * Add new Task
 **/
Route::post('/task', function (Request $request) {
  //
});

/**
 * Delete Task
 **/
Route::get('/task/{task}', function (Task $task) {
  //
});
