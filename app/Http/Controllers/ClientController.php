<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    public function store(Request $request)
    {
        $client = new Client();
        $client->Name = $request->input('Name');
        $client->Address = $request->input('Address');
        $client->PhoneNumber = $request->input('PhoneNumber');
        $client->Email = $request->input('Email');
        $client->CreationDate = now();
        $client->Type = $request->input('Type');
        $client->save();

        return response()->json(['message' => 'Client created successfully'], 201);
    }

    public function show($id)
    {
        $client = Client::find($id);
        return response()->json($client);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->Name = $request->input('Name');
        $client->Address = $request->input('Address');
        $client->PhoneNumber = $request->input('PhoneNumber');
        $client->Email = $request->input('Email');
        $client->Type = $request->input('Type');
        $client->save();

        return response()->json(['message' => 'Client updated successfully']);
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return response()->json(['message' => 'Client deleted successfully']);
    }
}