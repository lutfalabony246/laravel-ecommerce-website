<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use Image;
class EmployeeController extends Controller
{


    // employee view
    public function EmployeeView()
    {
        $employees = Employee::all();

        return view('backend.employee.manage_employee', compact('employees'));
    } // end mathod

    // Employee Add form
    public function EmployeeAddForm()
    {



        $departments = Department::all();

        return view('backend.employee.add_employee', compact('departments'));
    } // end method

    // Employee Add
    public function EmployeeStore(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'employee_name' => 'required',
            'department_id' => 'required',
            'employee_office_id' => 'required',
            'employee_photo' => 'required',
            'email_id' => "required|unique:employees",
            'employee_phone' => 'required|min:6|max:11',
            'employee_fathers_name' => 'required',
            'employee_mother_name' => 'required',
            'employee_salary' => 'required',
            'employee_date_of_birth' => 'required',
            'employee_joing_date' => 'required',
            'employee_present_address' => 'required',
            'employee_permanent_address' => 'required',
            'designation' => 'required',
        ]);



        // Banner Img upload and save
        $image = $request->file('employee_photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/employee/' . $name_gen);
        $save_url = 'upload/employee/' . $name_gen;




        Employee::insert([

            'employee_name' => $request->employee_name,
            'department_id' => $request->department_id,
            'employee_office_id' => $request->employee_office_id,
            'employee_status' => $request->employee_status,
            'employee_img' => $save_url,
            'designation' => $request->designation,
            'email_id' => $request->email_id,
            'employee_phone' => $request->employee_phone,
            'employee_fathers_name' => $request->employee_fathers_name,
            'employee_mother_name' => $request->employee_mother_name,
            'employee_salary' => $request->employee_salary,
            'employee_date_of_birth' => $request->employee_date_of_birth,
            'employee_joing_date' => $request->employee_joing_date,
            'employee_present_address' => $request->employee_present_address,
            'employee_permanent_address' => $request->employee_permanent_address,

        ]);


        $notification = array(
            'message' => 'Employee Create sucessfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.employee.view', config('fortify.guard'))->with($notification);
    } // end method


    // employee Edit
    public function EmployeeEdit($role, $id)
    {

        $employee = Employee::find($id);
        $departments = Department::all();
        return view('backend.employee.edit_employee', compact('employee', 'departments'));
    } // end mathod


    // update employee
    public function EmployeeUpdate(Request $request, $role)
    {

        // $request->validate([
        //     'employee_name' => 'required|alpha',
        //     'department_id' => 'required',
        //     'employee_office_id' => 'required',
        //     'employee_photo' => 'required',
        //     'email_id' => "required|unique:employees",
        //     'employee_phone' => 'required|min:6|max:11',
        //     'employee_fathers_name' => 'required|alpha',
        //     'employee_mother_name' => 'required|alpha',
        //     'employee_salary' => 'required',
        //     'employee_date_of_birth' => 'required',
        //     'employee_joing_date' => 'required',
        //     'employee_present_address' => 'required',
        //     'employee_permanent_address' => 'required',
        //     'designation' => 'required|alpha',

        //    ]);

        $employee_id = $request->id;
        $old_img  = $request->old_img;

        if ($request->file('employee_photo')) {

            unlink($old_img);
            $image = $request->file('employee_photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/employee/' . $name_gen);
            $save_url = 'upload/employee/' . $name_gen;

            // employee Update
            Employee::findOrFail($employee_id)->update([
                'employee_name' => $request->employee_name,
                'department_id' => $request->department_id,
                'employee_office_id' => $request->employee_office_id,
                'employee_status' => $request->employee_status,
                'employee_img' => $save_url,
                'email_id' => $request->email_id,
                'employee_phone' => $request->employee_phone,
                'employee_fathers_name' => $request->employee_fathers_name,
                'employee_mother_name' => $request->employee_mother_name,
                'employee_salary' => $request->employee_salary,
                'employee_date_of_birth' => $request->employee_date_of_birth,
                'employee_joing_date' => $request->employee_joing_date,
                'employee_present_address' => $request->employee_present_address,
                'employee_permanent_address' => $request->employee_permanent_address,



            ]);


            $notification = array(
                'message' =>  'Employee Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('role.employee.view', config('fortify.guard'))->with($notification);
        } else {
            Employee::findOrFail($employee_id)->update([
                'employee_name' => $request->employee_name,
                'department_id' => $request->department_id,
                'employee_office_id' => $request->employee_office_id,
                'employee_status' => $request->employee_status,
                'email_id' => $request->email_id,
                'employee_phone' => $request->employee_phone,
                'employee_fathers_name' => $request->employee_fathers_name,
                'employee_mother_name' => $request->employee_mother_name,
                'employee_salary' => $request->employee_salary,
                'employee_date_of_birth' => $request->employee_date_of_birth,
                'employee_joing_date' => $request->employee_joing_date,
                'employee_present_address' => $request->employee_present_address,
                'employee_permanent_address' => $request->employee_permanent_address,

            ]);

            $notification = array(
                'message' =>  'Employee Update Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('employee.view')->with($notification);
        } // else end

    } // method end

    // employee All  view
    public function EmployeeDetails($role, $id)
    {

        $emp = Employee::find($id);
        return view('backend.employee.all_view_employee', compact('emp'));
    } // end mathod  EmployeetDetails

    public function EmployeetDelete($role, $id)
    {

        $employee = Employee::findOrFail($id);

        $img = $employee->employee_img;
        unlink($img);
        Employee::findOrFail($id)->delete();

        $notification = array(
            'message' =>  'Employee Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
