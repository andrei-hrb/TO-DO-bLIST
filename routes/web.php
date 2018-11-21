<?php

Route::get('/', 'TaskController@index');
Route::post('/tasks', 'TaskController@store');