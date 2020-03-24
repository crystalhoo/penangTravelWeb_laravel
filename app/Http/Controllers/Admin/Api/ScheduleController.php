<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Schedule extends Controller
{
     public function index(Request $request)
    {
        $day_number = $request->input('day_number');
        $start_time = $request->input('start_time');
        $title = $request->input('title');
        $full_description = $request->input('full_description');
        $plan = $request->input('plan');

        // $schedules = Schedule::with(['authors', 'publisher'])
        //     ->whereHas('authors', function($query) use($author) {
        //         return $query->where('name', 'like', "%$author%");
        //     })
        //     ->whereHas('publisher', function($query) use($publisher) {
        //         return $query->where('name', 'like', "%$publisher%");
        //     })
        //     ->when($isbn, function($query) use($isbn) {
        //         return $query->where('isbn', $isbn);
        //     })
        //     ->when($title, function($query) use($title) {
        //         return $query->where('title', 'like', "%$title%");
        //     })
        //     ->when($year, function($query) use($year) {
        //         return $query->where('year', $year);
        //     })
        //     ->paginate(10);

        return new ScheduleCollection($schedules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //schedule request
    public function store(Request $request)
    {
        try {
            $schedule = new Schedule;
            $schedule->fill($request->all());

            DB::transaction(function() use($schedule, $request) {
                $schedule->saveOrFail();
                // $schedule->authors()->sync($request->sc);
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
    // public function show($id)
    // {
    //     try {
    //         $book = Book::with('authors')->with('publisher')->find($id);
    //         if(!$book) throw new ModelNotFoundException;

    //         return new BookResource($book);
    //     }
    //     catch(ModelNotFoundException $ex) {
    //         return response()->json([
    //             'message' => $ex->getMessage(),
    //         ], 404);
    //     }
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //req
    public function update(Request $request, $id)
    {
        try {
            // $schedule = Schedule::with('authors')->with('publisher')->find($id);
            $schedule = Schedule::find($id);
            if(!$schedule) throw new ModelNotFoundException;

            $schedule->fill($request->all());
            // $book->publisher_id = $request->publisher_id;

            DB::transaction(function() use($schedule, $request) {
                $schedule->saveOrFail();
                // $schedule->authors()->sync($request->authors);
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
