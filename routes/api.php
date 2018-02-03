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
// Route::put('books/{book}/authors', 'BookController@linksAuthors');
$except = ['create', 'edit'];
Route::resource('books', 'BookController', $except);
Route::resource('authors', 'AuthorController', $except);
Route::resource('publishers', 'PublisherController', $except);
