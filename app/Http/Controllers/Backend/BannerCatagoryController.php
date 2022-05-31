<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerCatagory;
use Intervention\Image\Facades\Image;
class BannerCatagoryController extends Controller
{
    // Banner view
    public function BennarView(){
        $bennars_category =BannerCatagory::all();
        return view('backend.bannerCatagory.banner_view',compact('bennars_category'));

    } // end mathod
    public function BennarStore(Request $request){
        $request->validate([

            //'banner_title' => 'required',

            'bennar_img' => 'required',
           ],[
            // 'banner_title.required' => 'Input The Banner Title',
            'bennar_img.required' => 'Input The Banner Img',
           ]);
           // Banner Img upload and save
           $image = $request->file('bennar_img');
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(585,140)->save('upload/banner_Category/'.$name_gen );
           $save_url = 'upload/banner_Category/'.$name_gen;

           BannerCatagory::insert([
                    'banner_title' => $request->banner_title,
                    'bennar_img' => $save_url,
                ]);

                $notification = array(
                    'message' =>'Banner Catagory Create sucessfully',
                    'alert-type' =>'success'
                );

                return redirect()->back();

    } // end mathod


    // Banner Edit
        public function BennarEdit($admin,$id){
            $bennars = BannerCatagory::findOrFail($id);
            // dd($bennars);
            return view('backend.bannerCatagory.banner_edit', compact('bennars'));
        } // end mathod

   // Banner Update
        public function BennarUpdate( Request $request){

        $bennar_id = $request->id;
        $old_img = $request->old_img;

        if ( $request->file('bennar_img')) {
            unlink($old_img);
            $image = $request->file('bennar_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(585,140)->save('upload/banner_Category/'.$name_gen );
        $save_url = 'upload/banner_Category/'.$name_gen;

        BannerCatagory::findOrFail($bennar_id)->update([
            'banner_title' => $request->banner_title,
            'bennar_img' => $save_url,

            // 'banner_title' => $request->banner_title,

    ]);


        $notification = array(
            'message' =>'Banner update sucessfully',
            'alert-type' =>'success'
        );

        return redirect()->route('role.bannerCategory.manage',config('fortify.guard'))->with($notification);
            }else{
                BannerCatagory::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,

            ]);
                $notification = array(
                'message' =>'Bennar update sucessfully',
                'alert-type' =>'info'
            );
            return redirect()->route('role.bannerCategory.manage',config('fortify.guard'))->with($notification);

            }
         }  // end mathod



     // Banner DeActive
     public function BennarDeactive($guard,$id){
        BannerCatagory::findOrFail($id)->update([ 'status' => 0, ]);

        // pass the sms
        $notification = array(
            'message' => 'Category banner Deactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end mathod

       // Active
       public function BennarActive($guard,$id){
        BannerCatagory::findOrFail($id)->update([ 'status' => 1, ]);

        // pass the sms
        $notification = array(
            'message' => 'Category banner Deactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }// end mathod

 // Banner Delete
 public function BennarDelete($admin,$id){
    $bennar = BannerCatagory::findOrFail($id);
    //'banner_title' => $request->banner_title,
    $title = $bennar->banner_title;
    $img = $bennar->bennar_img;
    unlink($img);
    BannerCatagory::findOrFail($id)->delete();

    $notification = array(
'message' =>'Banner Delete sucessfully',
'alert-type' =>'info'
);
return redirect()->back()->with($notification);

} // end mathod

} // main end
