<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    // Table Name
    protected $table = 'habits';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
    protected $fillable = [
        'description', 'reason', 'time_lapse'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function event(){
        return $this->hasMany('App\Event');
    }
}