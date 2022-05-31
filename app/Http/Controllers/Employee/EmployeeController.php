<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class EmployeeController extends Controller
{
    public function AddEmployee()
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $employees = Role::all();
        return view('employee.add_employee', compact('employees'));
    }

    public function EmployeeStore(Request $request)
    {
        $auth_id = Auth::guard('admin')->user()->outlet_id;
        $validator = Validator::make($request->all(), [
            'department_id' => 'required',
            'employee_office_id' => 'required',
            'employee_name' => 'required',
            'email_id' => 'required|unique:employees|email',
            'password' => 'required| min:6| max:12 |confirmed',
            'employee_img' => 'required| min:6',
            'employee_phone' => 'required|numeric',
            'employee_fathers_name' => 'required',
            'employee_mother_name'  => 'required',
            'employee_present_address' => 'required',
            'employee_permanent_address' => 'required',
            'employee_salary' => 'required',
            'designation' => 'required',
            'employee_date_of_birth' => 'required',
            'employee_joing_date' => 'required',
            'employee_status' => 'required',
        ], [
            'fname.required' => 'The first name field is required',
            'lname.required' => 'The last name field is required',
            'password.confirmed' => 'password confirmation not matched'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            if ($request->file('employee_img')) {
                $employee = new Employee;
                $employee->outlet_id = $auth_id;
                $employee->department_id = $request->input('department_id');
                $employee->employee_office_id = $request->input('employee_office_id');
                $employee->employee_name = $request->input('employee_name');
                $employee->email_id = $request->input('email_id');
                $employee->password = Hash::make($request->input('password'));
                $file = $request->file('employee_img');
                $extension = hexdec(uniqid()) . ' ' . $file->getClientOriginalExtension();
                Image::make($file)->resize(300, 300)->save('uploads/employee/' . $extension);
                $save_url = 'uploads/employee/' . $extension;
                $employee->image = $save_url;
                $employee->employee_phone = $request->input('employee_phone');
                $employee->employee_fathers_name = $request->input('employee_fathers_name');
                $employee->employee_present_address = $request->input('employee_present_address');
                $employee->employee_permanent_address = $request->input('employee_permanent_address');
                $employee->employee_salary = $request->input('employee_salary');
                $employee->designation = $request->input('designation');
                $employee->employee_date_of_birth = $request->input('employee_date_of_birth');
                $employee->employee_joing_date = $request->input('employee_joing_date');
                $employee->employee_status = $request->input('employee_status');

                $employee->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Added Successfully.'
                ]);
            } else {
                $employee = new Employee;
                $employee->outlet_id = $auth_id;
                $employee->department_id = $request->input('department_id');
                $employee->employee_office_id = $request->input('employee_office_id');
                $employee->employee_name = $request->input('employee_name');
                $employee->email_id = $request->input('email_id');
                $employee->password = Hash::make($request->input('password'));
                $employee->employee_phone = $request->input('employee_phone');
                $employee->employee_fathers_name = $request->input('employee_fathers_name');
                $employee->employee_present_address = $request->input('employee_present_address');
                $employee->employee_permanent_address = $request->input('employee_permanent_address');
                $employee->employee_salary = $request->input('employee_salary');
                $employee->designation = $request->input('designation');
                $employee->employee_date_of_birth = $request->input('employee_date_of_birth');
                $employee->employee_joing_date = $request->input('employee_joing_date');
                $employee->employee_status = $request->input('employee_status');
                $employee->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Added Successfully.'
                ]);
            }
        }
    }
}

