<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $primaryKey = 'id';
    // protected $table = 'ratings';
    protected $fillable = ['date','emote','habit_id'];
    public $timestamps = false;
    public function habit(){
        return $this->belongsTo('App\Habit');
    }
}
