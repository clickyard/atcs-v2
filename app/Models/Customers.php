<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model
{
    
    use HasFactory;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

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
    protected $casts = [

        'addMore'=>'array'
    ];
    
    /**
     * Get the Country for this model.
     *
     * @return App\Models\Country
     */
    public function Country()
    {
        return $this->belongsTo('App\Models\Countries','country_id','id');
    }

    /**
     * Get the State for this model.
     *
     * @return App\Models\State
     */
    public function State()
    {
        return $this->belongsTo('App\Models\States','state_id','id');
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
     * Get the car for this model.
     *
     * @return App\Models\Car
     */
    public function car()
    {
        return $this->hasmany('App\Models\Cars','customer_id','id')->with('emportcar');
    }

    /**
     * Get the custrefrance for this model.
     *
     * @return App\Models\Custrefrance
     */
    public function custrefrance()
    {
        return $this->hasmany('App\Models\Custrefrances','customer_id','id');
    }

    /**
     * Get the emportcar for this model.
     *
     * @return App\Models\Emportcar
     */
    public function emportcar()
    {
        return $this->hasManyThrough(   'App\Models\Emportcars'::class,
                                        'App\Models\Cars'::class ,
                                        'customer_id',
                                        'car_id',
                                        'id',
                                        'id'
    );
                                  //  ->where('Emportcars.entryDate', '=','max(Emportcars.entryDate)');
                                  //  ->get();
                                  //  ->orderBy('Emportcars.entryDate', 'desc');
    }

    /**
     * Get the guarantor for this model.
     *
     * @return App\Models\Guarantor
     */
    public function guarantor()
    {
        return $this->hasOne('App\Models\Guarantors','customer_id','id');
    }

    
    /**
     * Set the passportDate.
     *
     * @param  string  $value
     * @return void
     */
    public function setPassportDateAttribute($value)
    {
        $this->attributes['passportDate'] = !empty($value) ? Carbon::createFromFormat(config('app.getFormat'), $value)->format(config('app.date_format')) : null;
    }

    /**
     * Set the residenceDate.
     *
     * @param  string  $value
     * @return void
     */
    public function setResidenceDateAttribute($value)
    {
        $this->attributes['residenceDate'] = !empty($value) ? Carbon::createFromFormat(config('app.getFormat'), $value)->format(config('app.date_format')) : null;
    }

    /**
     * Get passportDate in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getPassportDateAttribute($value)
    {
        return Carbon::createFromFormat(config('app.getFormat'), $value)->format(config('app.date_format'));
    }

    /**
     * Get residenceDate in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getResidenceDateAttribute($value)
    {
        return Carbon::createFromFormat(config('app.getFormat'), $value)->format(config('app.date_format'));
    }


}

