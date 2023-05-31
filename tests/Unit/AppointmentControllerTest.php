<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\AppointmentController;
use App\Models\Appointment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class AppointmentControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test storing a newly created appointment.
     *
     * @return void
     */
    public function testStoreAppointment()
    {
        // Create a fake appointment request data
        $requestData = [
            'date' => '2023-12-22',
            'time' => '10:00 AM',
            'service_type' => 'Sample',
            'email' => 'example@example.com',
            /* 'vehicle_id' => 2,
            'client_id' => 2, */
        ];

        // Send a POST request to the store method of the AppointmentController
        $response = $this->postJson(route('appointments.store'), $requestData);

        // Assert that the response has a successful status code
        $response->assertStatus(201);

        // Assert that the appointment was created in the database
        $this->assertDatabaseHas('appointments', [
            'date' => $requestData['date'],
            'time' => $requestData['time'],
            'service_type' => $requestData['service_type'],
            'email' => $requestData['email'],
        ]);

        // Assert that the response contains the expected JSON message
        $response->assertJson(['message' => 'Appointment created successfully']);
    }

    // Trying to store an Existing Appointment 
    public function testValidateExistingAppointment()
    {
        // Create an existing appointment
        Appointment::create([
            'date' => '2023-08-01',
            'time' => '10:00 AM',
            'service_type' => 'Sample',
            'email' => 'existing@example.com',
        ]);

        // Create a fake appointment request data
        $requestData = [
            'date' => '2023-08-01',
            'time' => '10:00 AM',
            'service_type' => 'Sample',
            'email' => 'example@example.com',
        ];

        // Send a POST request to the store method of the AppointmentController
        $response = $this->postJson(route('appointments.store'), $requestData);

        // Assert that the response has a status code indicating a validation error
        $response->assertStatus(400);

        // Assert that the response contains the expected JSON message
        $response->assertJson(['message' => 'The selected appointment slot is not available.']);
    }
}