<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware'=>['auth']],function ()
{
    Route::get('/home', 'UserController@index')->name('home');

    #################### StartAlbum Routes ####################
    Route::get('/albums', 'AlbumController@index');
    Route::get('/album-create','AlbumController@create');
    Route::post('/album-store','AlbumController@store');
    Route::get('/album-edit/{id}','AlbumController@edit');
    Route::post('/album-update/{id}','AlbumController@update');
    Route::get('/album-delete/{id}','AlbumController@destroy');
    Route::post('/album-move/{id}','AlbumController@move');
    #################### End Album Routes ####################

    #################### Start Picture Routes ####################
    Route::get('/pictures', 'PictureController@index');
    Route::get('/picture-create','PictureController@create');
    Route::post('/picture-store','PictureController@store');
    Route::get('/picture-edit/{id}','PictureController@edit');
    Route::post('/picture-update/{id}','PictureController@update');
    Route::get('/picture-delete/{id}','PictureController@destroy');
    #################### End Picture Routes ####################
});


