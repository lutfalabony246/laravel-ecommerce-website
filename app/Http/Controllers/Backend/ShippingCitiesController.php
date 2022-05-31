<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingCitiesController extends Controller
{
    ////mthod start
    public function ShippingCitiesAdd() {  
        

        return view('backend.setting.shipping.shipping_cities');
    
    
        }
    
        //method end
}
