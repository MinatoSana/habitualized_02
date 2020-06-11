<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function habit(){
        return $this->belongsTo('App/Habit');
    }
}
