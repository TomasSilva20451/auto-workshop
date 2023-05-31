<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class VehicleControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test storing a newly created vehicle with a future manufacturing date.
     *
     * @return void
     */
    public function testStoreVehicleWithFutureManufacturingDate()
    {
        // Create a fake vehicle with a future manufacturing date
        $requestData = [
            'make' => 'Toyota',
            'model' => 'Camry',
            'year' => 2030, //  manufacturing date in the future
            'price' => 25000,
            'status' => 'available',
        ];

        // Send a POST request to the store method of the VehicleController
        $response = $this->postJson(route('vehicles.store'), $requestData);

        // Assert that the response has a validation error status code
        $response->assertStatus(422);

        // Assert that the response contains the expected validation error message
        $response->assertJsonValidationErrors(['year']);
    }
}
