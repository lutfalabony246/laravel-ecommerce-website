<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\DealsTime;
use App\Models\Product;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\MultiImg;
use Intervention\Image\Facades\Image;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // product Details view
     public function ViewProduct($id)
    {

        $category = Category::latest()->get();
        $supplier = Supplier::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::all();
        return view('backend.product.product_add', compact('category', 'brands', 'subcategory', 'subsubcategory', 'supplier'));
    }
       // sub category auto method
        public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('sub_category_name', 'ASC')->get();
        return json_encode($subcat);
      }// end mathod
// ==================> Product Add Start <======================================================================
    public function ProductAdd()
    {
        // $purchase_product = Purchase::whereNotNull('new_product')->orderBy('id','DESC')->get();
        $category = Category::latest()->get();
        $supplier = Supplier::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::all();
        return view('backend.product.product_add', compact('category', 'brands', 'subcategory', 'subsubcategory', 'supplier'));
    }
// ==================> Product Add End <======================================================================
// ==================> Product Store Start <==================================================================
    public function StoreProduct(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'status'=>400,
                    'errors'=>$validator->messages()
                ]);
            }
                else{
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
            $colors = $request->file('product_color');
           $product = new Product();
         if ($request->file('product_thambnail')) {
            $image = $request->file('product_thambnail');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400, 400)->save('upload/products/thambnail/' . $name_gen);
            $save_url = 'upload/products/thambnail/' . $name_gen;
             $product->product_thambnail = $save_url;
           }

            $product->product_name = $request->input('product_name');
            $product->product_code = '#' . $grn;
            $product->brand_id = $request->input('brand_id');
            $product->supplier_product_code = $request->input('supplier_product_code');
            $product->product_slug_name =  strtolower(str_replace(' ', '-', $request->input('product_name')));
            $product->supplier_id = $request->input('supplier_id');
            $product->category_id = $request->input('category_id');
            $product->sub_category_id = $request->input('sub_category_id');
            $product->sub_sub_category_id = $request->input('sub_sub_category_id');
            $product->product_tags = $request->input('product_tags');
            $product->barCode = $request->input('barCode');
            if ($request->refundable == "on") {
                $product->refundable =  "1";
            } else {
                $product->refundable =  "0";
            }

            $product->video_link = $request->input('video_link');
            if ($request->product_color) {
                $colorString = implode(",",$request->get('product_color'));
                $product->product_color=$colorString;
            }
            if ($request->product_size) {
                $sizerString = implode(",",$request->get('product_size'));
                $product->product_size=$sizerString;
            }
            $product->selling_price = $request->input('selling_price');
            $product->discount_price = $request->input('discount_price');
            $product->start_date = $request->input('start_date');
            $product->end_date = $request->input('end_date');
            $product->product_qty = $request->input('product_qty');
            $product->product_descp = $request->input('product_descp');
            $product->meta_title = $request->input('meta_title');
            $product->meta_desc = $request->input('meta_desc');
            $product->vat = $request->input('vat');
            $product->unit = $request->input('unit');
            $product->purchase_qty = $request->input('purchase_qty');
            $product->unit_price = $request->input('unit_price');
            $product->purchase_price = $request->input('purchase_price');
            $product->purchase_date = $request->input('purchase_date');
            $product->product_expire_date = $request->input('product_expire_date');
            $product->product_expire_alert_date = $request->input('product_expire_alert_date');
            $product->product_stock_alert = $request->input('product_stock_alert');
            $product->shipping_fee = $request->input('shipping_fee');
            $product->sku_code = $request->input('sku_code');
            if ($request->shipping == "on") {
                $product->shipping =  "1";
            } else {
                $product->shipping =  "0";
            }
            if ($request->cash_on_delivery == "on") {
                $product->cash_on_delivery =  "1";
            } else {
                $product->cash_on_delivery =  "0";
            }
            if ($request->hot_deals == "on") {
                $product->hot_deals =  "1";
            } else {
                $product->hot_deals =  "0";
            }
            if ($request->featured == "on") {
                $product->featured =  "1";
            } else {
                $product->featured =  "0";
            }
            if ($request->special_offer == "on") {
                $product->special_offer =  "1";
            } else {
                $product->special_offer =  "0";
            }
            if ($request->special_deals == "on") {
                $product->special_deals =  "1";
            } else {
                $product->special_deals =  "0";
            }
            $product->status = 1;
            $product->save();
            if ($request->file('multi_img')) {
                // Multiple img upload start
                $MultiImg = new MultiImg;
                $images = $request->file('multi_img');
                foreach ($images as $img) {
                    $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                    Image::make($img)->resize(400, 400)->save('upload/products/multi-image/' . $make_name);
                    $uploadPath = 'upload/products/multi-image/' . $make_name;

                    $MultiImg= MultiImg::insert([
                        // product_id is all info make single id
                        'product_id' => $product->id,
                        'photo_name' => $uploadPath,
                        'created_at' => Carbon::now(),
                    ]);
                } // end loop
            }
            return response()->json([
                'status'=>200,
                'message'=>'Product Added Successfully.'
                ]);
