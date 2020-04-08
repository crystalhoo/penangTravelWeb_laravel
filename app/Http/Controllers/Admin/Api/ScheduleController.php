<?php

namespace App\Http\Controllers;

use DB;
use App\Hotel;
use App\Schedule;
use App\Http\Requests\ScheduleRequest;
use App\Http\Resources\ScheduleCollection;
use App\Http\Resources\ScheduleResource;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->input('title');
        $day_number = $request->input('day_number');
        $start_time = $request->input('start_time');
        $full_description = $request->input('full_description');
        // $hotel = $request->input('hotel');
        $plan = $request->input('plan');
        $timestamps = $request->input('timestamps');
        //$schedules = Schedule::with([ 'hotels', 'plan'])
        $schedules = Schedule::with('plan')
            // ->whereHas('hotels', function($query) use($hotel) {
            //     return $query->where('name', 'like', "%$hotel%");
            // })
            ->whereHas('plan', function($query) use($plan) {
                return $query->where('plan_id', 'like', "%$plan%");
            })
            ->when($day_number, function($query) use($day_number) {
                return $query->where('day_number', $day_number);
            })
            ->when($start_time, function($query) use($start_time) {
                return $query->where('start_time', $start_time);
            })
            ->when($title, function($query) use($title) {
                return $query->where('title', 'like', "%$title%");
            })
            ->when($full_description, function($query) use($full_description) {
                return $query->where('full_description', 'like', "%$full_description%");
            })
            ->when($timestamps, function($query) use($timestamps) {
                return $query->where('timestamps', $timestamps);
            })
            ->paginate(20);

        // return new ScheduleCollection($schedules);
        return view('schedules.index', [
            'schedules' => $schedules
            ]);
}

public function create()
{
    $schedule = new Schedule();
    $hotels = Hotel::pluck('name','id');

    return view('schedules.create', [
    'schedule' => $schedule,
    'hotels' => $hotels,
    ]);
}

//public function store(ScheduleRequest $request)
public function store(Request $request)
{
        $schedule = new Schedule;
		$schedule->fill($request->all());
		$schedule->save();
		
		$schedule->hotels()->sync($request->get('hotels'));
	
		return redirect()->route('schedule.index');
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
        //$schedule = Schedule::with('hotels')->with('plan')->find($id);
        $schedule = Schedule::with('plan')->find($id);
        $hotels = $schedule->hotels()->get();
        if(!$schedule) throw new ModelNotFoundException;

        // return new ScheduleResource($schedule);
        return view('schedules.show', [
            'schedule' => $schedule,
            'hotels' => $hotels,
            ]);
    
        $hotels = Hotel::pluck('name','id');
	
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
        //$schedule = Schedule::with('hotels')->with('plan')->find($id);
        //$schedule = Schedule::with('plan')->find($id);
        $schedule = Schedule::find($id);
        if(!$schedule) throw new ModelNotFoundException;

        $schedule->fill($request->all());

        $schedule->plan_id = $request->plan_id;

        DB::transaction(function() use($schedule, $request) {
            $schedule->saveOrFail();
            $schedule->hotels()->sync($request->get('hotels'));
        });

        // return response()->json(null, 204);
        return redirect()->route('schedule.index');
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
public function edit($id)
	{
		$schedule = Schedule::find($id);
        if(!$schedule) throw new ModelNotFoundException;
        
        $hotels = Hotel::pluck('name','id');

		return view('schedules.edit', [
        'schedule' => $schedule,
        'hotels' => $hotels,
		]);
	}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    
        try {
            $schedule = Schedule::find($id);
            if(!$schedule) throw new ModelNotFoundException;

            $schedule->delete(); 
            // $schedule->saveOrFail();

            //return response()->json(null, 204);
            return redirect()->route('schedule.index');
                        //->with('success','schedule deleted successfully');
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