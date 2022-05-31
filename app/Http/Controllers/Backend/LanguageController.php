<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
      //mthod start
      public function LanguageAdd() {
        

        return view('backend.setting.language');
    
    
        }
    
        //method end



 //mthod start
 public function Language_InformationAdd() {
        

  return view('backend.setting.add_language');


  }

  //method end


}
