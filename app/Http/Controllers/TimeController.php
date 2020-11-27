<?php

namespace App\Http\Controllers;

use App\Time;
use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $activity = Activity::with('times')->where('id', $request->id)->first();

            // return response()->json($activity->times('time')->sum('time'));

            if (Auth::id() !== $activity->user_id) {
                return response()->json([
                    'error' => 'the user can edit this activity',
                    'code' => 401
                ], 401);
            }

            if ($request->time) {
                if(($activity->times('time')->sum('time') + $request->time) <= 8){
                    $time = new Time;
                    $time->date =  $request->date;
                    $time->time =  $request->time;
                    $time->activity_id = $activity->id;
                    $time->save();

                    return response()->json([
                        'message' => 'time saved',
                        'code' => 200
                    ], 200);
                }else{
                    return response()->json([
                        'error' => 'total hours exceed the 8 hours limit',
                        'code' => 401
                    ], 401);
                }
            }else{
                return response()->json([
                    'error' => 'the description text can not be empty',
                    'code' => 401
                ], 401);
            }
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function show(Time $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function edit(Time $time)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Time $time)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function destroy(Time $time)
    {
        //
    }
}
