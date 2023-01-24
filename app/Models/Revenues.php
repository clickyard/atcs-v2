<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenues extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    /**
     * Get the Customer for this model.
     *
     * @return App\Models\Customer
     */
    public function Customer()
    {
        return $this->belongsTo('App\Models\Customers','cus_id','id');
    }
}
