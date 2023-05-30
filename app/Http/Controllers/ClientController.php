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
        $client->name = $request->input('name');
        $client->address = $request->input('address');
        $client->phone_number = $request->input('phone_number');
        $client->email = $request->input('email');
        $client->creation_date = now();
        $client->type = $request->input('type');
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
        $client->name = $request->input('name');
        $client->address = $request->input('address');
        $client->phone_number = $request->input('phone_number');
        $client->email = $request->input('email');
        $client->type = $request->input('type');
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