<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Store a newly created appointment in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Retrieve and validate appointment data
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'service_type' => 'required',
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
        ]);

        // Return a success response
        return response()->json(['message' => 'Appointment created successfully'], 201);
    }
}
