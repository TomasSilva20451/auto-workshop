<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'service_type',
        'date',
        'duration',
        'cost',
    ];

    // Define the relationship with the Vehicle model
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
