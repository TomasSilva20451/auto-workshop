<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'email',
        'creation_date',
        'type',
    ];

    // Define the relationship with the Booking model
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}