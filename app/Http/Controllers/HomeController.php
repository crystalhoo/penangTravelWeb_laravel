<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;
use App\Hotel;
use App\Gallery;
use App\Faq;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $hotels = Hotel::all();
        $galleries = Gallery::all();
        $faqs = Faq::all();

        return view('home', compact('settings', 'hotels', 'galleries', 'faqs'));
    }
    
}

