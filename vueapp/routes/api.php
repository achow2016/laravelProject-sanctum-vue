<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;

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


Route::group(['middleware' => 'auth:sanctum'], function() {
	Route::post('/getData', 'App\Http\Controllers\SessionController@getData');
	Route::post('/logout', 'App\Http\Controllers\SessionController@logout');
	//chat
	Route::post('/getPosts', 'App\Http\Controllers\ChatController@getPosts');
	Route::post('/getReplies', 'App\Http\Controllers\ChatController@getReplies');
	Route::post('/makePostReply', 'App\Http\Controllers\ChatController@makePostReply');
	Route::post('/makePost', 'App\Http\Controllers\ChatController@makePost');
	//game
	Route::post('/createCharacter', 'App\Http\Controllers\CharacterController@createCharacter');
	//store
	Route::post('/getStoreItems', 'App\Http\Controllers\GameStoreController@getStoreItems');
	Route::post('/addCartItem', 'App\Http\Controllers\GameStoreController@addCartItem');
	Route::post('/removeCartItem', 'App\Http\Controllers\GameStoreController@removeCartItem');
	Route::post('/modifyCartItem', 'App\Http\Controllers\GameStoreController@modifyCartItem');
	Route::post('/checkout', 'App\Http\Controllers\GameStoreController@checkout');
});

Route::middleware('auth:sanctum')->get('/welcome', function (Request $request) {
    return $request->user();
});

Route::post('/resetPassword', 'App\Http\Controllers\RegistrationController@generateResetPasswordLink');
Route::post('register', 'App\Http\Controllers\RegistrationController@register');
Route::post('login', 'App\Http\Controllers\SessionController@login');
Route::get('logout', 'App\Http\Controllers\SessionController@logout');
