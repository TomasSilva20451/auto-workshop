<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        $parts = Part::all();

        return response()->json(['parts' => $parts], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'location' => 'required',
            'quantity' => 'required|integer',
        ]);

        $part = Part::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'location' => $validatedData['location'],
            'quantity' => $validatedData['quantity'],
        ]);

        return response()->json(['message' => 'Part created successfully', 'part' => $part], 201);
    }
}
