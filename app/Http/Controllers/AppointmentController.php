<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Booking;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the appointments.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $appointments = Appointment::all();

        return response()->json(['appointments' => $appointments], 200);
    }

    /**
     * Display the specified appointment.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        return response()->json(['appointment' => $appointment], 200);
    }
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
        /* 
        // Save the appointment details in the "Booking" table
        $booking = Booking::create([
            'appointment_id' => $appointment->id,
            'vehicle_id' => $request->input('vehicle_id'),
            'client_id' => $request->input('client_id'),
            'booking_date' => $request->input('date'),
            'booking_type' => $request->input('service_type'),
            'status' => 'pending',
        ]); */

        // Return a success response
        return response()->json(['message' => 'Appointment created successfully'], 201);
    }

    /**
     * Update the specified appointment in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        // Validate the updated appointment data
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'service_type' => 'required',
            'email' => 'required|email',
            'vehicle_id' => 'required|exists:vehicles,id',
            'client_id' => 'required|exists:clients,id',
        ]);

        // Check if there are any conflicting appointments for the updated date and time
        $conflictingAppointments = Appointment::where('id', '!=', $id)
            ->where('date', $request->input('date'))
            ->where('time', $request->input('time'))
            ->exists();

        if ($conflictingAppointments) {
            // Return a response indicating that the updated slot is not available
            return response()->json(['message' => 'The selected appointment slot is not available.'], 400);
        }

        // Update the appointment
        $appointment->update([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'service_type' => $request->input('service_type'),
            'email' => $request->input('email'),
        ]);

        // Return a success response
        return response()->json(['message' => 'Appointment updated successfully'], 200);
    }

    /**
     * Remove the specified appointment from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        // Delete the appointment
        $appointment->delete();

        // You can also delete associated bookings if necessary
        // $appointment->booking()->delete();

        return response()->json(['message' => 'Appointment deleted successfully'], 200);
    }

    /**
     * Send the appointment confirmation email.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    /* public function sendEmail(Request $request)
    {
        // This method is removed since you don't want to send emails
        return response()->json(['message' => 'Email functionality is not enabled'], 400);
    } */
}
