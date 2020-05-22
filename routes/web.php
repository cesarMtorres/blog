<?php

use Illuminate\Support\Facades\Route;
use App\User;

Route::get('/','GuestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::apiResource('entries', 'EntryController');

Route::apiResource('/tareas', 'API/HomeController');

//Route::get('/entries/create', 'EntryController@create');
Route::post('/entries', 'EntryController@store');

Route::get('/entries/{entryBySlug}', 'GuestController@show');

//->middleware('can:update,entry');
Route::get('/entries/{entry}/edit', 'EntryController@edit');
Route::put('/entries/{entry}', 'EntryController@update');


Route::get('/@{user}', 'UserController@show'); 

Route::apiResource('thoughts', 'ThoughtController');


