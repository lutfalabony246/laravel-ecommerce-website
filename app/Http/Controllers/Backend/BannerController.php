<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;
use Image;

class BannerController extends Controller
{
    // Banner view
    public function BennarView(){
        $bennars =Banner::all();
        return view('backend.banner.banner_view',compact('bennars'));

    } // end mathod


   // Banner Store
    public function BennarStore(Request $request){

   $request->validate([

    // 'title' => 'required',
    // 'description' => 'required',
    'bennar_img' => 'required',

   ],[

    'bennar_img.required' => 'Input The Banner Img',
   ]);

   // Banner Img upload and save
   $image = $request->file('bennar_img');
   $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
   Image::make($image)->resize(785,225)->save('upload/banner/'.$name_gen );
   $save_url = 'upload/banner/'.$name_gen;

   Banner::insert([
            'title' => $request->title,
            'description' => $request->description,

            'bennar_img' => $save_url,
        ]);


        $notification = array(
            'message' =>'Banner Create successfully',
            'alert-type' =>'success'
        );

        return redirect()->back();

          } // end mathod



    // Banner Edit
        public function BennarEdit($admin,$id){
            $bennars = Banner::findOrFail($id);
            return view('backend.banner.banner_edit', compact('bennars'));
        } // end mathod

        // Banner Update
        public function BennarUpdate( Request $request){


        $bennar_id = $request->id;
        $old_img = $request->old_img;

        if ( $request->file('bennar_img')) {
            // unlink($old_img);
        $image = $request->file('bennar_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(785,225)->save('upload/banner/'.$name_gen );
        $save_url = 'upload/banner/'.$name_gen;

        Banner::findOrFail($bennar_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'bennar_img' => $save_url,

        ]);

        $notification = array(
            'message' =>'Banner update successfully',
            'alert-type' =>'success'
        );

        return redirect()->route('role.bennar.manage',config('fortify.guard'))->with($notification);

            }else{
                Banner::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,

            ]);
                $notification = array(
                'message' =>'Bennar update successfully',
                'alert-type' =>'info'
            );
            return redirect()->route('role.bennar.manage',config('fortify.guard'))->with($notification);

            }
         }  // end mathod


    // Banner Delete
        public function BennarDelete($admin,$id){
        $bennar = Banner::findOrFail($id);
        // $img = $bennar->bennar_img;
        // unlink($img);
        Banner::findOrFail($id)->delete();

        $notification = array(
        'message' =>'Banner Delete sucessfully',
        'alert-type' =>'info'
        );
        return redirect()->back()->with($notification);
        } // end method
        
     // Banner DeActive
     public function BennarDeactive($guard,$id){
        Banner::findOrFail($id)->update([ 'status' => 0, ]);

        // pass the sms
        $notification = array(
            'message' => 'Banner Deactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end mathod

       // Active
       public function BennarActive($guard,$id){
        Banner::findOrFail($id)->update([ 'status' => 1, ]);

        // pass the sms
        $notification = array(
            'message' => 'Banner Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }// end mathod



} // main end

