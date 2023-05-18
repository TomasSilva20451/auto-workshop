<?php

namespace Tests\Unit;

use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Create some sample bookings in the database
        Booking::factory()->count(3)->create();

        // Make a GET request to the index method
        $response = $this->get('/bookings');

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains the expected data
        $response->assertJson(Booking::all()->toArray());
    }

    public function testStore()
    {
        // Prepare the request data for creating a booking
        $data = [
            'name' => 'John Doe',
            'date' => '2023-09-18',
            'time' => '09:00 AM'
        ];

        // Make a POST request to the store method with the request data
        $response = $this->post('/bookings', $data);

        // Assert that the response has a successful status code
        $response->assertStatus(201);

        // Assert that the booking was created successfully in the database
        $this->assertDatabaseHas('bookings', $data);
    }

    public function testShow()
    {
        // Create a sample booking in the database
        $booking = Booking::factory()->create();

        // Make a GET request to the show method with the booking ID
        $response = $this->get('/bookings/' . $booking->id);

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains the expected data for the booking
        $response->assertJson($booking->toArray());
    }

    public function testUpdate()
    {
        // Create a sample booking in the database
        $booking = Booking::factory()->create();

        // Prepare the request data for updating the booking
        $data = [
            'name' => 'Updated Name',
            'date' => '2023-09-20',
            'time' => '10:30 AM'
        ];

        // Make a PUT request to the update method with the booking ID and request data
        $response = $this->put('/bookings/' . $booking->id, $data);

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the booking was updated successfully in the database
        $this->assertDatabaseHas('bookings', $data);
    }

    public function testDestroy()
    {
        // Create a sample booking in the database
        $booking = Booking::factory()->create();

        // Make a DELETE request to the destroy method with the booking ID
        $response = $this->delete('/bookings/' . $booking->id);

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the booking was deleted from the database
        $this->assertDatabaseMissing('bookings', ['id' => $booking->id]);
    }
}
