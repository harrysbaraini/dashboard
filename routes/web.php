<?php

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\DashboardController;

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

Route::redirect('/', RouteServiceProvider::HOME);

Route::get('/dashboard', [DashboardController::class, 'show'])
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__.'/auth.php';
