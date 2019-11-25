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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function(){

    Route::get('/owners/create', 'OwnersController@create')->name('owners.create');
    Route::post('/owners', 'OwnersController@store')->name('owners.store');
    Route::get('/owners/{owner}', 'OwnersController@edit')->name('owners.edit');
    Route::patch('/owners/{owner}', 'OwnersController@update')->name('owners.update');
    Route::delete('/owners/{owner}', 'OwnersController@destroy')->name('owners.destroy');

    Route::get('/animals/{animal}', 'AnimalsController@show')->name('animals.show')->middleware('auth');
    Route::get('/animals/{animal}/edit', 'AnimalsController@edit')->name('animals.edit')->middleware('auth');


    Route::post('/animals/{animal}/matings', 'AnimalMatingsController@store')->name('matings.store');
    Route::get('/animals/{animal}/matings/edit', 'AnimalMatingsController@edit')->name('matings.edit');
    Route::patch('/animals/{animal}/matings/{mating}', 'AnimalMatingsController@update')->name('matings.update');
    Route::delete('/animals/{animal}/matings/{mating}', 'AnimalMatingsController@destroy')->name('matings.destroy');

    Route::post('/animals/{animal}/births', 'AnimalBirthsController@store')->name('births.store');
    Route::get('/animals/{animal}/births/edit', 'AnimalBirthsController@edit')->name('births.edit');
    Route::patch('/animals/{animal}/births/{birth}', 'AnimalBirthsController@update')->name('births.update');
    Route::delete('/animals/{animal}/births/{birth}', 'AnimalBirthsController@destroy')->name('births.destroy');


    Route::post('/animals/{animal}/exclusions', 'AnimalExclusionsController@store')->name('exclusions.store');
    Route::get('/animals/{animal}/exclusions/edit', 'AnimalExclusionsCOntroller@edit')->name('exclusions.edit');
    Route::patch('/animals/{animal}/exclusions/{exclusion}', 'AnimalExclusionsController@update')->name('exclusions.update');
    Route::delete('/animals/{animal}/exclusions/{exclusion}', 'AnimalExclusionsController@destroy')->name('exclusions.destroy');


    Route::get('/home', 'UsersController@home')->name('users.home');

});

Auth::routes();




