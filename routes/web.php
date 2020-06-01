<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'MarkerController@index')->name('home');

Route::get('/chat', 'ChatController@index')->name('chat');
Route::get('chat/send-message', 'ChatController@sendMessage');

Route::group(['middleware' => 'auth', 'namespace' => 'Auth'], function () {
    Route::get('/profile', ['as' => 'auth.profile', 'uses' => 'ProfileController@profile']);
    Route::post('/profile/save', ['as' => 'profile.save', 'uses' => 'ProfileController@update']);
    Route::post('/profile/password', 'ProfileController@passwordChange')->name('profile-password');
});
/**
 * Валидация GET запросов в ресурсных контроллерах в файле RouteServiceProvider
 */
Route::group(['prefix' => 'admin',
    'middleware' => 'auth',
    'middleware' => 'access:admin',
    'namespace' => 'Admin'],
    function () {

    Route::resource('users', 'UserController');
    Route::resource('markers', 'MarkerController');
});
