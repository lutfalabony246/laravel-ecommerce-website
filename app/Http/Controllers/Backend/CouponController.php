<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    // Coupon view page

    public function CouponView()
    {

        $coupons = Coupon::orderBy('id', 'DESC')->get();
        // dd(  $coupons);
        return view('backend.coupon.coupon_view', compact('coupons'));
    } // end mathod


    // Insert Coupon
    public function CouponStore(Request $request)
    {

        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',

        ]);


        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Coupon Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method


    // Edit Coupon
    public function CouponEdit($role, $id)
    {
        $coupons = Coupon::findOrFail($id);
        return view('backend.coupon.coupon_edit', compact('coupons'));
    }


    // Update Coupon
    public function CouponUpdate(Request $request, $role, $id)
    {

        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'info'
        );

        // return redirect()->route('manage.coupon')->with($notification);
        return redirect()->route('role.manage.coupon', config('fortify.guard'))->with($notification);
    } // end mehtod

    // Delete Coupon
    public function CouponDelete($role,$id)
    {

        $coupon = Coupon::find($id);

        $coupon->delete();
        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
} // main end
