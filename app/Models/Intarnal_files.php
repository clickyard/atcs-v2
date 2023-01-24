<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Carbon\Carbon;

class Intarnal_files extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'intarnal_files';

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
    //protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the emp for this model.
     *
     * @return App\Models\Emp
     */
    public function emp()
    {
        return $this->belongsTo('App\Models\Emportcars','emp_id');
    }

    /**
     * Set the exitDate.
     *
     * @param  string  $value
     * @return void
     */
    /*
    public function setEntryDateAttribute($value)
    {
        $this->attributes['entryDate'] =  Carbon::createFromFormat('Y-m-d',$value);
    }
    public function setExitDateAttribute($value)
    {
        $this->attributes['exitDate'] =  !empty($value) ? Carbon::createFromFormat(config('app.getFormat'), $value)->format(config('app.date_format')) : null;
    }
    */
    /**
     * Get exitDate in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getExitDateAttribute($value)
    {
       // return Carbon::createFromFormat($this->getDateFormat(), $value)->format('Y-m-d');
    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat($this->getDateFormat(), $value)->format('Y-m-d');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromFormat($this->getDateFormat(), $value)->format('Y-m-d');
    }

}
