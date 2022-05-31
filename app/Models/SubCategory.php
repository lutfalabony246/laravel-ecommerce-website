<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_name',
        'sub_category_slug_name',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subsubcategories()
    {
        return $this->hasMany(SubSubCategory::class, 'subcategory_id', 'id');
    }
}
