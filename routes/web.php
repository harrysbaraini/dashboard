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

Route::get('/', [DashboardController::class, 'show'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/switch/{dashboardId}', [DashboardController::class, 'switch'])
    ->middleware(['auth'])
    ->name('dashboard.switch');

require __DIR__.'/auth.php';
