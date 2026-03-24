<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
   protected $fillable = [
        'note',
        'niveau',
    ];
   public function user()
    {
        return $this->belongsTo(User::class);
    }
}
