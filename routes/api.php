    <?php

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
    Route::post('/appointments', [AppointmentController::class, 'store']);

    Route::post('/service-history', [ServiceHistoryController::class, 'store'])->name('service-history.store');
    Route::get('/service-history/{vehicle_id}', [ServiceHistoryController::class, 'show'])->name('service-history.show');


    Route::post('/parts', [PartController::class, 'store'])->name('parts.store');
    Route::get('/parts', [PartController::class, 'index'])->name('parts.index');


    Route::get('/parts', [PartController::class, 'index']);
    Route::post('/parts', [PartController::class, 'store']);


    Route::get('/vehicles', 'App\Http\Controllers\VehicleController@index')->name('vehicles.index');

    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');


    Route::get('/send-email', [AppointmentController::class, 'sendEmail'])->name('send.email');

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });