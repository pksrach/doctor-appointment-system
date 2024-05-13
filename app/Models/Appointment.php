<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends SoftDeleteModel
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'appointment_date',
        'amount',
        'status',
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function getStatusAttribute($value): string
    {
        return ucfirst($value);
    }

    public function setStatusAttribute($value): void
    {
        $this->attributes['status'] = strtolower($value);
    }

    public function getAppointmentDateAttribute($value): string
    {
        return date('Y-m-d H:i:s', strtotime($value));
    }

    public function setAppointmentDateAttribute($value): void
    {
        $this->attributes['appointment_date'] = $value->format('Y-m-d H:i:s');
    }

    public function getFeeAttribute($value): string
    {
        return number_format($value, 2);
    }

    public function setFeeAttribute($value): void
    {
        $this->attributes['fee'] = number_format($value, 2);
    }


}
