<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;
use DB;

class HabitsController extends Controller
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
        return view('habits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'description'=> 'required',
            'reason' => 'required'
        ]);
        $habit = new Habit;
        $habit->description = $request->input('description');
        $habit->reason = trim($request->input('reason'));
        $habit->user_id = auth()->user()->id;
        $habit->save();
        return redirect('/home')->with('status', 'Habit Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habit = Habit::find($id);
        return view('habits.show',['habit' => $habit ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habit = Habit::find($id);
        return view('habits.edit')->with('habit',$habit);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habit = Habit::find($id);
        $habit->delete();
        return redirect('/home')->with('status', 'Habit Removed');
    }
}
