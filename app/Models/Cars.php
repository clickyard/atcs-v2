<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends Model
{
    
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cars';

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
     * Get the Vehicle for this model.
     *
     * @return App\Models\Vehicle
     */
    public function Vehicle()
    {
        return $this->belongsTo('App\Models\Vehicles','veh_id','id');
    }

    /**
     * Get the CarMark for this model.
     *
     * @return App\Models\CarMark
     */
    public function CarMark()
    {
        return $this->belongsTo('App\Models\Car_marks','mark_id','id');
    }

    /**
     * Get the Country for this model.
     *
     * @return App\Models\Country
     */
    public function Country()
    {
        return $this->belongsTo('App\Models\Countries','place_id','id');
    }

    /**
     * Get the Customer for this model.
     *
     * @return App\Models\Customer
     */
    public function Customer()
    {
        return $this->belongsTo('App\Models\Customers','customer_id','id');
    }

    /**
     * Get the creator for this model.
     *
     * @return App\User
     */
    public function creator()
    {
        return $this->belongsTo('App\User','created_by');
    }

    /**
     * Get the updater for this model.
     *
     * @return App\User
     */
    public function updater()
    {
        return $this->belongsTo('App\User','updated_by');
    }

    /**
     * Get the emportcar for this model.
     *
     * @return App\Models\Emportcar
     */
    public function emportcar()
    {
        return $this->hasmany('App\Models\Emportcars','car_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
   

}
