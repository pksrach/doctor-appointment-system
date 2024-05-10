<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'dob',
        'phone',
        'attachment',
        'user_id',
        'location_id',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function location(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function displayName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
