<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileSystem_ConfigurationController extends Controller
{
      //mthod start
      public function FileSystem_Configuration_Add() {
        

        return view('backend.setting.add_file_system_configuration');
    
    
        }
    
        //method end
}
