<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
// use Str;



class BrandController extends Controller
{

    //.........Brand New Crud with Jquery...............//

    public function BrandnewAdd()
    {
        $brands = Brand::all();
        return view('backend.brand.brand_all', compact('brands'));
    }

    public function BrandnewStore(Request $request)
    {
        // dd($request);

        $validator = Validator::make($request->all(), [
            'brand_name_cats_eye' => 'required',
            'brand_image'         => 'required|image',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }

        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }
        else {
            $save_url = null;
            if ($request->hasFile('brand_image') && $request->brand_image->isValid()) {
                // brand_image upload and save
                $image = $request->file('brand_image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(400, 400)->save('upload/brand/' . $name_gen);
                $save_url = 'upload/brand/' . $name_gen;
            }
            $brands = new Brand;
            $brands->brand_name_cats_eye = $request->input('brand_name_cats_eye');
            $brands->brand_image  = $save_url;
            $brands->save();
            return response()->json(['message' => 'Brand Added Successfully']);
        }
    }

    // view
    public function BrandnewView($role)
    {
        $brands = Brand::all();
        return response()->json([
            'brands' => $brands,
        ]);
    }

    // Edit Method
    public function BrandnewEdit($role, $id)
    {
        $brand = Brand::find($id);
        return response()->json([
            'status' => 200,
            'brand' => $brand,
        ]);
    } // end edit

    //update
    public function BrandnewUpdate(Request $request, $role, $id)
    {

        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json(['message' => ' Not Found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'brand_name_cats_eye' => 'required',
            // 'brand_image'         =>'required|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $save_url = $brand->brand_image;
        if ($request->hasFile('brand_image') && $request->brand_image->isValid()) {

            $this->removePreviousImage($brand->brand_image);

            // brand_image update and save
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400, 400)->save('upload/brand/' . $name_gen);
            $save_url = 'upload/brand/' . $name_gen;
        }
        try {
            $brand->brand_name_cats_eye = $request->input('brand_name_cats_eye');
            $brand->brand_image  = $save_url;
            $brand->update();
            return response()->json(['message' => 'Brand Updated Successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    } //end update

    //delete
    public function BrandnewDelete($role, $id)
    {
        // dd($id, $role);

        $brand = Brand::find($id);

        $brand->delete();
        return redirect()->back();
    } // end delete method

    // function for remove previous image
    private function removePreviousImage($image)
    {
        if (file_exists(public_path($image))) {
            unlink(public_path($image));
            return true;
        }
        return false;
    }
    //......................... old Brand Controller......................//

} // main method end
