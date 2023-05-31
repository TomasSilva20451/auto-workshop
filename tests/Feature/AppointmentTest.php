<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Appointment;

class AppointmentTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAppointment()
    {
        $appointmentData = [
            'date' => '2023-05-30',
            'time' => '09:00',
            'service_type' => 'Car Service',
            'email' => 'test@example.com',
        ];

        $response = $this->postJson('/api/appointments', $appointmentData);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Appointment created successfully',
            ]);

        $this->assertDatabaseHas('appointments', $appointmentData);
    }

    public function testGetAppointments()
    {
        // Create some dummy appointments in the database
        Appointment::factory()->count(3)->create();

        // Send a GET request to the /api/appointments route
        $response = $this->getJson('/api/appointments');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'appointments' => [
                    '*' => [
                        'id',
                        'date',
                        'time',
                        'service_type',
                        'email',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }
}