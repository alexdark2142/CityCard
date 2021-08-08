<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardTypeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\TravelHistoryController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('login', [AuthController::class, "login"])->name('login');
Route::post('register', [AuthController::class, "registration"])->name('register');

Route :: group ([ 'middleware' => [ 'auth' ]], function () {
    Route::resource('{userId}/cards', CardController::class);
    Route::get('{cardId}/transaction', [TransactionController::class, 'index'])->name('transaction');
    Route::get('{cardId}/travel-history', [TravelHistoryController::class, 'index'])->name('travelHistory');
});

Route :: group ([ 'prefix' => 'admin'], function () {
    Route::resource( 'card-types' , CardTypeController::class );
    Route::resource( 'cities' , CityController::class );
    Route::resource('transports', TransportController::class);
});