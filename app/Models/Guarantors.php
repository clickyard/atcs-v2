<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guarantors extends Model
{
    
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'guarantors';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the Country for this model.
     *
     * @return App\Models\Country
     */
    public function Country()
    {
        return $this->belongsTo('App\Models\Countries','gcountry_id','id');
    }

    /**
     * Get the State for this model.
     *
     * @return App\Models\State
     */
    public function State()
    {
        return $this->belongsTo('App\Models\States','gstate_id','id');
    }

    public function myState()
    {
        return $this->belongsTo('App\Models\States','gstate_id','id');
    }

    /**
     * Get the Customer for this model.
     *
     * @return App\Models\Customer
     */
    public function Customer()
    {
        return $this->belongsTo('App\Models\Customers','cus_id','id');
    }

    /**
     * Get the guarefrance for this model.
     *
     * @return App\Models\Guarefrance
     */
    public function guarefrance()
    {
        return $this->hasOne('App\Models\Guarefrances','gua_id','id');
    }


    

}
