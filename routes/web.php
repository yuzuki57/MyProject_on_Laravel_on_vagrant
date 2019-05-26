<?php

//use Symfony\Component\Routing\Annotation\Route;

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

Route::get('/home', function () {
    return view('home');
});


Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('auth.getRegister');
Route::post('auth/register', 'Auth\RegisterController@register')->name('auth.postRegister');

Route::get('/auth/login', 'Auth\LoginController@showLoginForm')->name('auth.getLogin');
Route::post('/auth/login', 'Auth\LoginController@login')->name('auth.postLogin');
Route::get('/auth/logout', 'Auth\LoginController@logout')->name('auth.getLogout');


Route::resource('/tweets', 'TweetController');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/user/{id}/profile', 'UserProfileController@show')->name('user_profile.show');
    Route::get('/user/{id}/profile/edit', 'UserProfileController@edit')->name('user_profile.edit');
    Route::match(['put', 'patch'],'/user/{user}/profile', 'UserProfileController@update')->name('user_profile.update');
});

Route::get('hash_tags/{id}/tweets', 'TweetController@showByHashTag')->name('hash_tags.tweets');
