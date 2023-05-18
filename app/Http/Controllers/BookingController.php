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
        // Logic for creating a new booking goes here

        return response()->json(['message' => 'Booking created successfully'], 201);
    }

    public function show($id)
    {
        $booking = Booking::find($id);
        return response()->json($booking);
    }

    public function update(Request $request, $id)
    {
        // Logic for updating a booking goes here

        return response()->json(['message' => 'Booking updated successfully']);
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully']);
    }
}