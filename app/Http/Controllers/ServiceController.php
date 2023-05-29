<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return response()->json(['services' => $services], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ServiceID' => 'required|integer',
            'Name' => 'required|string',
            'BookingID' => 'required|integer',
            'VehicleID' => 'required|integer',
        ]);

        $service = Service::create($validatedData);

        return response()->json(['message' => 'Service created successfully', 'service' => $service], 201);
    }

    public function show(Service $service)
    {
        return response()->json(['service' => $service], 200);
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'ServiceID' => 'integer',
            'Name' => 'string',
            'BookingID' => 'integer',
            'VehicleID' => 'integer',
        ]);

        $service->update($validatedData);

        return response()->json(['message' => 'Service updated successfully', 'service' => $service], 200);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json(['message' => 'Service deleted successfully'], 200);
    }
}
