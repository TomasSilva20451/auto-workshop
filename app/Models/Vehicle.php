<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'make',
        'model',
        'year',
        'price',
        'status',
    ];

   /*  public function serviceHistories()
    {
        return $this->hasMany(ServiceHistory::class);
    } */
}