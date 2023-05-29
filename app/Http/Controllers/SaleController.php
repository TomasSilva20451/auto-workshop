<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return response()->json(['sales' => $sales], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $sale = Sale::create([
            'name' => $validatedData['name'],
            'quantity' => $validatedData['quantity'],
            'price' => $validatedData['price'],
        ]);

        return response()->json(['message' => 'Sale created successfully', 'sale' => $sale], 201);
    }

    public function show(Sale $sale)
    {
        return response()->json(['sale' => $sale], 200);
    }

    public function update(Request $request, Sale $sale)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $sale->update([
            'name' => $validatedData['name'],
            'quantity' => $validatedData['quantity'],
            'price' => $validatedData['price'],
        ]);

        return response()->json(['message' => 'Sale updated successfully', 'sale' => $sale], 200);
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return response()->json(['message' => 'Sale deleted successfully'], 200);
    }
}