<?php

namespace App\Http\Controllers;

use App\Models\PartOrder;
use Illuminate\Http\Request;

class PartOrderController extends Controller
{
    public function index()
    {
        return PartOrder::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'PartOrderID' => 'required',
            'BookingID' => 'required',
            'PartID' => 'required',
            'Quantity' => 'required',
            'CreationDate' => 'required|date',
            'PurchaseOrderID' => 'required',
            'ServiceID' => 'required',
            'part_id' => 'required',
        ]);

        $partOrder = PartOrder::create($validatedData);

        return response()->json(['message' => 'Part order created successfully', 'partOrder' => $partOrder], 201);
    }

    public function show(PartOrder $partOrder)
    {
        return $partOrder;
    }

    public function update(Request $request, PartOrder $partOrder)
    {
        $partOrder->update($request->all());

        return $partOrder;
    }

    public function destroy(PartOrder $partOrder)
    {
        $partOrder->delete();

        return response('Successfully deleted');
    }
}