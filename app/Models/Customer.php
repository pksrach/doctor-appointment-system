<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends SoftDeleteModel
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
        'deleted_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function displayName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
