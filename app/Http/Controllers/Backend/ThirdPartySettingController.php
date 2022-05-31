<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThirdPartySettingController extends Controller
{
    //mthod start
    public function ThirdPartySetting_Add() {  
        

        return view('backend.setting.add_third_party_settings');
    
    
        }
    
        //method end
}
