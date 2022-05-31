<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name_cats_eye',
        'brand_name_easy',
        
        'brand_image',
    ];
    
    
    public function products()
    {
        return $this->hasMany(product::class,'brand_id','id');
    }

}



