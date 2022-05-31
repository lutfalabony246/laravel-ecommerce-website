<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\CustomerAddress;
use App\Models\PostCode;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use App\Models\Order;
use Carbon\Carbon;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Support\Facades\Auth;

// for payment getway
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    //  District selected
    public function DistrictGetAjax($division_id){

        // dd($division_id);
    	$ship = District::where('division_id',$division_id)->get();
        return response($ship);
    	// return json_encode($ship);

    } // end method


    // state selected
     public function StateGetAjax($district_id){
        // dd($district_id);

    	$ship = PostCode::where('district_id',$district_id)->get();
        return response($ship);

    } // end method


    // checkout store route
    public function CheckoutStore(Request $request){
        $validator =Validator::make($request->all(), [
            'street_address' => 'required',
            'district_id' => 'required',
            'thana_id' => 'required',
            'name' => 'required',
            'phone_no' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else{

            $customerAddress = CustomerAddress::where('user_id', Auth::user()->id)->update(['status' => 0,]);
            $address =new CustomerAddress();
            $address->user_id = Auth::user()->id;
            $address->street_address = $request->street_address;
            $address->district_id = $request->district_id;
            $address->thana_id = $request->thana_id;
            $address->name = $request->name;
            $address->phone_no = $request->phone_no;
            $address->floor_no = $request->floor_no;
            $address->appartment_no = $request->appartment_no;
            $address->status=1;
            $address->save();

            return response([
                'status' => 200,
                'message' => 'Address Stored Successfully',
                'address' => $address
            ]);
        }


    } // end mathod


  // Chnage Payment Options

        public function ChangePayment($order_id){

           $payments = Order::where('id', $order_id)->first();
        //    $totalOrder = Order::count();
            //dd($totalOrder);
            return view('frontend.checkout.change_payment_option',compact('payments'));
        } // end



} // main end
