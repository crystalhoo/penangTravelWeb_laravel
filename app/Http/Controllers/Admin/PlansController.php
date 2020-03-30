<?php

namespace App\Http\Controllers\Admin;

use App\Plan;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHotelRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\PlanRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlansController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        // abort_if(Gate::denies('hotel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plans = Plan::all();

        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        // abort_if(Gate::denies('hotel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.plans.create');
    }

    public function store(PlanRequest $request)
    {
        $plan = Plan::create($request->all());

        if ($request->input('photo', false)) {
            $plan->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.hotels.index');
    }

    public function edit(Plan $plan)
    {
        // abort_if(Gate::denies('hotel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.plans.edit', compact('plan'));
    }

    public function update(PlanRequest $request, Plan $plan)
    {
        $hotel->update($request->all());

        if ($request->input('photo', false)) {
            if (!$plan->photo || $request->input('photo') !== $plan->photo->file_name) {
                $plan->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($plan->photo) {
            $plan->photo->delete();
        }

        return redirect()->route('admin.plans.index');
    }

    public function show(Plan $plan)
    {
        // abort_if(Gate::denies('hotel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.plans.show', compact('plan'));
    }

    public function destroy(Plan $plan)
    {
        // abort_if(Gate::denies('hotel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plan->delete();

        return back();
    }

    public function massDestroy(MassDestroyHotelRequest $request)
    {
        Hotel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
