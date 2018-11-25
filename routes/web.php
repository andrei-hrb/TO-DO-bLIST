<?php

Route::get('/', 'TaskController@index')->name('index');
Route::get('/password', 'PasswordController@index');
Route::post('/tasks', 'TaskController@store');
Route::delete(' /tasks/{task}', 'TaskController@destroy');
Auth::routes();