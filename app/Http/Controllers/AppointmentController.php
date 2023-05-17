<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentConfirmation;
use App\Models\Appointment;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        // Send the appointment confirmation email
        Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment));

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
        // Retrieve the appointment details
        $appointment = Appointment::findOrFail($request->input('appointment_id'));

        // Send the appointment confirmation email
        Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment));

        // Return a success response
        return response()->json(['message' => 'Appointment confirmation email sent successfully'], 200);
    }
}
