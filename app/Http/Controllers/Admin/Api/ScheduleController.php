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

        $start_date = $request->input('start_date');

        $full_description = $request->input('full_description');

        $plan = $request->input('plan');

        $timestamps = $request->input('timestamps');

        $schedules = Schedule::with('plan')
            ->whereHas('plan', function($query) use($plan) {
                return $query->where('plan_id', 'like', "%$plan%");
            })
            ->when($day_number, function($query) use($day_number) {
                return $query->where('day_number', $day_number);
            })
            ->when($start_date, function($query) use($start_date) {
                return $query->where('start_date', $start_date);
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
public function store(ScheduleRequest $request)
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
    $schedule = Schedule::with('plan')->find($id);

    $hotels = $schedule->hotels()->get();

    if(!$schedule) throw new ModelNotFoundException;

    return view('schedules.show', [
        'schedule' => $schedule,
        'hotels' => $hotels,
        ]);

    $hotels = Hotel::pluck('name','id');
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(ScheduleRequest $request, $id)
{
    $schedule = Schedule::find($id);

    if(!$schedule) throw new ModelNotFoundException;

    $schedule->fill($request->all());

    $schedule->plan_id = $request->plan_id;

    DB::transaction(function() use($schedule, $request) {
        $schedule->saveOrFail();
        $schedule->hotels()->sync($request->get('hotels'));
    });
    return redirect()->route('schedule.index');
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
        $schedule = Schedule::find($id);

        if(!$schedule) throw new ModelNotFoundException;

        $schedule->delete(); 

        return redirect()->route('schedule.index');
    }
}