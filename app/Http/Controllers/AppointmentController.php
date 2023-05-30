<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Booking;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Store a newly created appointment in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Retrieve and validate appointment data
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'service_type' => 'required',
            'email' => 'required|email',
            'vehicle_id' => 'required|exists:vehicles,id',
            'client_id' => 'required|exists:clients,id',
        ]);

        // Check if there are any conflicting appointments for the selected date and time
        $conflictingAppointments = Appointment::where('date', $request->input('date'))
            ->where('time', $request->input('time'))
            ->exists();

        if ($conflictingAppointments) {
            // Return a response indicating that the selected slot is not available
            return response()->json(['message' => 'The selected appointment slot is not available.'], 400);
        }

        // Create a new appointment
        $appointment = Appointment::create([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'service_type' => $request->input('service_type'),
            'email' => $request->input('email'),
        ]);

        // Save the appointment details in the "Booking" table
        $booking = Booking::create([
            'appointment_id' => $appointment->id,
            'vehicle_id' => $request->input('vehicle_id'),
            'client_id' => $request->input('client_id'),
            'booking_date' => $request->input('date'),
            'booking_type' => $request->input('service_type'),
            'status' => 'pending',
        ]);

        // Return a success response
        return response()->json(['message' => 'Appointment created successfully'], 201);
    }

    /**
     * Send the appointment confirmation email.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmail(Request $request)
    {
        // This method is removed since you don't want to send emails
        return response()->json(['message' => 'Email functionality is not enabled'], 400);
    }
}