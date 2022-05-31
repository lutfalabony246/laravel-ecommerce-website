<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderDone;
use App\Models\OrderDoneItem;
use App\Models\Product;
use App\Models\Pos;
use App\Helper\ReceiptPrinter;
use App\Models\HoldItem;
use Illuminate\Http\Request;
use PDF;
use Session;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Carbon\Carbon;
use Stripe\Customer;
use Auth;

class AdminCartController extends Controller
{


    public static $product = [];
    public static $grandtotal = 0;

    public function AddToCart(Request $request, $id)
    {
        $check = Pos::where('pro_id', $id)->first();
        if ($check) {
            $this->IncrementProductCart($check->id);
            return response(['message' => 'product Incremented Successfully.']);
        } else {
            $product = Product::find($id);
            // dd( $product->vat);
            $cart = new Pos();
            $cart->pro_id = $product->id;
            $cart->pro_name = $product->product_name;
            $cart->product_code = $product->product_code;
            $cart->stock = $product->product_qty;
            $cart->vat =$product->vat;
            $cart->pro_quantity = 1;
            $cart->product_price = $product->selling_price;
             $cart->discount_price = $product->discount_price;
             $cart->totalSellingPrice = $product->selling_price;
             $cart->totalDiscountPrice = $product->discount_price;
            if ($product->discount_price == null) {
                $cart->sub_total = $product->selling_price;
            } else {
                $cart->sub_total = $product->discount_price;
            }
            $cart->save();
            return response()->json(['message' => 'Product Added Successfully', 'cart' => $cart]);
        }
    }

    public function GetCart()
    {
        $pos = DB::table('pos')->get();

        return response()->json($pos);
    }

    public function RemoveCart($id)
    {
        $res = Pos::where('id', $id)->delete();
        return response()->json(['message' => 'Product Removed Successfully']);
    }

    public function IncrementProductCart($id)
    {
        $quantity = Pos::where('id', $id)->increment('pro_quantity');

        $product = Pos::where('id', $id)->first();
        $productID=$product->pro_id;
        $productVat = Product::where('id', $productID)->first();

         $subtotal = $product->pro_quantity * $product->discount_price;

         $totalVat = $product->pro_quantity * $productVat->vat;

         $totalSellingPrice=$product->pro_quantity * $product->product_price;
         $totalDiscountPrice=$product->pro_quantity * $product->discount_price;


        DB::table('pos')->where('id', $id)->update([
            'sub_total' => $subtotal,
            'vat' => $totalVat,
            'totalSellingPrice' => $totalSellingPrice,
            'totalDiscountPrice' => $totalDiscountPrice,

        ]);
        return response()->json(['message' => 'Product incremented Successfully']);
    }

    public function DecrementProductCart($id)
    {
        $pos = Pos::where('id', $id)->decrement('pro_quantity');
        $product = Pos::where('id', $id)->first();
        $productID=$product->pro_id;
        $productVat = Product::where('id', $productID)->first();
         $subtotal = $product->pro_quantity * $product->discount_price;
         $totalVat = $product->pro_quantity * $productVat->vat;
         $totalSellingPrice=$product->pro_quantity * $product->product_price;
         $totalDiscountPrice=$product->pro_quantity * $product->discount_price;
        DB::table('pos')->where('id', $id)->update([
             'sub_total' => $subtotal,
              'vat' => $totalVat,
              'totalSellingPrice' => $totalSellingPrice,
            'totalDiscountPrice' => $totalDiscountPrice,
        ]);

        return response()->json(['message' => 'Product decremented Successfully']);
    }

    public function ClearProductCart()
    {
        Pos::truncate();
        return response()->json(['message' => 'Cart Cleared Successfully']);
    }

