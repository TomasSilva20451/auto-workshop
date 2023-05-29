<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return response()->json(['payments' => $payments], 200);
    }

    public function store(Request $request)
    {
        $payment = Payment::create($request->all());

        return response()->json(['message' => 'Payment created successfully', 'payment' => $payment], 201);
    }

    public function show(Payment $payment)
    {
        return response()->json(['payment' => $payment], 200);
    }

    public function update(Request $request, Payment $payment)
    {
        $payment->update($request->all());

        return response()->json(['message' => 'Payment updated successfully', 'payment' => $payment], 200);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return response()->json(['message' => 'Payment deleted successfully'], 200);
    }
}