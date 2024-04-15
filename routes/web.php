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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], static function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Routes for events
    Route::get('/events', App\Http\Controllers\Events\IndexEventsController::class)->name('events.index');
    Route::get('/events-create', App\Http\Controllers\Events\CreateEventsController::class)->name('events.create');
    Route::post('/events-store', App\Http\Controllers\Events\StoreEventsController::class)->name('events.store');
    Route::post('/events-cancel', App\Http\Controllers\Events\ChangeStatusEventsController::class)->name('events.cancel');
    Route::get('/events-attendees/{id}', App\Http\Controllers\Events\AttendeesEventsController::class)->name('events.attendees');


    //Routes for users
    Route::get('/users-create/{role}', App\Http\Controllers\Users\CreateUsersController::class)->name('users.create');
    Route::get('/users/{role}', App\Http\Controllers\Users\IndexUsersController::class)->name('users.index');
    Route::post('/users-store', App\Http\Controllers\Users\StoreUsersController::class)->name('users.store');
    Route::post('/users-validate-qr', App\Http\Controllers\Users\ValidateQrUsersController::class)->name('qr-message.validate');

    //Routes for scanner
    Route::get('/scanner-show', App\Http\Controllers\Scanner\ShowScannerController::class)->name('scanner.show');

    //Routes for Attendees
    Route::post('/attendee-change-pay-status', App\Http\Controllers\Attendee\ChangePayStatusController::class)->name('attendee.change-pay-status');


});

//Routes for users
Route::get('/records-events', App\Http\Controllers\Records\ShowEventsRecordsController::class)->name('records.events');
Route::get('/records-create/{pk}', App\Http\Controllers\Records\CreateRecordsController::class)->name('records.create');
Route::post('/records-store', App\Http\Controllers\Records\StoreRecordsController::class)->name('records.store');
