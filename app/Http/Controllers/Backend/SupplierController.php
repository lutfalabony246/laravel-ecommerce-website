<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Image;

class SupplierController extends Controller
{
    public function show()
    {
        $suppliers = Supplier::all();
        return view('backend.suppliers.suppliers_view', compact('suppliers'));
    }

    public function store($role, Request  $request)
    {
        // for generate random number
        function generateRandomString($length = 6)
        {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
          $grn = generateRandomString();
            $supplier = new Supplier();
            $supplier->supplyer_id_code = '#' . $grn;
            $supplier->supplyer_name = $request->supplyer_name;
            $supplier->company_name = $request->company_name;
            $supplier->supplyer_email = $request->supplyer_email;
            $supplier->supplyer_phone2 = $request->supplyer_phone2;
            $supplier->supplyer_bank_info = $request->supplyer_bank_info;
            $supplier->supplyer_mobile_bank_info = $request->supplyer_mobile_bank_info;
            $supplier->supplyer_address = $request->supplyer_address;
            $supplier->supplyer_status = '1';
            $supplier->save();
        $notification = array(
            'message' =>  'Suppliers Add Sucessyfuly',
            'alert-type' => 'success'
        );
        return response([
            'supplier' => $supplier,
            'message' => $notification
        ]);
    }
// ---------------supplier data show all---------------------
public function SupplierDataShowAll(){
    $supplier = Supplier::all();
    return response( $supplier);
}
// -----------------supplier data delete---------------------
public function SupplierDataDeleteAll($role, $id){
    $supplier = Supplier::find($id)->delete();
    return response( $supplier);
}

// ------------------supplier edit----------------
public function SupplierEditAll($role,$id){
    $supplier = Supplier::find($id);
    return response( $supplier);
}

// ---------------------supplier Update-------------------
    public function SupplierUpdateAll(Request $request,$role,$id){
        $supplier =  Supplier::find($id);
        $supplier->supplyer_name = $request->supplyer_name;
        $supplier->company_name = $request->company_name;
        $supplier->supplyer_email = $request->supplyer_email;
        $supplier->supplyer_phone = $request->supplyer_phone;
        $supplier->supplyer_phone2 = $request->supplyer_phone2;
        $supplier->supplyer_bank_info = $request->supplyer_bank_info;
        $supplier->supplyer_mobile_bank_info = $request->supplyer_mobile_bank_info;
        $supplier->supplyer_address = $request->supplyer_address;
        $supplier->update();
        return response( $supplier);
    }

    // ---------------Active-----------------
    public function SupplierActive($role, $id){
        $supplier =  Supplier::find($id)->update(['supplyer_status'=> 1 ]);
        return redirect()->back();
    }
    // -----------------deactive----------------------
    public function SupplierDeactive($role, $id){
        $supplier =  Supplier::find($id)->update(['supplyer_status'=> 0]);
        return redirect()->back();

    }
}
