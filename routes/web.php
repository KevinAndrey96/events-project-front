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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], static function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/events', App\Http\Controllers\Events\IndexEventsController::class)->name('events.index');
    Route::get('/events-create', App\Http\Controllers\Events\CreateEventsController::class)->name('events.create');
    Route::post('/events-store', App\Http\Controllers\Events\StoreEventsController::class)->name('events.store');
    Route::post('/events-cancel', App\Http\Controllers\Events\CancelEventsController::class)->name('events.cancel');

});