//  6060

      }
    }
// ==================> Product Store End <====================================================================
// ==================> Product View Start <===================================================================
    public function ManageProduct()
    {
        $workpermits = Product::select('product_expire_date')->where('product_expire_date', '<', Carbon::now()->subDays(7))->get();
         $category = Category::latest()->get();
        $supplier = Supplier::get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::all();
        $product = Product::with('brand', 'category', 'subcategory', 'subsubcategory', 'supplier')->get();

        return view('backend.product.product_view', compact('product','category','supplier','brands','subcategory','subsubcategory'));
    }
// ==================> Product View End <=====================================================================
// ==================> Product All Info Show Start <==========================================================
    public function ProductAllInfoView($role, $id)
    {
        $product_edit = Product::with('supplier','brand','category','subcategory','subsubcategory')->findOrFail($id);

         $multiimgs = MultiImg::where('product_id', $id)->get();
         return response()->json([
            'status' =>200,
            'product_edit' => $product_edit,
             'multiimgs' => $multiimgs,
        ]);

    }
// ==================> Product All Info Show End <===========================================================
// ==================> Product Edit Start <==================================================================
    public function EditProduct($role, $id)
    {
        // product edit
         $category = Category::latest()->get();
        $supplier = Supplier::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::all();
        $products = Product::find($id);
        $multiimgs = MultiImg::where('product_id', $id)->get();
        return view('backend.product.product_edit',compact('products','multiimgs','category','supplier','brands','subcategory','subsubcategory'));
    }

// ==================> Product Edit End <===================================================================
// ================== > Product New Update start <=======================================================
 public function UpdateProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
          // Product Update
        $product_id = $request->id;
        $old_img2  = $request->old_image2;
        $product = Product::find($product_id);
        // if(file_exists($old_img2))
        // {
        //   unlink($old_img2);
        // }

        if ($request->file('product_thambnail'))
         {
            // unlink($old_img2);
            $image = $request->file('product_thambnail');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
            $save_url = 'upload/products/thambnail/' . $name_gen;
               $product->product_thambnail = $save_url;
        }

            $product->product_name = $request->input('product_name');
            $product->brand_id = $request->input('brand_id');
            $product->supplier_id = $request->input('supplier_id');
            $product->category_id = $request->input('category_id');
            $product->sub_category_id = $request->input('sub_category_id');
            $product->sub_sub_category_id = $request->input('sub_sub_category_id');
            $product->product_tags = $request->input('product_tags');
            $product->barCode = $request->input('barCode');
            if ($request->refundable == "on") {
                $product->refundable =  "1";
            } else {
                $product->refundable =  "0";
            }
            $product->video_link = $request->input('video_link');
            if ($request->product_size) {

                $sizerString = implode(",",$request->get('product_size'));

                $product->product_size=$sizerString;
            }
            if ($request->product_color) {

                $colorString = implode(",",$request->get('product_color'));

                $product->product_color=$colorString;
            }
            $product->selling_price = $request->input('selling_price');
            $product->discount_price = $request->input('discount_price');
            $product->start_date = $request->input('start_date');
            $product->end_date = $request->input('end_date');
            $product->product_slug_name =  strtolower(str_replace(' ', '-', $request->input('product_name')));
            $product->product_expire_date = $request->input('product_expire_date');
            $product->product_expire_alert_date = $request->input('product_expire_alert_date');
            $product->product_stock_alert = $request->input('product_stock_alert');
            $product->purchase_date = $request->input('purchase_date');
            $product->shipping_fee = $request->input('shipping_fee');

            $product->product_qty = $request->input('product_qty');
            $product->unit_price = $request->input('unit_price');

             $product->purchase_qty = $request->input('purchase_qty');

            $product->product_descp = $request->input('product_descp');
            $product->meta_title = $request->input('meta_title');
            $product->meta_desc = $request->input('meta_desc');
            $product->unit = $request->input('unit');
            $product->purchase_price = $request->input('purchase_price');
            $product->vat = $request->input('vat');
            $product->sku_code = $request->input('sku_code');
            if ($request->shipping == "on") {
                $product->shipping =  "1";
            } else {
                $product->shipping =  "0";
            }
            if ($request->cash_on_delivery == "on") {
                $product->cash_on_delivery =  "1";
            } else {
                $product->cash_on_delivery =  "0";
            }
            if ($request->hot_deals == "on") {
                $product->hot_deals =  "1";
            } else {
                $product->hot_deals =  "0";
            }
            if ($request->featured == "on") {
                $product->featured =  "1";
            } else {
                $product->featured =  "0";
            }
            if ($request->special_offer == "on") {
                $product->special_offer =  "1";
            } else {
                $product->special_offer =  "0";
            }
            if ($request->special_deals == "on") {
                $product->special_deals =  "1";
            } else {
                $product->special_deals =  "0";
            }

            $product->status = 1;
            $product->update();

              $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );

             return redirect()->route('role.manage-product', config('fortify.guard'))->with($notification);
                } }
