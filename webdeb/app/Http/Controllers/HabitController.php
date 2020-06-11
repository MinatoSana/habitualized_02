<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Habit;
use DB;

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
        return view('habits.show',['habit' => $habit ]);
    }
    public function destroy($id)
    {
        $habit = Habit::find($id);
        $habit->delete();
        return redirect('/home')->with('status', 'Habit Removed');

    }
    // public function try()
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|max:255',
    //         'email' => 'required|email|max:255|unique:users',
    //         'password' => 'required|min:6|confirmed',
    //     ]);

    //     $input = $request->all();

    //     if ($validator->passes()) {

    //         // Store your user in database 

    //         return Response::json(['success' => '1']);

    //     }
        
    //     return Response::json(['errors' => $validator->errors()]);
    // }
}
