<?php

namespace App\Http\Controllers;

use App\Models\ServiceHistory;
use Illuminate\Http\Request;

class ServiceHistoryController extends Controller
{
    /**
     * Store a newly created service history record in the database.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Retrieve and validate service history data
        $request->validate([
            'vehicle_id' => 'required|integer',
            'service_type' => 'required',
            'date' => 'required|date',
            'duration' => 'required|numeric',
            'cost' => 'required|numeric',
        ]);

        // Create a new service history record
        $serviceHistory = ServiceHistory::create([
            'vehicle_id' => $request->input('vehicle_id'),
            'service_type' => $request->input('service_type'),
            'date' => $request->input('date'),
            'duration' => $request->input('duration'),
            'cost' => $request->input('cost'),
        ]);

        // Return a success response
        return response()->json(['message' => 'Service history created successfully'], 201);
    }

    /**
     * Retrieve the service history records for a specific vehicle.
     *
     * @param  int  $vehicleId
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($vehicleId)
    {
        // Retrieve the service history records for the given vehicle ID
        $serviceHistory = ServiceHistory::where('vehicle_id', $vehicleId)->get();

        // Return the service history records
        return response()->json($serviceHistory);
    }
}
