    <?php

    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\VehicleController;
    use App\Http\Controllers\PartController;
    use App\Http\Controllers\ServiceHistoryController;
    use App\Http\Controllers\AppointmentController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "api" middleware group. Make something great!
    |
    */



    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    /*
    using the same ClientID and VehicleID
    clients > vehicles > appointments
    
    INSERT INTO clients (Name, Address, PhoneNumber, Email, CreationDate, Type)
    VALUES ('Tomas', 'Rua', '123123', 'tomas@gmail.com', CURRENT_TIMESTAMP, '1');

    INSERT INTO vehicles (make, model, year, price, status, ClientID, CreationDate)
    VALUES ('1', '2', '2020', '100000', '1', Last_Insert_Rowid(), CURRENT_TIMESTAMP);

    INSERT INTO appointments (date, time, service_type, VehicleID)
    VALUES ('2023-09-18', '09:00 AM', 'Change', Last_Insert_Rowid());
    */
    
    Route::post('/service-history', [ServiceHistoryController::class, 'store'])->name('service-history.store');
    Route::get('/service-history/{vehicle_id}', [ServiceHistoryController::class, 'show'])->name('service-history.show');

    Route::post('/parts', [PartController::class, 'store'])->name('parts.store');
    Route::get('/parts', [PartController::class, 'index'])->name('parts.index');

    Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');

    Route::get('/real-time-sales-data', function () {
        return response()->json(['message' => 'This route is for the real-time sales data view']);
    });

    Route::get('/send-email', [AppointmentController::class, 'sendEmail'])->name('send.email');

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });