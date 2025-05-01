<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'patient_id',
        'visit_date',
        'notes'
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];

        public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function getPatientInfoAttribute()
    {
        return $this->patient ? "{$this->patient->full_name}" : null;
    }


}
