<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{  
    protected $fillable = [
        'name',
        'description',
    ];
   public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function habitlogs()
    {
        return $this->hasMany(Habitlog::class);
    }
}
