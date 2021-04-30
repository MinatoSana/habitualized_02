<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Habit;
use App\Event;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $hats = DB::table('habits')->select('id','user_id','time_lapse')->where('user_id', $user_id)->get();
        
        foreach($hats as $hat){
            $habit= Habit::find($hat->id);
            $event = Event::where('habit_id', $hat->id)->where('emote','smile')->orderBy('date','desc')->first();
            if($event!=NULL){
                error_log($event->date);
                $last= Carbon::now();
                $from= Carbon::parse($event->date);
                $hat->time_lapse = $last->diffInDays($from);
                $habit->time_lapse=$hat->time_lapse;
                $habit->save();
            }
        }
        return view('home')->with('habits', $user->habits);
    }
}
