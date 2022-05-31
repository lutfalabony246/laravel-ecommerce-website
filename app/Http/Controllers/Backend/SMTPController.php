<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SMTPController extends Controller
{
    //mthod start
    public function SMTP_Add() {  
        

        return view('backend.setting.add_smtp');
    
    
        }
    
        //method end
}
