<?php

namespace App\Http\Controllers;

use DB;
use App\Schedule;
// use App\Http\Requests\ScheduleRequest;
// use App\Http\Resources\ScheduleCollection;
// use App\Http\Resources\ScheduleResource;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $id = $request ->input('id');
        $title = $request->input('title');
        $day_number = $request->input('day_number');
        $start_time = $request->input('start_time');
        $full_description = $request->input('full_description');
        $plan = $request->input('plan');
        $hotel = $request->input('hotel');
        $timestamps = $request->input('timestamps');                   

        $schedules = Schedule::with(['plans', 'hotel'])
            ->whereHas('plans', function($query) use($plan) {
                return $query->where('name', 'like', "%$plan%");
            })
            ->whereHas('hotel', function($query) use($hotel) {
                return $query->where('name', 'like', "%$hotel%");
            })
            ->when($id, function($query) use($id) {
                return $query->where('id', $id);
            })
            ->when($title, function($query) use($title) {
                return $query->where('title', 'like', "%$title%");
            })
            ->when($day_number, function($query) use($day_number) {
                return $query->where('day_number', $day_number);
            })
            ->when($start_time, function($query) use($start_time) {
                return $query->where('start_time', $start_time);
            })
            ->when($full_description, function($query) use($full_description) {
                return $query->where('full_description', 'full_description', "%$full_description%");
            })
            ->when($timestamps, function($query) use($timestamps) {
                return $query->where('timestamps', $timestamps);
            })
            ->paginate(10);

        return new ScheduleCollection($schedules);
}
//public function store(ScheduleRequest $request)
public function store(Request $request)
{
    try {
        $schedule = new Schedule;
        $schedule->fill($request->all());
        $schedule->hotel_id = $request->hotel_id;

        DB::transaction(function() use($schedule, $request) {
            $schedule->saveOrFail();
            $schedule->plans()->sync($request->plans);
        });

        return response()->json([
            'id' => $schedule->id,
            'created_at' => $schedule->created_at,
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

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    try {
        $schedule = Schedule::with('plans')->with('hotel')->find($id);
        if(!$schedule) throw new ModelNotFoundException;

        return new ScheduleResource($schedule);
    }
    catch(ModelNotFoundException $ex) {
        return response()->json([
            'message' => $ex->getMessage(),
        ], 404);
    }
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    try {
        $schedule = Schedule::with('plans')->with('hotel')->find($id);
        if(!$schedule) throw new ModelNotFoundException;

        $schedule->fill($request->all());
        $schedule->hotel_id = $request->hotel_id;

        DB::transaction(function() use($schedule, $request) {
            $schedule->saveOrFail();
            $schedule->plans()->sync($request->plans);
        });

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

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    //
}
}