// ====================> Product New Update Ends <=======================================================
// ==================> Product Multiple Image Update Start <==============================================
    public function UpdateProductMultiImg(Request $request)
    {
         $request->validate([
            'multi_img' => 'required',
        ],
    [
         'multi_img.required' => 'Atleast 1 image change is required for update',
    ]);

        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img) {
            if ($id != 'new' && $img!=null) {
                $imgDel = MultiImg::findOrFail($id);
                if($imgDel->photo_name && file_exists($imgDel->photo_name))
                {
                    unlink($imgDel->photo_name);
                }
                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(1024, 1024)->save('upload/products/multi-image/' . $make_name);
                $uploadPath = 'upload/products/multi-image/' . $make_name;
                MultiImg::where('id', $id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),

                ]);
            }
        } // end foreach


        $product = Product::find($request->product_id);
        if(array_key_exists('new', $imgs))
        {
            foreach ($imgs['new'] as $img) {
                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(1024, 1024)->save('upload/products/multi-image/' . $make_name);
                $uploadPath = 'upload/products/multi-image/' . $make_name;
                MultiImg::insert([
                    // product_id is all info make single id
                    'product_id' => $product->id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(),
                ]);
            }

        }

        $notification = array(
            'message' => 'Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
// ==================> Product Multiple Image Update End <==============================================
// ==================> Product Multiple Image Delete Start <============================================
    public function MultiImageDelete($role, $id)
    {
        $oldimg = MultiImg::findOrFail($id);
        if(file_exists($oldimg->photo_name))
        {
            unlink($oldimg->photo_name);
        }
        MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Multi Image Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
// ==================> Product Multiple Image Delete Start <============================================
// ==================> Product Main Thambnail Update Start <============================================
    public function ThambnailImageUpdate(Request $request)
    {
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Image Thambnail Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
// ==================> Product Main Thambnail Update End <============================================
// ==================> Product  Active & Deactive Start <=============================================
    public function ProductDeactive($role, $id)
    {
        Product::findOrFail($id)->update(['status' => 0,]);
        $notification = array(
            'message' => 'Product Deactive Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
// ==================> Product  Active & Deactive ENd <==============================================
// ==================> Product  Active Start <=======================================================
    public function ProductActive($role, $id)
    {
        Product::findOrFail($id)->update(['status' => 1,]);
        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
// ==================> Product  Active End <========================================================
// ==================> Product  Delete Start <======================================================
    public function ProductDelete($role, $id)
    {
        $product = Product::find($id);
        if ($product->product_thambnail) {
             $multi= MultiImg::where('product_id',$id)->get();
            foreach ($multi as $multiimg) {
                if(isset($multiimg) && file_exists($multiimg->photo_name))
                {
                    unlink( $multiimg->photo_name );
                }
               $multiimg->delete();
            }
             unlink( $product->product_thambnail); }
        $product->delete();
        $notification = array(
            'message' =>  'Product Deleted Sucessfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
// ==================> Product  Delete End <========================================================
// ==================> Product  stock Manage Start <================================================
    public function ProductStock()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_stock', compact('products'));
    }
// ==================> Product  stock Manage End <================================================
// ==================> Product  stock Manage start <==============================================
    public function HotDeals()
    {
        $products = Product::where('hot_deals', '1')->get();
        $tottal_offer = DealsTime::with('products')->latest()->get();
        return view('backend.product.product_deal', compact('products', 'tottal_offer'));
    }
// ==================> Product  stock Manage End <==============================================
// ==================> Product  stock Manage Start <============================================
    public function HotDealsID($role, $id)
    {
        $deals = DealsTime::where('product_id', $id)->get();
        return response()->json($deals);
        return view('backend.product.product_deal', compact('products', 'tottal_offer'));
    }
// ==================> Product  stock Manage End <==============================================
// ==================> Product  stock Manage Start <============================================
    public function HotDealsStore(Request $request, $role)
    {
        if (!isset($request->id)) {
            $notification = array(
                'message' => 'Please Select Product First',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
        $product_dealsData = array();
        if (isset($request->hot_deal)) {
            $product_dealsData['hot_deals'] = $request->hot_deal;
        }
        if (isset($request->special_offer)) {
            $product_dealsData['special_offer'] = $request->special_offer;
        }
        if (isset($request->special_deal)) {
            $product_dealsData['special_deals'] = $request->special_deal;
        }
        $hot_deals = DealsTime::where('product_id', $request->id)->first();
        if ($hot_deals) {
            $hot_deals->update($product_dealsData);
            $notification = array(
                'message' => 'Deals Time updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $product_dealsData['product_id']  = $request->id;
            DealsTime::create($product_dealsData);
            $notification = array(
                'message' => 'Deals Time created Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
// ==================> Product  stock Manage End <============================================
// ==================> Product  Barcode  <============================================
    public function Barcode($role, $id, $print_quantity)
    {
        $Purchase_item = Product::where('id', $id)->first();

        return view('backend.pdf.barcode', compact('print_quantity', 'id', 'Purchase_item'));
    }
} // ==================> Product  Barcode <============================================

