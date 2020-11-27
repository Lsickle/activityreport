<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ActivityController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Activity::class, 'activity');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Auth::user()->activities()->get();

        return view('activities.index' , compact('activities'));
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
            if ($request->description) {
                $activity = new Activity;
                $activity->description =  $request->description;
                $activity->user_id =Auth::id();
                $activity->save();

			    return response()->json($activity);
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
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        $this->authorize('view', $activity);

        return view('time' , compact('activity'));

        // $user = Auth::user();

        // if ($user->can('view', $activity)) {
        //     return view('activities.show' , compact('activity'));
        // }else{
        //     abort(403,'you can only see your owns activities');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storetime(Request $request)
    {
        if ($request->ajax()) {
            $activity = Activity::with('times')->where('id', $request->activity)->first();

            $this->authorize('update', $activity);

            return response()->json($activity);

            // if ($request->time) {
            //     $time = new Time;
            //     $time->date =  $request->date;
            //     $time->time =  $request->time;
            //     $time->activity_id = $activity->id;
            //     $time->save();

			//     return response()->json($activity);
            // }else{
            //     return response()->json([
            //         'error' => 'the description text can not be empty',
            //         'code' => 401
            //     ], 401);
            // }
		}
    }
}
