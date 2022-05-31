<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function privacy(){
        return view('frontend.information.privacy');
    }

    public function aboutPage(){
        return view('frontend.information.about_page');
    }

    public function termsCondition(){
        return view('frontend.information.terms_condition');
    }

    public function returnPolicy(){
        return view('frontend.information.return_policy');
    }
}
