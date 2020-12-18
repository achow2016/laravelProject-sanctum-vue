<?php

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

Route::get('/{any}', function(){
		return view('vueapp');
})->where('any', '.*');


/*
Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
	return view('welcome',
		[
			'title' => "My Rpg Game"
		]
	);
});

Route::get('/login', function () {
	return view('login',
		[
			'title' => "Login"
		]
	);
});

Route::get('/register', function () {
	return view('register',
		[
			'title' => "Register"
		]
	);
});
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
