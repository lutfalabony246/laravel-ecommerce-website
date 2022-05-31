<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    //mthod start
    public function CurrencyAdd() {
        

        return view('backend.setting.currency');
       
    
        }
    
        //method end


}

