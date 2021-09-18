<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

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

Route::view('dashboard', 'dashboard')
	->name('dashboard')
	->middleware(['auth', 'verified']);

	Route::group(['middleware' => ['auth', 'verified']], function(){
		Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')
		->name('dashboard');
	
		Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
				Route::view('profile', 'profile.show');
			});
	});

	Route::resource('booking', BookingController::class);
