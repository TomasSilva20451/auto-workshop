<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return response()->json(['invoices' => $invoices], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'InvoiceID' => 'required',
            'BookingID' => 'required',
            'TotalPrice' => 'required|numeric',
            'CreationDate' => 'required|date',
            'PartOrderID' => 'nullable',
        ]);

        $invoice = Invoice::create([
            'InvoiceID' => $validatedData['InvoiceID'],
            'BookingID' => $validatedData['BookingID'],
            'TotalPrice' => $validatedData['TotalPrice'],
            'CreationDate' => $validatedData['CreationDate'],
            'PartOrderID' => $validatedData['PartOrderID'],
        ]);

        return response()->json(['message' => 'Invoice created successfully', 'invoice' => $invoice], 201);
    }

    public function show(Invoice $invoice)
    {
        return response()->json(['invoice' => $invoice], 200);
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validatedData = $request->validate([
            'InvoiceID' => 'required',
            'BookingID' => 'required',
            'TotalPrice' => 'required|numeric',
            'CreationDate' => 'required|date',
            'PartOrderID' => 'nullable',
        ]);

        $invoice->update([
            'InvoiceID' => $validatedData['InvoiceID'],
            'BookingID' => $validatedData['BookingID'],
            'TotalPrice' => $validatedData['TotalPrice'],
            'CreationDate' => $validatedData['CreationDate'],
            'PartOrderID' => $validatedData['PartOrderID'],
        ]);

        return response()->json(['message' => 'Invoice updated successfully', 'invoice' => $invoice], 200);
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return response()->json(['message' => 'Invoice deleted successfully'], 200);
    }
}