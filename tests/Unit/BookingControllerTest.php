<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\BookingController;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Mockery;
use Tests\TestCase;

class BookingControllerTest extends TestCase
{
    public function testIndex()
    {
        $mockedBookings = [
            Booking::factory()->create(),
            Booking::factory()->create(),
        ];

        $bookingMock = Mockery::mock(Booking::class);
        $bookingMock->shouldReceive('all')->andReturn($mockedBookings);

        $controller = new BookingController($bookingMock);
        $response = $controller->index();

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertCount(2, json_decode($response->getContent()));
    }

    public function testStore()
    {
        $request = new Request([
            'BookingID' => 1,
            'VehicleID' => 1,
            'ClientID' => 1,
            'BookingDate' => '2023-05-19',
            'BookingType' => 'Type A',
            'Status' => 'Active',
            'CreationDate' => '2023-05-19',
            'CustomerID' => 1,
            'created_at' => '2023-05-19',
            'updated_at' => '2023-05-19',
            'appointment_id' => 1,
            'vehicle_id' => 1,
            'client_id' => 1,
            'booking_date' => '2023-05-19',
            'booking_type' => 'Type A',
        ]);

        $bookingMock = Mockery::mock(Booking::class);
        $bookingMock->shouldReceive('create')->with($request->all())->andReturn($bookingMock);

        $controller = new BookingController($bookingMock);
        $response = $controller->store($request);

        $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
        $this->assertEquals('Booking created successfully', json_decode($response->getContent())->message);
    }

    public function testStoreWithInvalidData()
    {
        $this->expectException(ValidationException::class);

        $request = new Request();

        $controller = new BookingController();
        $controller->store($request);
    }

    public function testShow()
    {
        $bookingMock = Mockery::mock(Booking::class);
        $bookingMock->shouldReceive('find')->with(1)->andReturn($bookingMock);

        $controller = new BookingController($bookingMock);
        $response = $controller->show(1);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals($bookingMock, json_decode($response->getContent()));
    }

    public function testShowWithNonExistingBooking()
    {
        $bookingMock = Mockery::mock(Booking::class);
        $bookingMock->shouldReceive('find')->with(1)->andReturn(null);

        $controller = new BookingController($bookingMock);
        $response = $controller->show(1);

        $this->assertEquals(Response::HTTP_NOT_FOUND, $response->getStatusCode());
        $this->assertEquals('Booking not found', json_decode($response->getContent())->message);
    }

    public function testUpdate()
    {
        $request = new Request([
            'BookingID' => 1,
            'VehicleID' => 1,
            'ClientID' => 1,
            'BookingDate' => '2023-05-19',
            'BookingType' => 'Type A',
            'Status' => 'Active',
            'CreationDate' => '2023-05-19',
            'CustomerID' => 1,
            'created_at' => '2023-05-19',
            'updated_at' => '2023-05-19',
            'appointment_id' => 1,
            'vehicle_id' => 1,
            'client_id' => 1,
            'booking_date' => '2023-05-19',
            'booking_type' => 'Type A',
        ]);

        $bookingMock = Mockery::mock(Booking::class);
        $bookingMock->shouldReceive('find')->with(1)->andReturn($bookingMock);
        $bookingMock->shouldReceive('save')->once();

        $controller = new BookingController($bookingMock);
        $response = $controller->update($request, 1);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals('Booking updated successfully', json_decode($response->getContent())->message);
    }

    public function testUpdateWithNonExistingBooking()
    {
        $bookingMock = Mockery::mock(Booking::class);
        $bookingMock->shouldReceive('find')->with(1)->andReturn(null);

        $controller = new BookingController($bookingMock);
        $response = $controller->update(new Request(), 1);

        $this->assertEquals(Response::HTTP_NOT_FOUND, $response->getStatusCode());
        $this->assertEquals('Booking not found', json_decode($response->getContent())->message);
    }

    public function testDestroy()
    {
        $bookingMock = Mockery::mock(Booking::class);
        $bookingMock->shouldReceive('find')->with(1)->andReturn($bookingMock);
        $bookingMock->shouldReceive('delete')->once();

        $controller = new BookingController($bookingMock);
        $response = $controller->destroy(1);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals('Booking deleted successfully', json_decode($response->getContent())->message);
    }

    public function testDestroyWithNonExistingBooking()
    {
        $bookingMock = Mockery::mock(Booking::class);
        $bookingMock->shouldReceive('find')->with(1)->andReturn(null);

        $controller = new BookingController($bookingMock);
        $response = $controller->destroy(1);

        $this->assertEquals(Response::HTTP_NOT_FOUND, $response->getStatusCode());
        $this->assertEquals('Booking not found', json_decode($response->getContent())->message);
    }
}
