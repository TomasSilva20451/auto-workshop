<?php

use App\Http\Controllers\DashboardController;
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
Route::get('/dashboard/real-time-sales-data', [DashboardController::class, 'realTimeSalesData'])->name('dashboard.real-time-sales-data');
Route::get('/dashboard/generate-visualizations', [DashboardController::class, 'generateVisualizations'])->name('dashboard.generate-visualizations');
Route::get('/dashboard/fetch-historical-data', [DashboardController::class, 'fetchHistoricalData'])->name('dashboard.fetch-historical-data');

// Rest of the routes


Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';