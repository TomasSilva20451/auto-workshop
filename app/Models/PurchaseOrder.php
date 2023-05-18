<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'booking_id',
        'item_name',
        'item_price',
        'creation_date',
    ];

    // Define the relationship with the Service model
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Define the relationship with the Booking model
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
