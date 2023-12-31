<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome')->with(['event' => \App\Models\Event::active()]);
});

Route::prefix('invite/{guest:key}')
    ->name('invite.')
    ->group(function () {
        Route::get('/', [GuestController::class, 'show'])->name('show');
        Route::get('accept', [GuestController::class, 'accept'])->name('accept');
        Route::get('decline', [GuestController::class, 'decline'])->name('decline');
    });
