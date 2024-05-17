<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
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

    /**
     * @throws \Exception
     */
    public function getAppointmentDateAttribute($value)
    {
        // Assuming $value is a DateTime instance or a date string
        // Format the date to a string and return it
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * @throws \Exception
     */
    public function setAppointmentDateAttribute($value): void
    {
        $this->attributes['appointment_date'] = (new DateTime($value))->format('Y-m-d H:i:s');
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
