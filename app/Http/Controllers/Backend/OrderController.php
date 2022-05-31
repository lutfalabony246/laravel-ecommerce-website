<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Asset;
use Auth;
use Carbon\Carbon;
use PDF;
use App\Models\Product;
use DB;



class OrderController extends Controller
{
    // Pending order
    public function PendingOrder()    {

        $orders = Order::where('status', 'Pending')->latest()->get();

    	return view('backend.orders.pending_orders', compact('orders'));

    }// end mathod


    // pending orders details
     public function PendingOrdersDetails($role,$order_id){
		 $order = Order::with('division','district','state','user')->where('id',$order_id)->first();

		 $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
		// dd($orderItem);

    	return view('backend.orders.details_page', compact('order','orderItem'));

     }// end mathod


    // Confirmed Orders
    public function ConfirmedOrders()
    {
        $orders = Order::where('status', 'confirm')->orderBy('id', 'DESC')->get();

        return view('backend.orders.confirmed_orders', compact('orders'));
    } // end mehtod


    // Processing Orders
    public function ProcessingOrders()
    {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders', compact('orders'));
    } // end mehtod


    // Picked Orders
    public function PickedOrders()
    {
        $orders = Order::where('status', 'picked')->orderBy('id', 'DESC')->get();
        return view('backend.orders.picked_orders', compact('orders'));
    } // end mehtod



    // Shipped Orders
    public function ShippedOrders()
    {
        $orders = Order::where('status', 'shipped')->orderBy('id', 'DESC')->get();
        return view('backend.orders.shipped_orders', compact('orders'));
    } // end mehtod


    // Delivered Orders
    public function DeliveredOrders()
    {
        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders', compact('orders'));
    } // end mehtod


    // Cancel Orders
    public function CancelOrders()
    {
        $orders = Order::where('status', 'cancel')->orderBy('id', 'DESC')->get();
        return view('backend.orders.cancel_orders', compact('orders'));
    } // end mehtod



    // Pending order update
    public function PendingToConfirm($role,$order_id)
    {

        Order::findOrFail($order_id)->update(['status' => 'confirm','confirmed_date' => Carbon::now()]);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.pending.orders',config('fortify.guard'))->with($notification);
    } // end method


    public function ConfirmToProcessing($role,$order_id)
    {

        Order::findOrFail($order_id)->update(['status' => 'processing','processing_date'=> Carbon::now()]);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.confirmed-orders',config('fortify.guard'))->with($notification);
    } // end method


    //   // Picked Update
    public function ProcessingToPicked($role,$order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'picked', 'picked_date'=> Carbon::now()]);
        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('role.confirm-processing',config('fortify.guard'))->with($notification);
    } // end method



     // Shipped Update
    public function PickedToShipped($role,$order_id)
    {

        Order::findOrFail($order_id)->update(['status' => 'shipped','shipped_date'=>Carbon::now()]);

        $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.picked-orders',config('fortify.guard'))->with($notification);
    } // end method



    //   // Delivered update
    public function ShippedToDelivered_20($role,$order_id)
    {


        $product = OrderItem::where('order_id', $order_id)->get();

        foreach ($product as $item) {
            Product::where('id', $item->product_id)
                ->update(['product_qty' => DB::raw('product_qty-' . $item->qty)]);
        }
        Order::findOrFail($order_id)->update(['status' => 'delivered','delivered_date'=> Carbon::now()]);
        $totalsale = Order::where('id', $order_id)->where('status', '=', 'delivered')->pluck('amount');
        $asset = Asset::find(1);
        $devit  = $asset->credit;
        $devit        += (float) $totalsale[0];
        $asset->credit = $devit;
        //    dd($asset);
        $asset->save();


        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.shipped-orders',config('fortify.guard'))->with($notification);
    } // end method




    //   // Delivered Cancel
    public function DeliveredToCancel($role,$order_id)
    {
        $totalsale=Order::where('id',$order_id)->where('status','=', 'delivered')->pluck('amount');
        if($totalsale->count() == 0){
            $totalsale[0]=0;
        }
        $asset=Asset::find(1);
        $devit  = $asset->debit;
        $devit  += (float) $totalsale[0];
        $asset->debit = $devit;
        //    dd($asset);
           $asset->save();
        $notification = array(
              'message' => 'Order Cancel Successfully',
              'alert-type' => 'success'
          );
        return redirect()->route('role.delivered-orders',config('fortify.guard'))->with($notification);

    } // end method






    // Order invoice Download
    public function AdminInvoiceDownload($role,$order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('backend.orders.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('role.invoice.pdf',config('fortify.guard'));
    } // end method

} // main end
