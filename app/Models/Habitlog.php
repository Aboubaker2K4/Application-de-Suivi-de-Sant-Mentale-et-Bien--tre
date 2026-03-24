<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitlog extends Model
{
   protected $fillable = [
        'habit_name',
        'date',
        'status',
    ];  
public function habit()
    {
        return $this->belongsTo(Habit::class);
    }

}
