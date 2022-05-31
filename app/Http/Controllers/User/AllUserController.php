<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;
use App\Mail\OrderMail;
use PDF;
use DB;

use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;

class AllUserController extends Controller
{


    // all users mathod
    public function MyOrders(){
        // $order = Order::with('user','division','district','state')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	// $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();


        // dd($deliverdProducts);
        // $orderItem = OrderItem::with('product')->where('product_id',$product_id)->orderBy('id','DESC')->get();
        // dd($deliverdProducts);
        // dd($orders);
        $orders=Order::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();


        // $deliverdProducts =  OrderItem::select('product_id')->groupBy('product_id')
        //     ->join('orders', 'order_items.order_id', '=', 'orders.id')
        //     ->join('products', 'products.id', '=', 'order_items.product_id')
        //     ->where('orders.status', 'delivered')
        //     ->get(['products.*']);
        //     dd($deliverdProducts) ;

    	return view('frontend.user.order.order_view',compact('orders'));

    } // end mathod

    // OrderDetails
    public function OrderDetails($order_id){


        $ordersDetails = Order::with('orderItems','orderItems.product')->where('id',$order_id)->first();

        return response($ordersDetails);

    } // end mehtod
    // public function CancelOrder($id){
    //     Order::findOrFail($id)->update(['status' => 'cancel']);
    //     $notification = array(
    //         'message' => 'Order Canceled Successfully',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('my.orders')->with($notification);
    // } // end mehtod

    // pdf  download
    // public function InvoiceDownload($order_id){
    //     $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    //      $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    //      return view('frontend.user.order.order_invoice',compact('order','orderItem'));


    public function InvoiceDownload($order_id){

        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('frontend.user.order.order_invoice',compact('order','orderItem'));

        // return view('frontend.user.order.order_invoice',compact('order','orderItem'));
        $pdf = PDF::loadView('frontend.user.order.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);

        return $pdf->download('invoice.pdf');

     } // end mehtod
     // Order Return for user
     public function ReturnOrder(Request $request,$order_id){

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('Y-m-d'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,

        ]);


      $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);

    } // end method


    // Return Order List for user
    public function ReturnOrderList(){

        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        // dd($orders);
        return view('frontend.user.order.return_order_view',compact('orders'));

    } // end method

    // cancel order
    public function CancelOrders(){

        $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
        // dd($orders);
        return view('frontend.user.order.cancel_order_view',compact('orders'));



    } // end method



     ///////////// Order Traking ///////
      public function OrderTraking(Request $request){

        $invoice = $request->code;

        $track = Order::where('invoice_no',$invoice)->first();

        if ($track) {
        return view('frontend.traking.track_order',compact('track'));

        }else{

            $notification = array(
            'message' => 'Invoice Code Is Invalid',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

        }

    } // end mehtod
    public function CancelOrder($id){
        Order::findOrFail($id)->update(['status' => 'cancel']);
        $notification = array(
            'message' => 'Order Canceled Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('my.orders')->with($notification);
    } // end mehtod

} // end main
