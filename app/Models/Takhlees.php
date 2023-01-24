<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Takhlees extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function emportcar()
    {
        return $this->belongsTo('App\Models\Emportcars','emp_id','id');
    }
}
