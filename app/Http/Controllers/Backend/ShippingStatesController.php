<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingStatesController extends Controller
{
    ////mthod start
    public function Shipping_StatesAdd() {  
        

        return view('backend.setting.shipping.shipping_states');
    
    
    
        }
    
        //method end
}
