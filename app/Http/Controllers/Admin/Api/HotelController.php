<?php

namespace App\Http\Controllers;

use DB;
use App\Hotel;
use App\Schedule;
use App\Http\Requests\HotelRequest;
use App\Http\Resources\HotelCollection;
use App\Http\Resources\HotelResource;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Support\Facades\Gate;

class HotelController extends Controller
{

  use MediaUploadingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name');

        $hotels = Hotel::with('schedules')
            ->when($name, function($query) use($name) {
                return $query->where('name', 'like', "%$name%");
            })
            ->paginate(20);

        return view('hotels.index', [
            'hotels' => $hotels,
            'request' => $request,
            ]);
    }

    public function create()
	{
        $hotel = new Hotel();

        $schedules = Schedule::pluck('title','id');

        if (Gate::allows('admin-only', auth()->user())) {
          return view('hotels.create', [
              'hotel' => $hotel,
              'schedules' => $schedules,
          ]);
        }
        return 'You are not admin!!!!';


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(HotelRequest $request)
    public function store(HotelRequest $request)
    {

            $hotel = new Hotel;

            $hotel->fill($request->all());

            $hotel->saveOrFail();

            $hotel->schedules()->sync($request->get('schedules'));

            if (Gate::allows('admin-only', auth()->user())) {
              return redirect()->route('hotel.index');
        }
        return 'You are not admin!!!!';



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
            $hotel = Hotel::with('schedules')->find($id);
            if(!$hotel) throw new ModelNotFoundException;

            $schedules= Schedule::pluck('title','id');

            $hotel = Hotel::find($id);
		    $schedules = $hotel->schedules()->get();


            return view('hotels.show', [
                'hotel' => $hotel,
                'schedules' => $schedules,
                ]);


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
    public function update(HotelRequest $request, $id)
    {
            $hotel = Hotel::find($id);
            if(!$hotel) throw new ModelNotFoundException;

            $hotel->fill($request->all());

            $hotel->saveOrFail();

            $hotel->schedules()->sync($request->get('schedules'));

            if (Gate::allows('admin-only', auth()->user())) {
            return redirect()->route('hotel.index');
        }
        return 'You are not admin!!!!';


    }


    public function edit($id)
	{
		$hotel = Hotel::find($id);
        if(!$hotel) throw new ModelNotFoundException;

        $schedules = Schedule::pluck('title','id');

        if (Gate::allows('admin-only', auth()->user())) {
          return view('hotels.edit', [
              'hotel' => $hotel,
              'schedules' => $schedules,
          ]);
        }
        return 'You are not admin!!!!';


	}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


            $hotel = Hotel::find($id);
            if(!$hotel) throw new ModelNotFoundException;

            $hotel->delete();

            if (Gate::allows('admin-only', auth()->user())) {
            return redirect()->route('hotel.index');
        }
        return 'You are not admin!!!!';


    }
}
