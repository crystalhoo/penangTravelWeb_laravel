<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Plan extends Controller
{
    //havent test: this is front end 
    public function index(Request $request)
    {
        $title = $request->input('title');

        $plans = Plan::with('schedule')
            ->when($title, function($query) use($title) {
                return $query->where('title', 'like', "%$title%");
            })
            ->paginate(10);
    //need to create 1 plan collection
        return new PlanCollection($plans);
    }
}
