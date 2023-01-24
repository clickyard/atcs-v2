<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Custrefrances extends Model
{
    
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'custrefrances';

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
        return $this->belongsTo('App\Models\Country','ccountry_id','id');
    }

    /**
     * Get the State for this model.
     *
     * @return App\Models\State
     */
    public function State()
    {
        return $this->belongsTo('App\Models\States','cstate_id','id');
    }

    /**
     * Get the ccreatedBy for this model.
     *
     * @return App\Models\CcreatedBy
     */
    public function ccreatedBy()
    {
        return $this->belongsTo('App\Models\CcreatedBy','ccreated_by');
    }

    /**
     * Get the cupdatedBy for this model.
     *
     * @return App\Models\CupdatedBy
     */
    public function cupdatedBy()
    {
        return $this->belongsTo('App\Models\CupdatedBy','cupdated_by');
    }

    /**
     * Get the Customer for this model.
     *
     * @return App\Models\Customer
     */
    public function Customer()
    {
        return $this->belongsTo('App\Models\Customer','cus_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
  

}
