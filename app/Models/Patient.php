<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'email',
        'phone',
        'address',
        'blood_type',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function clinic()
    {
        return $this->belongsTo(User::class, 'clinic_id');
    }
    public function samePhonePatients()
    {
        return $this->hasMany(Patient::class, 'phone', 'phone')
            ->where('id', '!=', $this->id);
    }
}
