<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\countries;

class States extends Model
{
    use HasFactory;
  
    protected $guarded = [];

    public function country()
    {
    return $this->belongsTo('App\Models\Countries', 'country_id', 'id');
    }
}
