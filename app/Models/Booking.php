<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'BookingID',
        'VehicleID',
        'ClientID',
        'BookingDate',
        'BookingType',
        'Status',
        'CreationDate',
        'CustomerID',
        'created_at',
        'updated_at',
        'appointment_id',
        'vehicle_id',
        'client_id',
        'booking_date',
        'booking_type',
    ];

    protected $primaryKey = 'BookingID';

    // Define the relationship with the Appointment model
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
