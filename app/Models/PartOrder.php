<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartOrder extends Model
{
    use HasFactory;

    protected $table = 'part_orders';
    protected $primaryKey = 'PartOrderID';
    public $timestamps = true;

    protected $fillable = [
        'PartOrderID',
        'BookingID',
        'PartID',
        'Quantity',
        'CreationDate',
        'PurchaseOrderID',
        'ServiceID',
        'part_id',
    ];
}