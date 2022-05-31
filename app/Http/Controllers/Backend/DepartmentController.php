<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    // Department View
    public function DepartmentView(){
        $departments=Department::all();
        return view('backend.department.manage_department',compact('departments'));

    }// end method

         // store departments
  public function DepartmentStore(Request $request){

    // validation
        $request->validate([
            'department_name' => 'required',
          ]);

         $department=Department::create(['department_name' => $request->input('department_name')]);
        return response()->json(['success'=>'Department Added Successfully']);

  } // end method

      // edit Department
      public function DepartmentEdit(Request $request){

        $where = array('id' => $request->id);
        $department  = Department::where($where)->first();

        return response()->json($department);

      } // end mathod
    //   public function DepartmentEdit($id){
    //     $department = Department::findOrfail($id);
    //     return view('backend.department.department_edit', compact('department'));

    //   } // end mathod

    // Department Update
    public function DepartmentUpdate(Request $request){
        $request->validate([
            'department_name' => 'required',


          ]);

        $dep_id = $request->id;


              // Department Update
              Department::findorfail($dep_id)->update([
            'department_name' => $request->department_name,


           ]);

           $notification = array(
             'message' =>  'Department Name Update Sucessyfully',
             'alert-type' => 'success'
         );

         return redirect()->route('role.department.view',config('fortify.guard'))->with($notification);
      } // end mathod

    // Department Delete
    public function DepartmentDelete($admin,$id){

        Department::find($id)->delete();



        // return response()
        // Department::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);

    }// end method



} // main end
