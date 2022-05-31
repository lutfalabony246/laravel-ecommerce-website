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


    public function store(Request $request)
    {


        $supplier_code = Supplier::count();
        // $supplier_code = 1000;



            $supplier = new Supplier();
            if($supplier_code <=10){
                $supplier->supplyer_id_code = '#0000'. $supplier_code;
            }elseif($supplier_code <=100){
                $supplier->supplyer_id_code = '#000'. $supplier_code;
            }
            elseif($supplier_code <=1000){
                $supplier->supplyer_id_code = '#00'. $supplier_code;
            }elseif($supplier_code <=100000){
                $supplier->supplyer_id_code = '#0'. $supplier_code;
            }else{
                $supplier->supplyer_id_code = '#0'. $supplier_code;
            }

            $supplier->supplyer_name = $request->name;
            $supplier->supplyer_address = $request->address;
            $supplier->supplyer_email = $request->email;
            $supplier->supplyer_phone = $request->number;
            $supplier->supplyer_status = 'deactivate';

// dd($supplier_code);

            if (isset($request->image)) {
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save('upload/suppliers/' . $name_gen);
                $save_url = 'upload/suppliers/' . $name_gen;
                $supplier->supplyer_photo = $save_url;
            } else {
                $supplier->supplyer_photo = 'none';
            }

            $supplier->save();

        $notification = array(
            'message' =>  'Suppliers Add Sucessyfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit($role, $id)
    {
        $supplier = Supplier::findOrFail($id);
        // dd($supplier);

        return view('backend.suppliers.suppliers_edit', compact('supplier'));
    }

    public function update(Request $request, $role, $id)
    {


            $supplier =  Supplier::find($id);
            $supplier->supplyer_name = $request->supplyer_name;
            $supplier->supplyer_address = $request->supplyer_address;
            $supplier->supplyer_email = $request->supplyer_email;
            $supplier->supplyer_phone = $request->supplyer_phone;
            if (isset($request->image)) {
                unlink($supplier->supplyer_photo);
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save('upload/suppliers/' . $name_gen);
                $save_url = 'upload/suppliers/' . $name_gen;
                $supplier->supplyer_photo = $save_url;
            }

            $supplier->save();

        $notification = array(
            'message' =>  'Suppliers Updated Sucessyfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('role.suppliers.show', config('fortify.guard'))->with($notification);
    }

    public function delete($role, $id)
    {
        $supplier = Supplier::find($id);

        // if ($supplier->supplyer_photo) {

        //     unlink($supplier->supplyer_photo);
        // }

        if(isset($supplier->supplyer_photo)){
            // unlink($supplier->supplyer_photo);
            $supplier->delete();
        }
        $supplier->delete();

        $notification = array(
            'message' =>  'Suppliers Deleted Sucessfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}
