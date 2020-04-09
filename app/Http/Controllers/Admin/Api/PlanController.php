<?php

namespace App\Http\Controllers;

use DB;
use App\Plan;
use Illuminate\Http\Request;
use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanCollection;
use App\Http\Resources\PlanResource;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;


class PlanController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->input('title');

        $description = $request->input('description');

        $plans = Plan::with('schedules')
        ->when($title, function($query) use($title) {
            return $query->where('title', 'like', "%$title%");
        })
        ->paginate(20);

        return view('plans.index', [
        'plans' => $plans
        ]);

    }

    public function create()
	{
		$plan = new Plan();
    if (Gate::allows('admin-only', auth()->user())) {
      return view('plans.create', [
      'plan' => $plan,
      ]);
        }
        return 'You are not admin!!!!';

    }

    public function store(PlanRequest $request)
    {
        $plan = new Plan;

        $plan->fill($request->all());

        $plan->saveOrFail();

        if (Gate::allows('admin-only', auth()->user())) {
              return redirect()->route('plan.index');
        }
        return 'You are not admin!!!!';


    }

    public function show($id)
    {
        $plan = Plan::find($id);

        $schedules = $plan->schedules()->get();

        if(!$plan) throw new ModelNotFoundException;

        return view('plans.show', [
            'plan' => $plan,
            'schedules' => $schedules,
            ]);
    }

    public function update(PlanRequest $request, $id)
    {
        $plan = Plan::find($id);

        if(!$plan) throw new ModelNotFoundException;

        $plan->fill($request->all());

        $plan->saveOrFail();

        if (Gate::allows('admin-only', auth()->user())) {
          return redirect()->route('plan.index');
        }
        return 'You are not admin!!!!';


    }


    public function edit($id)
	{
        $plan = Plan::find($id);

		if(!$plan) throw new ModelNotFoundException;

    if (Gate::allows('admin-only', auth()->user())) {
      return view('plans.edit', [
      'plan' => $plan
      ]);
        }
        return 'You are not admin!!!!';


	}

    public function destroy($id)
    {
        $plan = Plan::find($id);

        if(!$plan) throw new ModelNotFoundException;

        $plan->delete();

        if (Gate::allows('admin-only', auth()->user())) {
              return redirect()->route('plan.index');
        }
        return 'You are not admin!!!!';



    }

}
