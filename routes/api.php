    <?php

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

    Route::get('/send-email', [AppointmentController::class, 'sendEmail'])->name('send.email');

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });