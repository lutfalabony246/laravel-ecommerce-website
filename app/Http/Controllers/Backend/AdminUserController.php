<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Supplier;
use Carbon\Carbon;
use Image;
use Auth;
use Illuminate\Support\Facades\Hash;
class AdminUserController extends Controller
{
    // Admin User Role
    public function AllAdminRole(){
        // $adminuser = Admin::where('type',2)->latest()->get();
        $adminuser = Admin::all();
        return view('backend.role.admin_role_all',compact('adminuser'));
    } // end method

    public function SupPermison(){
        $supplier = Supplier::all();
        return view('backend.role.suplier_permision',compact('supplier'));
    } // end method
     public function EmpPermison(){
        $employees = Employee::all();
        return view('backend.role.emp_permision',compact('employees'));
    } // end method
     // Admin All User View
    public function AddAdminRole(){
        $employees = Employee::all();
        $supplier = Supplier::all();
        return view('backend.role.admin_role_create',compact('employees','supplier'));
    }

    public function StoreSupplierRole(Request $request){
        $value=$request->all();
        if(array_key_exists('type',$value)){
        $emp= Supplier::find($request->type);
        // dd($emp);
         Admin::insert([
        'name' => $emp->supplyer_name,
        'supplier_id' => $emp->id,
        'email' => $emp->supplyer_email,
        'password' => Hash::make($request->password),
        'phone' => $emp->supplyer_phone,
        'brand' => $request->brand,
        'category' => $request->category,
        'product' => $request->product,
        'slider' => $request->slider,
        'cupons' => $request->cupons,
        'shipping' => $request->shipping,
        'setting' => $request->setting,
        'returnorder' => $request->returnorder,
        'review'=> $request->review,
        'pos'=> $request->pos,
        'orders' => $request->orders,
         'supplier_dashboard' => $request->supplier_dashboard,
        'stock' => $request->stock,
        'reports' => $request->reports,
        'admin_dashboard' => $request->admin_dashboard,
        'alluser' => $request->alluser,
        'employee' => $request->employee,
        'supplier' => $request->supplier,
        'department' => $request->department,
        'employee_salary' => $request->employee_salary,
        'purchase' => $request->purchase,
        'websetting' => $request->websetting,
        'expence' => $request->expence,
        'banner_caregory' => $request->banner_caregory,
        'adminuserrole' => $request->adminuserrole,


        'created_at' => Carbon::now(),
        ]);
       }
        else{
        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
        $save_url = 'upload/admin_images/'.$name_gen;
         Admin::insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'brand' => $request->brand,
        'category' => $request->category,
        'product' => $request->product,
        'slider' => $request->slider,
         'supplier_dashboard' => $request->supplier_dashboard,
        'cupons' => $request->cupons,
        'shipping' => $request->shipping,
        'setting' => $request->setting,
        'returnorder' => $request->returnorder,
        'review'=> $request->review,
        'pos'=> $request->pos,
        'orders' => $request->orders,
        'stock' => $request->stock,
        'reports' => $request->reports,
        'alluser' => $request->alluser,
        'employee' => $request->employee,
                'admin_dashboard' => $request->admin_dashboard,
        'supplier' => $request->supplier,
        'department' => $request->department,
        'employee_salary' => $request->employee_salary,
        'purchase' => $request->purchase,
        'expence' => $request->expence,
        'websetting' => $request->websetting,
        'banner' => $request->banner,
        'banner_caregory' => $request->banner_caregory,
        'adminuserrole' => $request->adminuserrole,
        'type' =>$request->type,
        'profile_photo_path' => $save_url,
        'created_at' => Carbon::now(),
        ]);
       }
        $notification = array(
            'message' => 'Admin User Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('role.all.admin.user',config('fortify.guard'))->with($notification);
    }
 // Admin All User store
 public function StoreAdminRole(Request $request){
    $value=$request->all();
     if(array_key_exists('type',$value)){
        $emp= Employee::find($request->type);
         Admin::insert([
        'name' => $emp->employee_name,
        'email' => $emp->email_id,
        'password' => Hash::make($request->password),
        'phone' => $emp->employee_phone,
        'brand' => $request->brand,
        'category' => $request->category,
        'product' => $request->product,
        'slider' => $request->slider,
         'supplier_dashboard' => $request->supplier_dashboard,
        'cupons' => $request->cupons,
        'shipping' => $request->shipping,
        'setting' => $request->setting,
        'returnorder' => $request->returnorder,
        'review'=> $request->review,
        'pos'=> $request->pos,
        'orders' => $request->orders,
        'stock' => $request->stock,
        'reports' => $request->reports,
        'alluser' => $request->alluser,
        'employee' => $request->employee,
        'supplier' => $request->supplier,
        'department' => $request->department,
        'employee_salary' => $request->employee_salary,
        'purchase' => $request->purchase,
        'websetting' => $request->websetting,
        'expence' => $request->expence,
                'admin_dashboard' => $request->admin_dashboard,
        'banner_caregory' => $request->banner_caregory,
        'adminuserrole' => $request->adminuserrole,
        'type' =>$emp->department_id,
        'profile_photo_path' =>$emp->employee_img,
        'created_at' => Carbon::now(),
        ]);
       }

       else{
        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
        $save_url = 'upload/admin_images/'.$name_gen;
         Admin::insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'brand' => $request->brand,
        'category' => $request->category,
        'product' => $request->product,
        'slider' => $request->slider,
        'cupons' => $request->cupons,
        'shipping' => $request->shipping,
        'setting' => $request->setting,
        'returnorder' => $request->returnorder,
        'review'=> $request->review,
        'pos'=> $request->pos,
        'orders' => $request->orders,
        'stock' => $request->stock,
        'reports' => $request->reports,
        'alluser' => $request->alluser,
        'employee' => $request->employee,
         'supplier_dashboard' => $request->supplier_dashboard,
        'supplier' => $request->supplier,
        'department' => $request->department,
                'admin_dashboard' => $request->admin_dashboard,
        'employee_salary' => $request->employee_salary,
        'purchase' => $request->purchase,
        'expence' => $request->expence,
         'websetting' => $request->websetting,
        'banner' => $request->banner,
        'banner_caregory' => $request->banner_caregory,
        'adminuserrole' => $request->adminuserrole,
        'type' =>$request->type,
        'profile_photo_path' => $save_url,
        'created_at' => Carbon::now(),
        ]);
       }
        $notification = array(
            'message' => 'Admin User Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('role.all.admin.user',config('fortify.guard'))->with($notification);
    } // end method
    public function EditAdminRole($adminrole,$id){
        $adminuser = Admin::findOrFail($id);
        return view('backend.role.admin_role_edit',compact('adminuser'));
    } // end method
 public function UpdateAdminRole(Request $request){
    // $request->validate([
    //     'name' => 'required',
    //     'email' => 'required',
    //     'password' => 'required|min:6|max:12',
    //     'phone' => 'required',
    //     'image' => 'required',
    // ]);
        $admin_id = $request->id;
        $old_img = $request->old_image;
        if ($request->file('profile_photo_path')) {
        unlink($old_img);
        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
        $save_url = 'upload/admin_images/'.$name_gen;
    Admin::findOrFail($admin_id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'brand' => $request->brand,
        'category' => $request->category,
        'product' => $request->product,
        'slider' => $request->slider,
        'cupons' => $request->cupons,
        'shipping' => $request->shipping,
        'setting' => $request->setting,
        'returnorder' => $request->returnorder,
        'review' => $request->review,
                'admin_dashboard' => $request->admin_dashboard,
        'pos'=> $request->pos,
        'orders' => $request->orders,
        'stock' => $request->stock,
        'reports' => $request->reports,
        'alluser' => $request->alluser,
        'department' => $request->department,
        'employee_salary' => $request->employee_salary,
        'purchase' => $request->purchase,
        'expence' => $request->expence,
        'banner' => $request->banner,
        'banner_caregory' => $request->banner_caregory,
         'supplier_dashboard' => $request->supplier_dashboard,
         'websetting' => $request->websetting,
        'adminuserrole' => $request->adminuserrole,
        'type' =>$emp->department_id,
        'profile_photo_path' =>$emp->employee_img,
        'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Admin User Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('role.all.admin.user',config('fortify.guard'))->with($notification);
        }else{
        Admin::findOrFail($admin_id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'brand' => $request->brand,
        'category' => $request->category,
        'product' => $request->product,
        'slider' => $request->slider,
        'cupons' => $request->cupons,
        'shipping' => $request->shipping,
        'setting' => $request->setting,
        'returnorder' => $request->returnorder,
        'review' => $request->review,
        'pos'=> $request->pos,
         'websetting' => $request->websetting,
        'orders' => $request->orders,
        'stock' => $request->stock,
        'reports' => $request->reports,
        'alluser' => $request->alluser,
        'department' => $request->department,
        'employee_salary' => $request->employee_salary,
        'purchase' => $request->purchase,
                'admin_dashboard' => $request->admin_dashboard,
        'expence' => $request->expence,
        'supplier_dashboard' => $request->supplier_dashboard,
        'banner' => $request->banner,
        'banner_caregory' => $request->banner_caregory,
        'adminuserrole' => $request->adminuserrole,
        'type' =>2,
        'profile_photo_path' =>$emp->employee_img,
        'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Admin User Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('role.all.admin.user',config('fortify.guard'))->with($notification);
        } // end else
    } // end method
    //
    public function DeleteAdminRole($adminrole,$id){
        $adminimg = Admin::findOrFail($id);


        Admin::findOrFail($id)->delete();
         $notification = array(
           'message' => 'Admin User Deleted Successfully',
           'alert-type' => 'info'
       );
       return redirect()->back()->with($notification);
    } // end method
}  // main end
