<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;



    protected $fillable = [
        'category_name',
        'category_slug_name',
        'category_icon',
    ];

    public function subcategory()
    {


            return $this->hasMany(SubCategory::class, 'category_id', 'id');

    }
    public function subsubcategory()
    {
            return $this->hasMany(SubSubCategory::class, 'category_id', 'id');
    }


    public function ordersProduct(){
        return $this->hasManyThrough(OrderItem::class,Product::class,'category_id','product_id','id','id');
    }


    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }
    

}
