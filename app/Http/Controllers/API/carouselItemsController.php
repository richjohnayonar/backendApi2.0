<?php

namespace App\Http\Controllers\API;

use App\Models\carouselItems;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\carouselItemsRequest;

class carouselItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return carouselItems::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(carouselItemsRequest $request)
    {

    // $carouselItem = new carouselItems;

    // $carouselItem->carousel_name = $request->input('carousel_name');
    // $carouselItem->image_path = $request->input('image_path');
    // $carouselItem->description = $request->input('description');
    // $carouselItem->user_id = $request->input('user_id');
    
    // $carouselItem->save(); 
     $validated = $request -> validated();

     $carouselItem = carouselItems::create($validated);

    return response()->json(['message' => 'Record inserted successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve a model by its primary key...
        $carouselItem = carouselItems::findOrFail($id);
        return $carouselItem;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(carouselItemsRequest $request, string $id)
    {
        //
        $validated = $request -> validated();
        $carouselItem = carouselItems::findOrFail($id);
        $carouselItem -> update($validated);
        
        return $carouselItem;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $carouselItem = carouselItems::findOrFail($id);
 
        $carouselItem->delete();

        return $carouselItem;
    }
}
