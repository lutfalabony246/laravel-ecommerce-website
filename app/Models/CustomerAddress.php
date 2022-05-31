<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function district(){
    	return $this->belongsTo('Devfaysal\BangladeshGeocode\Models\District','district_id','id');
    }
}