    // order confirm
    public function OrderConfirm(Request $request)
    {
         //dd($request->all());

        $customer = User::findorfail($request->customerId);
        $invoice_no = 'POS' . mt_rand(10000000, 99999999);
        $order_id = Order::insertGetId([
            'user_id' => $request->customerId,
            'totalitem' => $request->totalitem,
            'totalAmount' => $request->totalAmount,
            'totalDiscount' => $request->totalDiscount,
            'spesial_discount' => $request->spesial_discount,
            'vat' => $request->vat,
            'cash_grand_tot' => $request->cash_grand_tot,
            'cashPaid_show' => $request->cashPaid_show,
            'changeAmount' => $request->changeAmount,
            'name' => $customer->name,
            'email' =>  $customer->email,
            'phone' =>  $customer->phone,
            'post_code' => "Cash On Delivery",
            'payment_type' => "Cash On Delivery",
            'currency' => "taka",
            'amount' => $request->totalPayable,
            'invoice_no' => $invoice_no,
            'order_date' => Carbon::now(),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Delivered',
            'created_at' => Carbon::now(),
        ]);

        $pos = DB::table('pos')->get();
        foreach ($pos as $item) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $item->pro_id,
                'qty' => $item->pro_quantity,
                'price' => $item->product_price,
                'created_at' => Carbon::now(),
            ]);
        }
        $product = OrderItem::where('order_id', $order_id)->get();
            foreach ($product as $item) {
                Product::where('id', $item->product_id)
                    ->update(['product_qty' => DB::raw('product_qty-' . $item->qty)]);
            }

        Session::put('carts', Pos::all());
        Session::put('totalitem', $request->totalitem);
        Session::put('totalAmount', $request->totalAmount);
        Session::put('totalDiscount', $request->totalDiscount);
        Session::put('spesial_discount', $request->spesial_discount);
        Session::put('vat', $request->vat);
        Session::put('cash_grand_tot', $request->cash_grand_tot);
        Session::put('cashPaid_show', $request->cashPaid_show);
        Session::put('changeAmount', $request->changeAmount);
        Session::put('invoice_no',  $invoice_no);
        Session::put('customer_id', $request->customerId);


        // Session::put('money', $request->totalAmount);
        // Session::put('discount', $request->totalDiscount);
        // Session::put('totalPayable', $request->totalPayable);
        // Session::put('amount_pay', $request->amount_pay);
        // Session::put('change_return', $request->change_return);
        // Session::put('vat',  $request->vat);

        Pos::truncate();

        return response()->json(['message' => 'Order Placed Successfully', $pos]);
    }


    function orderrecipt()
    {
        $products = Session::get('carts');
        $totalitem = Session::get('totalitem');
        $totalAmount = Session::get('totalAmount');
        $totalDiscount = Session::get('totalDiscount');
        $spesial_discount = Session::get('spesial_discount');
        $vat = Session::get('vat');
        $cash_grand_tot = Session::get('cash_grand_tot');
        $cashPaid_show = Session::get('cashPaid_show');
        $changeAmount = Session::get('changeAmount');
        $invoice_no = Session::get('invoice_no');
        $customer_id = Session::get('customer_id');

        $customer_name = User::Find($customer_id);
        $customer_name = $customer_name->name;

        $data = ['products' => $products, 'totalitem' => $totalitem, 'totalAmount' => $totalAmount, 'totalDiscount' => $totalDiscount,'spesial_discount' => $spesial_discount, 'vat' => $vat,
         'cash_grand_tot' => $cash_grand_tot,'cashPaid_show' => $cashPaid_show,'changeAmount' => $changeAmount, 'customer_id' => $customer_id, 'customer_name' => $customer_name, 'invoice_no' => $invoice_no];

        return View('backend.pos.posview_new', compact('data'));
    }

    // add new customer  #0000001
    public function AddCustomer(Request $request)
    {
       $request->validate([
            'email' => 'unique:users'
        ]);
        $customer_id=User::select('customer_id')->orderBy('customer_id', 'DESC')->first();
        if($customer_id==null){
            $strval="#000000";
        }else{
            $strval= $customer_id->customer_id ;

        }
        $str = substr($strval,1);
        $customer_code = intval($str)+1;
     
         $customer_id_code =0;
        if($customer_code < 10){
            $customer_id_code= '#000000'. $customer_code;
        }elseif($customer_code <=100){
            $customer_id_code = '#00000'. $customer_code;
        }
        elseif($customer_code <=1000){
            $customer_id_code= '#0000'. $customer_code;
        } elseif($customer_code <=10000){
            $customer_id_code = '#000'. $customer_code;
        } elseif($customer_code <=100000){
            $customer_id_code = '#00'. $customer_code;
        }
        else{
            $customer_id_code = '#0'. $customer_code;
        }
    // ------------------------auto data create---------------------

    
    $user = new User();
        $user->name = $request->name;
        $user->customer_id =$customer_id_code;

        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return response()->json($user);
    }
    public function filterCategory(Request $request, $category)
    {
        if ($category == 'all') {
            $products = Product::all();
            return response($products);
        } else {
            $products = Product::where('category_id', $category)->get();
            return response($products);
        }
    }
    public function filterBrand(Request $request, $brand)
    {
        if ($brand == 'all') {
            $brand = Product::all();

            return response($brand);
        } else {
            $brand = Product::where('brand_id', $brand)->get();
            return response($brand);
        }
    }
    public function filterProduct(Request $request)
    { 
        if($request->search == null){
            $productName = Product::all();
            return response($productName);
        }else{
            $productName = Product::where('product_name','like','%'.$request->search.'%')->get();
            return response($productName);
        }
    }

    public function HoldOrder(Request $request)
    {
        $customer = User::findorfail($request->customerId);
        $invoice_no = 'EOS' . mt_rand(10000000, 99999999);
        $order_id = Order::insertGetId([
            'user_id' => $request->customerId,
            'name' => $customer->name,
            'email' =>  $customer->email,
            'phone' =>  $customer->phone,
            'post_code' => "Cash On Delivery",
            'payment_type' => "takeaway",
            'currency' => "taka",
            'amount' => $request->totalPay,
            'invoice_no' => $invoice_no,
            'order_date' => Carbon::now(),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Hold',
            'return_reason' => $request->reference,
            'created_at' => Carbon::now(),
        ]);

        $pos = DB::table('pos')->get();
        foreach ($pos as $item) {
            HoldItem::insert([
                'order_id' => $order_id,
                'product_id' => $item->pro_id,
                'qty' => $item->pro_quantity,
                'price' => $item->product_price,
                'created_at' => Carbon::now(),
            ]);
        }

        Pos::truncate();

        return response()->json([
            'message' => 'Order Placed Successfully',
        ]);
    }

    public function GetHoldOrder()
    {
        $orders = Order::where('status', 'Hold')->get();
        return response($orders);
    }

    public function GetHoldOrderItem($id)
    {
        $hold_item = HoldItem::where('order_id', $id)->get();

        foreach ($hold_item as $item) {
            $product = Product::find($item->product_id);

            if ($product->discount_price == null) {
                $subtotal = $product->selling_price;
            } else {
                $subtotal = $product->discount_price;
            }

            // dd($product);
            Pos::insert([
                'pro_id' => $item->product_id,
                'pro_name' => $product->product_name,
                'product_code' => $product->product_code,
                'vat' => $product->vat,
                'stock' => $product->product_qty,
                'pro_quantity' => $item->qty,
                'product_price' => $item->price,
                'discount_price' => $product->discount_price,
                'totalSellingPrice' => $product->selling_price,
                'totalDiscountPrice' => $product->discount_price,
                'sub_total' => $subtotal,
                'created_at' => Carbon::now(),
            ]);
        }

        Order::where('id', $hold_item[0]->order_id)->delete();
        HoldItem::where('order_id', $id)->delete();

        return response([
            'message' => "product back to cart again!!!"
        ]);
    }

    public function ShowHoldOrderItem($id)
    {
        $hold_item = HoldItem::where('order_id', $id)->with('products')->get();
        return response($hold_item);
    }
}
