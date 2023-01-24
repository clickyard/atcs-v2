<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guarefrances extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'guarefrances';

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
    protected $fillable = [
                  'grname',
                  'grnationality',
                  'grnationalityNo',
                  'grcountry_id',
                  'grstate_id',
                  'grcity',
                  'grblock',
                  'grhouseNo',
                  'grstreet',
                  'grwork_address',
                  'grtel',
                  'created_by',
                  'updated_by',
                  'gua_id'
              ];

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
        return $this->belongsTo('App\Models\Country','grcountry_id','id');
    }

    /**
     * Get the State for this model.
     *
     * @return App\Models\State
     */
    public function State()
    {
        return $this->belongsTo('App\Models\State','grstate_id','id');
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
     * Get the Guarantor for this model.
     *
     * @return App\Models\Guarantor
     */
    public function Guarantor()
    {
        return $this->belongsTo('App\Models\Guarantor','gua_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
