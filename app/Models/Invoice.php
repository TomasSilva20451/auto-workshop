<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $primaryKey = 'InvoiceID';
    public $timestamps = true;

    protected $fillable = [
        'InvoiceID',
        'BookingID',
        'TotalPrice',
        'CreationDate',
        'PartOrderID',
    ];
}