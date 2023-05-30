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

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/real-time-sales-data', [DashboardController::class, 'realTimeSalesData']);
Route::get('/dashboard/generate-visualizations', [DashboardController::class, 'generateVisualizations']);
Route::get('/dashboard/fetch-historical-data', [DashboardController::class, 'fetchHistoricalData']);

// Rest of the routes


Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__ . '/auth.php';