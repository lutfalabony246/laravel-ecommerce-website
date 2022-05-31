<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Social_Media_LoginController extends Controller
{
    //mthod start
    public function SocialMediaLogin_Add() {  
        

        return view('backend.setting.add_social_media_login');
    
    
        }
    
        //method end
}
