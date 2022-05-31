<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Intervention\Image\Facades\Image;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function uploadImageSize($prefix,$image,$path,$width,$height){
        $image_name=$prefix.'-'.time().".".$image->getClientOriginalExtension();
        $image_path='uploads/'.$path.'/'.$image_name;
        Image::make($image)->resize($width,$height)->save('upload/'.$path.'/'.$image_name);
        return $image_path;
    }

}
