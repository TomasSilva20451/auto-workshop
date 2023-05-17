<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'year',
        'creation_date',
        'status',
        'client_id',
    ];

    public function serviceHistories()
    {
        return $this->hasMany(ServiceHistory::class);
    }
}