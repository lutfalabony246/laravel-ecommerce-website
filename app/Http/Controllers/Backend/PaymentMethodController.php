<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
     //mthod start
     public function PaymentMethodAdd() {  
        

        return view('backend.setting.add_payment_method');
    
    
        }
    
        //method end
}
