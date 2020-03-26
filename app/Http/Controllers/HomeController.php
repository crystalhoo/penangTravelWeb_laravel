<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;
use App\Hotel;
use App\Gallery;
use App\Faq;
use App\Plan;
use App\Schedule;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $hotels = Hotel::all();
        $plans = Plan::all();
        // $schedules = Schedule::with('plan')
        // ->orderBy('start_time', 'asc')
        // ->get()
        // ->groupBy('day_number');
        $galleries = Gallery::all();
        $faqs = Faq::all();

        return view('home', compact('settings', 'hotels', 'galleries', 'faqs','plans'));
    }
    
    //for?
    public function view(Plan $plan)
    {
        $settings = Setting::pluck('value', 'key');
        
        return view('plan', compact('settings', 'plan'));
    }
}

