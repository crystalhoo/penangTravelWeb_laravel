<?php

namespace App\Http\Controllers;

use DB;
use App\Hotel;
use App\Http\Requests\HotelRequest;
use App\Http\Resources\HotelCollection;
use App\Http\Resources\HotelResource;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HotelController extends Controller
{
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

        // $hotels = Hotel::orderBy('name', 'asc')->get();

        // return new HotelCollection($hotels);
        return view('hotels.index', [
            'hotels' => $hotels
            ]);
    }

    public function create()
	{
		$hotel = new Hotel();

		return view('hotels.create', [
		'hotel' => $hotel,
		]);
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
        try {
            $hotel = new Hotel;
            $hotel->fill($request->all());

            $hotel->saveOrFail();

            // return response()->json([
            //     'id' => $hotel->id,
            //     'created_at' => $hotel->created_at,
            // ], 201);
            
            return redirect()->route('hotel.index');
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
            $hotel = Hotel::with('schedules')->find($id);
            if(!$hotel) throw new ModelNotFoundException;

            // return new HotelResource($hotel);
            return view('hotels.show', [
                'hotel' => $hotel
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
        try {
            $hotel = Hotel::find($id);
            if(!$hotel) throw new ModelNotFoundException;

            $hotel->fill($request->all());

            $hotel->saveOrFail();

            return redirect()->route('hotel.index');
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
		$hotel = Hotel::find($id);
		if(!$hotel) throw new ModelNotFoundException;

		return view('hotels.edit', [
		'hotel' => $hotel
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
            $hotel = Hotel::find($id);
            if(!$hotel) throw new ModelNotFoundException;

            //remove the detach()
            $hotel->delete(); 
            // $hotel->saveOrFail();

            //return response()->json(null, 204);
            // return redirect()->route('hotels')
            //             ->with('success','hotel deleted successfully');
            return redirect()->route('hotel.index');
                        // ->with('success','Hotel deleted successfully');
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
