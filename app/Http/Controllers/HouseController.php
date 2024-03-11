<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::latest()->paginate(12);

        return view('properties.index', compact('houses'));
    }

    public function show($slug)
    {
        // Find the house based on the provided slug
        $house = House::where('slug', $slug)->first();
    
        // Check if the house is found
        if ($house) {
            return view('properties.show', compact('house'));
        } else {
            // Handle the case where the house is not found, for example, redirect to a 404 page
            abort(404);
        }
    }
    
}
