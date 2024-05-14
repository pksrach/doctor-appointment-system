<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends SoftDeleteModel
{
    use HasFactory;


    protected $fillable = [
        'name',
        'speciality',
        'fee',
        'member_since',
        'phone',
        'address',
        'status',
        'attachment',
    ];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
