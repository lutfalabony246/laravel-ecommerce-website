<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CashController extends Controller
{
     public function CashOrder(Request $request){


    	if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::total());
    	}


		// $invoice = Order::findOrFail($order_id);
		//$user_id=Auth::id();
        $total_amount_with_vat = 0;
        $carts = Cart::content();
        foreach ($carts as $cart) {
            $total_amount_with_vat = $total_amount_with_vat + (($cart->price +$cart->options->vat) * $cart->qty);
        }

	 $total_amount = $total_amount_with_vat;


     $order_id = Order::insertGetId([
     	'user_id' => Auth::id(),
     	'division_id' => $request->division_id,
     	'district_id' => $request->district_id,
     	'state_id' => $request->state_id,
     	'name' => $request->name,
     	'email' => $request->email,
     	'phone' => $request->phone,
     	'post_code' => $request->post_code,
     	'notes' => $request->notes,

     	'payment_type' => 'Cash On Delivery',
     	'payment_method' => 'Cash On Delivery',

     	'currency' =>  'Usd',
     	'amount' => $total_amount,


     	'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
     	'order_date' => Carbon::now(),
     	'order_month' => Carbon::now()->format('F'),
     	'order_year' => Carbon::now()->format('Y'),
     	'status' => 'Pending',     
     	'created_at' => Carbon::now(),

     ]);

// dd(order_id);
     $carts = Cart::content();
     dd( $carts);
     foreach ($carts as $cart) {
     	OrderItem::insert([
     		'order_id' => $order_id,
     		'product_id' => $cart->id,
     		'color' => $cart->options->color,
     		'size' => $cart->options->size,
     		'qty' => $cart->qty,
     		'price' => (($cart->price +$cart->options->vat) *$cart->qty),
     		'created_at' => Carbon::now(),

     	]);
     }


    $order = Order::with('orderItems','orderItems.product','division','district','state')->where('id',$order_id)->first();
	event(new \App\Events\MyEvent($order));



    //Start Send Emails
    Mail::to($request->email)->send(new OrderMail($order));
    // End Send Email



     if (Session::has('coupon')) {
     	Session::forget('coupon');
     }

     Cart::destroy();

     $notification = array(
			'message' => 'Your Order Place Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('my.orders')->with($notification);


    } // end method


}
