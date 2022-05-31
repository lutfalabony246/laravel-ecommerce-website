<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class PurchaseController extends Controller
{

    public function PurchaseView()
    {
        $purchases = Purchase::all();
        // dd( $purchases);
        return view('backend.purchase.view_purchase', compact('purchases'));
    }

    public function AddPurchase()
    {
        $suppliers = Supplier::all();
        $product = Product::all();
        $Categorys = Category::all();
        $SubCategorys = SubCategory::all();
        $SubSubCategorys = SubSubCategory::all();
        return view('backend.purchase.add_purchase', compact('suppliers', 'product', 'Categorys', 'SubCategorys', 'SubSubCategorys'));
    }
    // Purchase Add
    public function PurchaseStore(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'purchase_date' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'product_qty' => 'required',
            'unit_price' => 'required',
            'total_price' => 'required',
            'pay_amount' => 'required',
            'due_amount' => 'required',
            'payment_method' => 'required',
            'purchase_note' => 'required',
        ]);

        //  dd($request->employee_photo);
        Purchase::insert([
            'supplier_id' => $request->supplier_id,
            'product_id' => $request->product_name,
            'new_product' => $request->new_product,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub_category_id' => $request->sub_sub_category_id,
            'product_qty' => $request->product_qty,
            'unit_price' => $request->unit_price,
            'total_price' => $request->total_price,
            'pay_amount' => $request->pay_amount,
            'due_amount' => $request->due_amount,
            'purchase_date' => $request->purchase_date,
            'purchase_note' => $request->purchase_note,
            'payment_method' => $request->payment_method,
        ]);


        if ($request->product_name != null) {

            $product = Product::find($request->product_name);
            $product_qty = $product->product_qty + $request->product_qty;
            $product->update([
                'product_qty' => $product_qty,
            ]);
        }
        $notification = array(
            'message' => 'Purchase Added sucessfully',
            'alert-type' => 'success'
        );
        return redirect()->route('role.purchase.view', config('fortify.guard'))->with($notification);
    } // end method

    // Purchase Edit
    public function PurchaseEdit($role, $id)
    {

        $purchase = Purchase::find($id);
        $suppliers = Supplier::all();
        $product = Product::all();
        return view('backend.purchase.edit_purchase', compact('purchase', 'suppliers', 'product'));
    } // end mathod
    // update Purchase
    public function PurchaseUpdate(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'purchase_date' => 'required',
            'product_name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'sub_sub_category_id' => 'required',
            'product_qty' => 'required',
            'unit_price' => 'required',
            'total_price' => 'required',
            'pay_amount' => 'required',
            'due_amount' => 'required',
            'payment_method' => 'required',
            'purchase_note' => 'required',
        ]);

        $purchase = $request->id;

        Purchase::findOrFail($purchase)->update([
            'supplier_id' => $request->supplier_id,
            'product_id' => $request->product_name,
            'product_qty' => $request->product_qty,
            'total_price' => $request->total_price,
            'pay_amount' => $request->pay_amount,
            'due_amount' => $request->due_amount,
            'purchase_date' => $request->purchase_date,
            'purchase_create_by' => $request->purchase_create_by,
            'purchase_note' => $request->purchase_note,

        ]);

        $notification = array(
            'message' =>  'Purchase Update Sucessfully',
            'alert-type' => 'info'
        );

        return redirect()->route('role.purchase.view', config('fortify.guard'))->with($notification);
    } // method end

    // Purchase All  view
    public function PurchaseDetails($role, $id)
    {

        $purchase = Purchase::find($id);


        return view('backend.purchase.purchase_details', compact('purchase'));
    } // end mathod
    //Purchase Delete

    public function PurchaseDelete($role, $id)
    {


        Purchase::findOrFail($id)->delete();


        $notification = array(
            'message' =>  'Purchase Deleted Sucessyfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function qty($role, $id)
    {

        $qty = Product::where('id', $id)->get();


        return response()->json($qty);
    }

    public function getCategoryByProduct($role, Product $product)
    {
        // dd($product);
        $category = $product->category->id;
        $sub_category = $product->subcategory->id;
        $sub_sub_category = $product->subsubcategory->id;
        return response()->json(compact('category', 'sub_category', 'sub_sub_category'));
    }
    public function GetSubSubCategory($role, $category_id)
    {
        $subsubcat = SubSubCategory::where('category_id', $category_id)->orderBy('subsubcategory_name', 'ASC')->get();
        return json_encode($subsubcat);
    } // end mathod

}
