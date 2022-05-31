<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingCountriesController extends Controller
{
    ////mthod start
    public function Shipping_CountriesAdd() {  
        

        return view('backend.setting.shipping.shipping_countries');
    
    
        }
    
        //method end
}
