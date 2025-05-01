<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'name',
        "address_1",
        "address_2",
        "opening_time",
        "closing_time"
    ];
    protected $casts = [
        'opening_time' => 'datetime:H:i',
        'closing_time' => 'datetime:H:i',
    ];

     public function users()
     {
         return $this->hasMany(User::class);
     }

     public function patients()
     {
         return $this->hasMany(Patient::class);
     }
}
