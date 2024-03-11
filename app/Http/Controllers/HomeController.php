<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\HouseCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category= HouseCategory::all();
        $houses = House::where('availability_status', true)->take(6)->get();
        return view('welcome', compact('houses', 'category'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function testimonials()
    {
        return view('testimonials');
    }

    public function about()
    {
        return view('about');
    }
}
