<?php
use App\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::resource('post','PostController');
Route::post('gostei','PostController@AdicionarGostei');
Route::post('naogostei','PostController@AdicionarNaoGostei');
Route::post('comentar','PostController@AdicionarComentario');
Route::get('pesquisar','PostController@Pesquisar');
Route::post('pesquisar','PostController@Pesquisar');



Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('auth/facebook','Auth\RegisterController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\RegisterController@callbackFacebook');
Route::get('auth/google','Auth\RegisterController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\RegisterController@callbackGoogle');
Route::get('auth/twitter','Auth\RegisterController@redirectToTwitter');
Route::get('auth/twitter/callback', 'Auth\RegisterController@callbackTwitter');
Route::get('/redirect', 'Auth\RegisterController@redirect');
Route::get('/callback', 'Auth\RegisterController@callback');
