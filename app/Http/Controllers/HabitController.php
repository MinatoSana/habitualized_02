<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Habit;
use App\Event;
use Illuminate\Support\Facades\DB;

class HabitController extends Controller
{
    public function create(){
        return view('habits.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'description'=> 'required',
            'reason' => 'required'
        ]);
        $habit = new Habit;
        $habit->description = $request->input('description');
        $habit->reason = $request->input('reason');
        $habit->time_lapse = 0;
        $habit->user_id = auth()->user()->id;
        $habit->save();
        return redirect('/home')->with('status', 'Habit Added');
    }
    public function edit($id)
    {
        $habit = Habit::find($id);
        return view('habits.edit')->with('habit',$habit);
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'description'=> 'required',
            'reason' => 'required'
        ]);
        $habit = Habit::find($id);
        $habit->description = $request->input('description');
        $habit->reason = $request->input('reason');
        $habit->save();
        return redirect('/home')->with('status', 'Habit Updated');
    }
    public function show($id)
    {
        $habit = Habit::find($id);
        $smileys= DB::table('events')->where('habit_id', $id)->where('emote','smile')->count();
        $events=Event::where('habit_id', $id)->orderBy('date')->get();
        return view('habits.show')->with('habit', $habit)->with('smileys', $smileys)->with('events', $events);
    }
    public function destroy($id)
    {
        $habit = Habit::find($id);
        $events=Event::where('habit_id', $id)->get();
        if($events!=NULL){
            foreach($events as $event){
                $event->delete();
            }
        }
        $habit->delete();
        return redirect('/home')->with('remove', 'Habit Removed');

    }
}
