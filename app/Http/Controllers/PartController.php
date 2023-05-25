<?php

namespace App\Http\Controllers;

// use App\Http\Requests\PartRequest;

use App\Http\Resources\PartResource;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
    /*     
        $parts = Part::all();
        return response()->json(['parts' => $parts], 200); */

        return PartResource::collection(Part::all());
        //return PartResource::collection(Part::paginate(3));
    }

    public function store(Request $request)
    {
        /* $part = new Part() ;
        $part->name = $request->name;
        $part->description = $request->description;
        $part->price = $request->price;
        $part->location = $request->location;
        $part->quantity = $request->quantity;
        $part->save();


        return $part; */


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

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Part $part)
    {

       /*  return [
            'name' => $part->name,
            'description' => $part->description,
            'price' => $part->price,
            'location' => $part->location,
            'quantity' => $part->quantity
        ]; */

        return new PartResource($part);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Part $part)
    {


        /*    $part->name = $request->name;
        $part->description = $request->description;
        $part->price = $request->price;
        $part->location = $request->location;
        $part->quantity = $request->quantity;
        $part->save();
 */

        $part->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'quantity' => $request->quantity
        ]);

        return $part;
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        $part->delete();

        return response('Sucessfully deleted');
    }
}