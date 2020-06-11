<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;
use DB;

class HabitController extends Controller
{
    public function create(Request $request){
        return view('create');
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
        $habit->user_id = auth()->user()->id;
        $habit->save();
        return redirect('/home')->with('success', 'Habit Created');
    }
}
