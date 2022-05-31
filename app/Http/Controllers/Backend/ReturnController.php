<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class ReturnController extends Controller
{
    // Return Order list show
    public function ReturnRequest(){

    	$orders = Order::where('return_order',1)->orderBy('id','DESC')->get();
        //dd($orders);
    	return view('backend.return_order.return_request',compact('orders'));

    }// end method

   // Return Approve request
    public function ReturnRequestApprove($admin, $order_id){

    	Order::where('id',$order_id)->update(['return_order' => 2]);


        $orderItemProduct=OrderItem::where('order_id', $order_id)->select('product_id','qty')->get();
        $orderItemProductIds= $orderItemProduct->pluck('product_id')->toArray();
   // dd($orderItemProductIds);
        $products = Product::whereIn('id',$orderItemProductIds)->get();

        foreach($products as $key=>$product){
           $product->product_qty += $orderItemProduct[$key]['qty'];
           $product->save();
        }

    	$notification = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod

    // Return all request
    public function ReturnAllRequest(){

    	$orders = Order::where('return_order',2)->orderBy('id','DESC')->get();
    	return view('backend.return_order.all_return_request',compact('orders'));

    }



} // main end
