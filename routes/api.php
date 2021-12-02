<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
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

Route::middleware('auth')->get('/user', function (Request $request) {
    
    return $request->user();

});

Route::get('/user-create', function (Request $request) {
	App\User::create([
		'name' => 'Rodel Duterte',
		'email' => 'api@digitalocean.com',
		'password' => Hash::make('password')
	]);

});


Route::post('/login', function () {

	$credentials = request()->only(['email', 'password']);
	$token = auth()->attempt($credentials);

	return $token;

});

Route::middleware('auth:api')->get('/me', function() {

	return auth()->user();

});

		

	

Route::post('/register/user', 'Auth\RegisterController@registeruser')
	->name('registeruser');
	



