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
Route::get('publishers/{publisher}/books', 'PublisherController@getPublisherBooks');
Route::get('publishers/{publisher}/books/{book}', 'PublisherController@getPublisherBook');
Route::put('publishers/{publisher}/books/{book}', 'PublisherController@putPublisherBook');
Route::delete('publishers/{publisher}/books/{book}', 'PublisherController@deletePublisherBook');
$except = ['except' => ['create', 'edit']];
Route::resource('books', 'BookController', $except);
Route::resource('authors', 'AuthorController', $except);
Route::resource('publishers', 'PublisherController', $except);
Route::resource('publications', 'PublicationController', ['only' => ['index', 'show']]);
