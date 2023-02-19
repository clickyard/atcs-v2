<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_marks extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vehicle()
    {
    return $this->belongsTo('App\Models\Vehicles', 'veh_id', 'id');
    }
}
