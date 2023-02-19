<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emportcars extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'emportcars';

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
     * Get the Customer for this model.
     *
     * @return App\Models\Customer
     */
    public function car()
    {
        return $this->belongsTo('App\Models\Cars',
                                        'car_id',                                        
                                        'id'
    )->with('Vehicle','CarMark'); 
    }

    
    public function mycars()
    {
        return $this->belongsTo('App\Models\Cars',
                                        'car_id',                                        
                                        'id'
    )->with('Vehicle');
    }
    public function customer()
    {
        return $this->belongsToThrough('App\Models\Customers'::class,
                                        'App\Models\Cars'::class
                                                                       
                                     )->with('custrefrance.State');
    }


    /**
     * Get the Ship for this model.
     *
     * @return App\Models\Ship
     */
    public function Ship()
    {
        return $this->belongsTo('App\Models\Ships','ship_id','id');
    }

    /**
     * Get the Shippingport for this model.
     *
     * @return App\Models\Shippingport
     */
    public function Shippingport()
    {
        return $this->belongsTo('App\Models\Shippingports','portAccess_id','id');
    }
    public function port()
    {
        return $this->belongsTo('App\Models\Shippingports','port_id','id');
    }

    public function mytakhlees()
    {
        return $this->hasOne('App\Models\Takhlees','emp_id','id');
    }
    public function myalerts()
    {
        return $this->hasOne('App\Models\Alerts','emp_id','id');
    }
    public function myincreases()
    {
        return $this->hasmany('App\Models\Increases','emp_id','id');
    }
    public function myleavingcars()
    {
        return $this->hasOne('App\Models\Leavingcars','emp_id','id');
    }
    /**
     * Get the creator for this model.
     *
   * @return App\User
     */
    public function creator()
    {
        return $this->belongsTo('App\Models\User','created_by');
    }

    /**
     * Get the updater for this model.
     *
     * @return App\User
     */
    public function updater()
    {
        return $this->belongsTo('App\Models\User','updated_by');
    }

    /**
     * Set the deliveryPerDate.
     *
     * @param  string  $value
     * @return void
     */
    public function setDeliveryPerDateAttribute($value)
    {
        $this->attributes['deliveryPerDate'] = !empty($value) ? Carbon::createFromFormat(config('app.getFormat'), $value)->format(config('app.date_format')) : null;
    }

    /**
     * Set the arrivedDate.
     *
     * @param  string  $value
     * @return void
     */
    public function setArrivedDateAttribute($value)
    {
        $this->attributes['arrivedDate'] = !empty($value) ? Carbon::createFromFormat(config('app.getFormat'), $value)->format(config('app.date_format')) : null;
    }

    /**
     * Set the issueDate.
     *
     * @param  string  $value
     * @return void
     */


     public function setIssueDateAttribute($value)
    {
        $this->attributes['issueDate'] = !empty($value) ? Carbon::createFromFormat(config('app.getFormat'), $value)->format(config('app.date_format')) : null;
    }

    /**
     * Set the expiryDate.
     *
     * @param  string  $value
     * @return void
     */
    public function setExpiryDateAttribute($value)
    {
        $this->attributes['expiryDate'] = !empty($value) ? Carbon::createFromFormat(config('app.getFormat'), $value)->format(config('app.date_format')): null;
    }

    /**
     * Set the entryDate.
     *
     * @param  string  $value
     * @return void
     */
    public function setEntryDateAttribute($value)
    {
        $this->attributes['entryDate'] = !empty($value) ? Carbon::createFromFormat(config('app.getFormat'), $value)->format(config('app.date_format')): null;
    }

    /**
     * Set the exitDate.
     *
     * @param  string  $value
     * @return void
     */
    public function setExitDateAttribute($value)
    {
        $this->attributes['exitDate'] = !empty($value) ? Carbon::createFromFormat(config('app.getFormat'), $value)->format(config('app.date_format')): null;
    }

    /**
     * Set the increaseDate.
     *
     * @param  string  $value
     * @return void
     */
    public function setIncreaseDateAttribute($value)
    {
        $this->attributes['increaseDate'] = !empty($value) ? Carbon::createFromFormat(config('app.getFormat'), $value)->format(config('app.date_format')) : null;
    }

   }
