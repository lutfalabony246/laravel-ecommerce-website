<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingZoneController extends Controller
{
     //mthod start
     public function ShippingZoneAdd() {
        

        return view('backend.setting.shipping.shipping_zone');
        // shipping.shipping_countries
    
        }
    
        //method end





 //mthod start
 public function ShippingZoneInformationAdd() {
        

    return view('backend.setting.shipping.shipping_zone_information');
    // shipping.shipping_countries

    }

    //method end






}
