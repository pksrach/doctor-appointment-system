<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends SoftDeleteModel
{
    use HasFactory;


    protected $fillable = [
        'name',
        'speciality',
        'member_since',
        'phone',
        'address',
        'status',
    ];
}
