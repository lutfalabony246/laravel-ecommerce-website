<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\SubCategory;
use App\Models\SubSubCategory;


class ShopController extends Controller
{
    public function ShopPage(){

        $products = Product::where('status',1)->orderBy('id','DESC');

        $categories = Category::orderBy('category_name','ASC')->get();
        return view('frontend.shop.shop_page',compact('products','categories'));

    } // end Method 
}
