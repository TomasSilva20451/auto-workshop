<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ServiceHistoryController;
use App\Http\Controllers\AppointmentController;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Rest of the routes

// appointments
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

// bookings
Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/bookings', [BookingController::class, 'index']);
Route::get('/bookings/{id}', [BookingController::class, 'show']);
Route::put('/bookings/{id}', [BookingController::class, 'update']);

// service-history
Route::post('/service-history', [ServiceHistoryController::class, 'store'])->name('service-history.store');
Route::get('/service-history/{vehicle_id}', [ServiceHistoryController::class, 'show'])->name('service-history.show');

// parts
Route::post('/parts', [PartController::class, 'store'])->name('parts.store');
Route::get('/parts', [PartController::class, 'index'])->name('parts.index');

// vehicles
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');

// dashboard 
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/real-time-sales', [DashboardController::class, 'realTimeSalesData']);
Route::get('/dashboard/visualizations', [DashboardController::class, 'generateVisualizations']);
Route::get('/dashboard/historical-data', [DashboardController::class, 'fetchHistoricalData']);

// real-time-sales-data
Route::get('/real-time-sales-data', [DashboardController::class, 'getRealTimeSalesData'])->name('real-time-sales-data');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/part', PartController::class);




/* 
Route::get('/test', function (Request $request) {
    
    //return User::all(); // find all
    //return User::find(1); // find id, number 1

    // find id 1, next params
     $user = User::find(1);
     return [
        'name' => $user->name,
        'email' =>$user->email,
        'created' =>$user->created_at
     ];
}); */