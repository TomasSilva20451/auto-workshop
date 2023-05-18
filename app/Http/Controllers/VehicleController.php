<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicle::query();

        // Apply search filters
        if ($request->has('make')) {
            $query->where('make', $request->input('make'));
        }

        if ($request->has('model')) {
            $query->where('model', $request->input('model'));
        }

        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        // Apply additional filters or sorting as needed

        $vehicles = $query->get();

        return response()->json(['vehicles' => $vehicles], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);

        $vehicle = Vehicle::create($request->all());

        return response()->json(['message' => 'Vehicle created successfully', 'vehicle' => $vehicle], 201);
    }
}
