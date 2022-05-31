<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    //  //mthod start
    public function TaxAdd() {
        

        return view('backend.setting.shipping.tax');
        // shipping.shipping_countries
    
        }
    
        //method end
}
