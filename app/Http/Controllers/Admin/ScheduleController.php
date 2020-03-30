<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyScheduleRequest;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Schedule;
// use App\Speaker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ScheduleController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('schedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedules = Schedule::all();

        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        
        // abort_if(Gate::denies('schedule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$speakers = Speaker::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        //Uncomment later when done
        // if (Gate::allows('isAdmin')) {
        //     dd('Admin allowed');
        // } else {
        //     dd('You are not Admin');
        // }

       // return view('admin.schedules.create', compact('speakers'));
        return view('admin.schedules.create');
    }

    public function store(Schedule $request)
    {
        $schedule = new Schedule;
        $schedule->plan_id = $request->plan_id;
        // Schedule::whereId($schedule)->update($request->all());
         //Schedule::where('schedule', $schedule)->update($request->all());
        //$schedule = Schedule::save();
        //$schedule->$request::save();
        // $schedule->plan_id = $request->plan_id;


        // DB::transaction(function() use($schedule, $request) {
        //     $schedule->saveOrFail();
        //     $schedule->hotels()->sync($request->hotels);
        // });
        
        //Uncomment later when done
        // if (Gate::allows('isAdmin')) {
        //     dd('Admin allowed');
        // } else {
        //     dd('You are not Admin');
        // }
        return redirect()->route('admin.schedules.index');
    }

    public function edit(Schedule $schedule)
    {
        // abort_if(Gate::denies('schedule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$speakers = Speaker::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        //$schedule->load('speaker');


         //Uncomment later when done
        // if (Gate::allows('isAdmin')) {
        //     dd('Admin allowed');
        // } else {
        //     dd('You are not Admin');
        // }
        return view('admin.schedules.edit', compact('speakers', 'schedule'));
    }

    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $schedule->update($request->all());
        //Uncomment later when done
        // if (Gate::allows('isAdmin')) {
        //     dd('Admin allowed');
        // } else {
        //     dd('You are not Admin');
        // }
        return redirect()->route('admin.schedules.index');
    }

    public function show(Schedule $schedule)
    {
        // abort_if(Gate::denies('schedule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$schedule->load('speaker');

        return view('admin.schedules.show', compact('schedule'));
    }

    public function destroy(Schedule $schedule)
    {
        // abort_if(Gate::denies('schedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule->delete();

        // if (Gate::allows('isAdmin')) {
        //     dd('Admin allowed');
        // } else {
        //     dd('You are not Admin');
        // }

        return back();
    }

    public function massDestroy(MassDestroyScheduleRequest $request)
    {
        Schedule::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


}
