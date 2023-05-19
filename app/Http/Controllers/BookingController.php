<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return response()->json($bookings);
    }

    public function store(Request $request)
    {
        $booking = Booking::create([
            'BookingID' => $request->input('BookingID'),
            'VehicleID' => $request->input('VehicleID'),
            'ClientID' => $request->input('ClientID'),
            'BookingDate' => $request->input('BookingDate'),
            'BookingType' => $request->input('BookingType'),
            'Status' => $request->input('Status'),
            'CreationDate' => $request->input('CreationDate'),
            'CustomerID' => $request->input('CustomerID'),
            'created_at' => $request->input('created_at'),
            'updated_at' => $request->input('updated_at'),
            'appointment_id' => $request->input('appointment_id'),
            'vehicle_id' => $request->input('vehicle_id'),
            'client_id' => $request->input('client_id'),
            'booking_date' => $request->input('booking_date'),
            'booking_type' => $request->input('booking_type'),
        ]);

        return response()->json(['message' => 'Booking created successfully'], 201);
    }

    public function show($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return response()->json($booking);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->BookingID = $request->input('BookingID');
        $booking->VehicleID = $request->input('VehicleID');
        $booking->ClientID = $request->input('ClientID');
        $booking->BookingDate = $request->input('BookingDate');
        $booking->BookingType = $request->input('BookingType');
        $booking->Status = $request->input('Status');
        $booking->CreationDate = $request->input('CreationDate');
        $booking->CustomerID = $request->input('CustomerID');
        $booking->created_at = $request->input('created_at');
        $booking->updated_at = $request->input('updated_at');
        $booking->appointment_id = $request->input('appointment_id');
        $booking->vehicle_id = $request->input('vehicle_id');
        $booking->client_id = $request->input('client_id');
        $booking->booking_date = $request->input('booking_date');
        $booking->booking_type = $request->input('booking_type');

        $booking->save();

        return response()->json(['message' => 'Booking updated successfully']);
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully']);
    }
}
