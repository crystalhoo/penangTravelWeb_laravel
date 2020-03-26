<?php

namespace App\Http\Controllers;

use DB;
use App\Plan;
use Illuminate\Http\Request;
use App\Http\Resources\PlanCollection;
use App\Http\Resources\PlanResource;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;


class PlanController extends Controller
{
    //havent test: this is front end 
    public function index(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        $plans = Plan::with('schedules')
            ->when($title, function($query) use($title) {
                return $query->where('title', 'like', "%$title%");
            })
            ->paginate(10);
    //need to create 1 plan collection
        return new PlanCollection($plans);
    }

    //need to add plan request here 
    public function store(Request $request)
    {
        try {
            $plan = new Plan;
            $plan->fill($request->all());

            $plan->saveOrFail();

            return response()->json([
                'id' => $plan->id,
                'created_at' => $plan->created_at,
            ], 201);
        }
        catch(QueryException $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
            ], 500);
        }
        catch(\Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $plan = Plan::with('schedules')->find($id);
            if(!$plan) throw new ModelNotFoundException;

            return new PlanResource($plan);
        }
        catch(ModelNotFoundException $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
            ], 404);
        }
    }

    //need to add plan req here
    public function update(Request $request, $id)
    {
        try {
            $plan = Plan::find($id);
            if(!$plan) throw new ModelNotFoundException;

            $plan->fill($request->all());

            $plan->saveOrFail();

            return response()->json(null, 204);
        }
        catch(ModelNotFoundException $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
            ], 404);
        }
        catch(QueryException $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
            ], 500);
        }
        catch(\Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
            ], 500);
        }
    }

}
