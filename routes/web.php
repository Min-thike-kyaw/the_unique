<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
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

// Route::get('/', function () {
//     return view('welcome');
// }


Auth::routes();

Route::resource('/post','PostController');
Route::resource('/category','CategoryController');

// Route::resource('/user','UserController');
Route::get('/authors/{user:name}','PublicController@author_show');
Route::get('/authors','PublicController@author_index');

Route::get('notification', 'NotificationController@index');
Route::post('/follower', 'FollowerController@store');
Route::get('/','PublicController@index');
Route::get('/articles','PublicController@article');
// Route::get('/', function(){
//     return view('public.public-layout');
// });
Route::get('/{category:name}/{post}','PublicController@show');
Route::get('/{category:name}','PublicController@category_show');





Route::get('/home', 'HomeController@index')->name('home');

