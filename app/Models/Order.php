<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function division(){
    	return $this->belongsTo('Devfaysal\BangladeshGeocode\Models\Division','division_id','id');
    }

      public function district(){
    	return $this->belongsTo('Devfaysal\BangladeshGeocode\Models\District','district_id','id');
    }

      public function state(){
    	return $this->belongsTo('Devfaysal\BangladeshGeocode\Models\Upazila','state_id','id');
    }

      public function user(){
    	return $this->belongsTo(User::class,'user_id','id');
    }

    public function orderItems(){
      return $this->hasMany(OrderItem::class,'order_id','id');
    }

    public function customerAddress(){
        return $this->belongsTo(CustomerAddress::class,'customer_id','id');
    }
}
