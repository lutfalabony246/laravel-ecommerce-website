<?php

namespace App\Http\Controllers\User;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PageCartController extends Controller
{
    // Mycart view
    public function MyCart(){

        if (Auth::check()) {

        return view('frontend.wishlist.view_mycart');
        }
        else{
            $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);

            }


    } //end mathod

    // my cart data show

    public function GetCartProduct(){
        // use bumbum-99 package
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),

        ));

    } // end mathod


  // my cart remove
    public function RemoveCartProduct($rowId){

        Cart::remove($rowId);

                if (Session::has('coupon')) {
                        Session::forget('coupon');
                        }

        return response()->json(['success' => 'Successfully Remove From Cart']);


    } // end matthod

     // Cart Increment
     public function CartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

           Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
            ]);
        }
        return response()->json('increment');
    } // end mehtod

     // Cart Decrement
     public function CartDecrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);


        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

           Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
            ]);
        }
        return response()->json('Decrement');
    }//end mehtod
} // main end
    