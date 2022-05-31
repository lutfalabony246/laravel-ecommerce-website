<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
class SubSubCategoryController extends Controller
{
    //==============Sub Sub Category all Mathod ========================
    // sub sub category view
    public function SubSubCategoryView()
    {
        $categorys = Category::orderBy('category_name', 'ASC')->get();
        $subcategorys = SubCategory::orderBy('sub_category_name', 'ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.subsubcategory_all', compact('subsubcategory', 'categorys', 'subcategorys'));
    }
    // sub category method
    public function GetSubCategory($role, $category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->with('subsubcategories')->orderBy('sub_category_name', 'ASC')->get();
        // dd($subcat);
        return json_encode($subcat);
    } // end mathod
    // sub sub auto complate category method
    public function GetSubSubCategory($role, $subcategory_id)
    {
        // dd($subcategory_id);
        $subsubcat = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name', 'ASC')->get();
        return json_encode($subsubcat);
    } // end mathod
    // handle fetch all eamployees ajax request
    public function fetchAll()
    {
        $emps = SubSubCategory::all();
        $output = '';
        if ($emps->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>category_name</th>
                    <th>sub_category_name</th>
                    <th>sub_category_name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                    <td style="color:black;">' . $emp->id . '</td>
                    <td style="color: black;">' . $emp->category->category_name . '</td>
                    <td style="color: black;">' . $emp->subcategory->sub_category_name . '</td>
                    <td style="color: black;">' . $emp->subsubcategory_name . '</td>
                    <td>
                    <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>
                    <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                    </td>
                </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }
    // handle insert a new employee ajax request
    public function store(Request $request)
    {
        // if ($request->hasFile('subsubcategory_image') && $request->subsubcategory_image->isValid()) {
        //     // brand_image upload and save
        //     $image = $request->file('subsubcategory_image');
        //     $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        //     Image::make($image)->resize(400, 400)->save('upload/subsubcategory/' . $name_gen);
        //     $save_url = 'upload/subsubcategory/' . $name_gen;
        //     $empData = [
        //         // 'category_id' => $request->category_id, 'subcategory_id' => $request->subcategory_id, 'subsubcategory_name' => $request->subsubcategory_name,
        //         // 'subsubcategory_image' =>  $save_url,
        //         // 'subsubcategory_slug_name' => strtolower(str_replace(' ', '-', $request->subsubcategory_name))
        //     ];
        //     // dd($empData);
        // }
        // SubSubCategory::create(
        //     'category_id' => $request->category_id, 'subcategory_id' => $request->subcategory_id, 'subsubcategory_name' => $request->subsubcategory_name,
        //         'subsubcategory_image' =>  $save_url,
        //         'subsubcategory_slug_name' => strtolower(str_replace(' ', '-', $request->subsubcategory_name))
        // );
        // return response()->json([
        //     'status' => 200,
        // ]);
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name' => 'required',
            'subsubcategory_image' => 'required|image',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $save_url = null;
            if ($request->hasFile('subsubcategory_image') && $request->subsubcategory_image->isValid()) {
                // subsubcat_image upload and save
                $image = $request->file('subsubcategory_image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(400, 400)->save('upload/subsubcategory/' . $name_gen);
                $save_url = 'upload/subsubcategory/' . $name_gen;
                $subsubcategory = new SubSubCategory;
                $subsubcategory->category_id = $request->input('category_id');
                $subsubcategory->subcategory_id = $request->input('subcategory_id');
                $subsubcategory->subsubcategory_name = $request->input('subsubcategory_name');
                $subsubcategory->subsubcategory_slug_name = strtolower(str_replace(' ', '-', $request->subsubcategory_name));
                $subsubcategory->subsubcategory_image  = $save_url;
                $subsubcategory->save();
                return response()->json(['message' => 'SubSubCategory Added Successfully']);
            } else {
                $subsubcategory = new SubSubCategory;
                $subsubcategory->category_id = $request->input('category_id');
                $subsubcategory->subcategory_id = $request->input('subcategory_id');
                $subsubcategory->subsubcategory_name = $request->input('subsubcategory_name');
                $subsubcategory->subsubcategory_slug_name = strtolower(str_replace(' ', '-', $request->subsubcategory_name));
                $subsubcategory->save();
                return response()->json(['message' => 'SubSubCategory Added Successfully']);
            }
        }
    }
    // handle edit an employee ajax request
    public function edit($role, $id)
    {
        // $id = $request->id;
        // $emp = SubSubCategory::find($id);
        // return response()->json($emp);
        // handle edit an employee ajax request
        $subsubcategory = SubSubCategory::find($id);
        return response()->json([
            'status' => 200,
            'subsubcategory' => $subsubcategory,
        ]);
    }
    // handle update an employee ajax request
    public function update(Request $request, $role, $id)
    {
        // $fileName = '';
        // $emp = SubSubCategory::find($request->emp_id);
        // $empData = ['category_id' => $request->category_id, 'subcategory_id' => $request->subcategory_id, 'subsubcategory_name' => $request->subsubcategory_name];
        // $emp->update($empData);
        // return response()->json([
        //     'status' => 200,
        // ]);
        $subcat = SubSubCategory::find($id);
        if (!$subcat) {
            return response()->json(['message' => ' Not Found'], 404);
        }
        $validator = Validator::make($request->all(), [
            // 'brand_name_cats_eye' => 'required',
            // 'brand_image'         =>'required|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $save_url = $subcat->subsubcategory_image;
        if ($request->hasFile('subsubcategory_image') && $request->subsubcategory_image->isValid()) {
            $this->removePreviousImage($subcat->subsubcategory_image);
            // subcat_image update and save
            $image = $request->file('subsubcategory_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400, 400)->save('upload/subsubcategory/' . $name_gen);
            $save_url = 'upload/subsubcategory/' . $name_gen;
            try {
                $subcat->category_id = $request->input('category_id');
                $subcat->subcategory_id = $request->input('subcategory_id');
                $subcat->subsubcategory_name = $request->input('subsubcategory_name');
                $subcat->subsubcategory_slug_name = strtolower(str_replace(' ', '-', $request->subsubcategory_name));
                $subcat->subsubcategory_image  = $save_url;
                $subcat->update();
                return response()->json(['message' => 'Sub Sub Category Updated Successfully']);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        } else {
            try {
                $subcat->category_id = $request->input('category_id');
                $subcat->subcategory_id = $request->input('subcategory_id');
                $subcat->subsubcategory_name = $request->input('subsubcategory_name');
                $subcat->subsubcategory_slug_name = strtolower(str_replace(' ', '-', $request->subsubcategory_name));
                $subcat->subsubcategory_image  = $save_url;
                $subcat->update();
                return response()->json(['message' => 'Sub Sub Category Updated Successfully']);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }
    // function for remove previous image
    private function removePreviousImage($image)
    {
        if (file_exists(public_path($image))) {
            unlink(public_path($image));
            return true;
        }
        return false;
    }
    // handle delete an employee ajax request
    public function delete($role, $id)
    {
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->delete();
        $notification = array(
            'message' =>  'Sub Sub Category Deleted Sucessfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
