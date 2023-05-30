<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ServiceHistoryController;
use App\Http\Controllers\AppointmentController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PartOrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;




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
Route::prefix('appointments')->group(function () {
    Route::post('/', [AppointmentController::class, 'store']);
   /*  Route::post('/send-email', [AppointmentController::class, 'sendEmail']); */
});

// bookings
Route::get('/bookings', [BookingController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/bookings/{id}', [BookingController::class, 'show']);
Route::put('/bookings/{id}', [BookingController::class, 'update']);
Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);

// clients
Route::get('/clients', [ClientController::class, 'index']);
Route::post('/clients', [ClientController::class, 'store']);
Route::get('/clients/{id}', [ClientController::class, 'show']);
Route::put('/clients/{id}', [ClientController::class, 'update']);
Route::delete('/clients/{id}', [ClientController::class, 'destroy']);

// invoices
Route::get('/invoices', [InvoiceController::class, 'index']);
Route::post('/invoices', [InvoiceController::class, 'store']);
Route::get('/invoices/{invoice}', [InvoiceController::class, 'show']);
Route::put('/invoices/{invoice}', [InvoiceController::class, 'update']);
Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy']);

// part_orders
Route::get('/part_orders', [PartOrderController::class, 'index']);
Route::post('/part_orders', [PartOrderController::class, 'store']);
Route::get('/part_orders/{partOrder}', [PartOrderController::class, 'show']);
Route::put('/part_orders/{partOrder}', [PartOrderController::class, 'update']);
Route::delete('/part_orders/{partOrder}', [PartOrderController::class, 'destroy']);

// parts
Route::get('/parts', [PartController::class, 'index']);
Route::post('/parts', [PartController::class, 'store']);
Route::get('/parts/{part}', [PartController::class, 'show']);
Route::put('/parts/{part}', [PartController::class, 'update']);
Route::delete('/parts/{part}', [PartController::class, 'destroy']);

// payments
Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payments', [PaymentController::class, 'store']);
Route::get('/payments/{payment}', [PaymentController::class, 'show']);
Route::put('/payments/{payment}', [PaymentController::class, 'update']);
Route::delete('/payments/{payment}', [PaymentController::class, 'destroy']);

// purchase_orders
Route::get('/purchase_orders', [PurchaseOrderController::class, 'index']);
Route::post('/purchase_orders', [PurchaseOrderController::class, 'store']);
Route::get('/purchase_orders/{id}', [PurchaseOrderController::class, 'show']);
Route::put('/purchase_orders/{id}', [PurchaseOrderController::class, 'update']);
Route::delete('/purchase_orders/{id}', [PurchaseOrderController::class, 'destroy']);

// sales
Route::get('/sales', [SaleController::class, 'index']);
Route::post('/sales', [SaleController::class, 'store']);
Route::get('/sales/{sale}', [SaleController::class, 'show']);
Route::put('/sales/{sale}', [SaleController::class, 'update']);
Route::delete('/sales/{sale}', [SaleController::class, 'destroy']);

// service_histories
Route::post('/service-histories', [ServiceHistoryController::class, 'store']);
Route::get('/service-histories/{vehicleId}', [ServiceHistoryController::class, 'show']);

// services
Route::get('/services', [ServiceController::class, 'index']);
Route::post('/services', [ServiceController::class, 'store']);
Route::get('/services/{service}', [ServiceController::class, 'show']);
Route::put('/services/{service}', [ServiceController::class, 'update']);
Route::delete('/services/{service}', [ServiceController::class, 'destroy']);

// vehicles
Route::get('/vehicles', [VehicleController::class, 'index']);
Route::post('/vehicles', [VehicleController::class, 'store']);

/* --------------//-------------- */

// dashboard 
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/real-time-sales-data', [DashboardController::class, 'realTimeSalesData']);
Route::get('/dashboard/generate-visualizations', [DashboardController::class, 'generateVisualizations']);
Route::get('/dashboard/fetch-historical-data', [DashboardController::class, 'fetchHistoricalData']);

// profile
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.delete');
});

/* --------------//-------------- */

// real-time-sales-data
Route::get('/real-time-sales-data', [DashboardController::class, 'getRealTimeSalesData'])->name('real-time-sales-data');

/* --------------//-------------- */

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/part', PartController::class)->middleware('auth:sanctum');

Route::post('/tokens/create', function (Request $request) {
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ]);
    
    $user = User::whereEmail($request->email)->first();
  
    if($user){
        $token = $user->createToken('part');
        return ['token' => $token->plainTextToken];
    }
});



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