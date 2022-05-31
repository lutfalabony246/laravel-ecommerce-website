<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;



class PosController extends Controller
{
    public function search($id)
    {
        $products = DB::table('products')->where('product_name', 'Like', '%' . $id . '%')->get();
        return response()->json($products);
    }
    public function pos()
    {
        $categorys = Category::all();
        $brands = Brand::all();
        $products = Product::all();
        $customers = User::all();
        return view('backend.pos.pos', compact('categorys', 'brands', 'products', 'customers'));
    }
    public function PosProductList($categorie_id)
    {
        if ($categorie_id == 0) {
            $product = Product::all();
            return $product;
        } else {
            $product = Product::where('category_id', $categorie_id)->get();

            return $product;
        }
    }
    public function PosBrandProductList($brand_id)
    {
        if ($brand_id == 0) {
            $brand = Product::all();
            return  $brand;
        } else {
            $brand = Product::where('brand_id', $brand_id)->get();

            return  $brand;
        }
    }
} // main end
