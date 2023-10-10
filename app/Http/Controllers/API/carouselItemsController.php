<?php

namespace App\Http\Controllers\API;

use App\Models\carouselItems;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $carouselItem = new carouselItems;
 
        $carouselItem->carousel_name = $request->carousel_name;
        $carouselItem->image_path = $request->image_path;
        $carouselItem->description = $request->description;
        $carouselItem->user_id = $request->user_id;
        
        $carouselItem->save();
 
        // return redirect('/flights');
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
