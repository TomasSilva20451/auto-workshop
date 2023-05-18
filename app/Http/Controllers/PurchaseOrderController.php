<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrder::all();
        return response()->json($purchaseOrders);
    }

    public function store(Request $request)
    {
        // Logic for creating a new purchase order goes here

        return response()->json(['message' => 'Purchase order created successfully'], 201);
    }

    public function show($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        return response()->json($purchaseOrder);
    }

    public function update(Request $request, $id)
    {
        // Logic for updating a purchase order goes here

        return response()->json(['message' => 'Purchase order updated successfully']);
    }

    public function destroy($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        $purchaseOrder->delete();

        return response()->json(['message' => 'Purchase order deleted successfully']);
    }
}