<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //mthod start
    public function GeneralAdd() {
        

    return view('backend.setting.add_general_setting');


    }

    //method end
}
