<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Event;
use App\Habit;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Carbon\Carbon;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $habit = Habit::find(1);
        // $habit_id= $habit->id;
        // return view('habits.show')->with('events', $habit->events)
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
        
        $this->validate($request, [
            'date' => 'required',
            'emote' => 'required'
        ]);
        $event = new Event;
        $event->date = $request->input('date');
        $event->emote = $request->input('emote');
        $event->habit_id = $request->input('habit_id');
        if($event->date === Carbon::now()->format('Y-m-d')){
            $stats= Event::where('habit_id', $event->habit_id)->where('date', $event->date)->get();
            if($stats->isEmpty()){
                $msg = "Date recorded.";
                $event->save();   
            }else{
                $msg = "Date has been rated.";
                $event->delete();
            }
        }else{
            $msg = "You can only rate today.";
            $event->delete();
        }
        
        return back()->with('warning', $msg);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
