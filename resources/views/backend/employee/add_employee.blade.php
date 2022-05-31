@extends('admin.admin_master')

@section('main-content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid pt-4">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Add Employee</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="employee-container-wrapper">
        <div class="card">
            <div class="card-body">
                <form action="{{route('role.employee.store',config('fortify.guard'))}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="employee-container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Employee name</label>
                                        <div class="controls">
                                            <input type="text" id="employee_name" name="employee_name"  placeholder="Name" class="form-control">
                                            @error('employee_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Employee Profile Image</label>
                                        <div class="controls">
                                            <input type="file" id="employee_photo" name="employee_photo" class="form-control"  >
                                            @error('employee_photo')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Employee Phone</label>
                                    <div class="controls">
                                        <input type="number" id="employee_phone" placeholder="Phone"  name="employee_phone" class="form-control" >
                                        @error('employee_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label for="salary" class="form-label">Employee Salary</label>
                                        <div class="controls">
                                            <input type="number" id="employee_salary" placeholder="Salary"  name="employee_salary" class="form-control" >
                                            @error('employee_salary')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                </div>

                                <div class="mb-3">
                                    <label for="designation" class="form-label">Employee Designation</label>
                                    <div class="controls">
                                        <input type="text"  id="designation" placeholder="Designation"  class="form-control" name="designation" >
                                        @error('designation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="dprt-name" class="form-label">Department Name</label>
                                    <div class="controls">
                                        <select id="department_id" name="department_id" class="form-select" >
                                            <option value=" ">Select Department Name</option>
                                            @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="employee-id" class="form-label">Employee Email Id</label>
                                    <div class="controls">
                                        <input type="email" id="email_id" placeholder="Email"  name="email_id" class="form-control" >
                                        @error('email_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label for="father-name" class="form-label">Employee Father Name</label>
                                    <div class="controls">
                                        <input type="text" id="employee_fathers_name" placeholder="Fathers Name"  name="employee_fathers_name" class="form-control" >
                                        @error('employee_fathers_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label for="birth-day" class="form-label">Date Of Birth</label>
                                    <div class="controls">
                                        <input type="date" value="2018-05-10 00:00:00" class="form-control" name="employee_date_of_birth"value="{{old('dob')}}" id="employee_date_of_birth" placeholder="Enter Your Date Of Birth">
                                        @error('employee_date_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="p-address" class="form-label">Employee Present Address</label>
                                    <div class="controls">
                                        <textarea  id="employee_present_address" class="form-control"name="employee_present_address" rows="4" placeholder="Present Address"   cols="70"></textarea>
                                        @error('employee_present_address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="office-id" class="form-label">Employee Office Id</label>
                                        <div class="controls">
                                            <input type="text" id="employee_office_id" placeholder="Office Id" name="employee_office_id" class="form-control" >
                                            @error('employee_office_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                </div>

                                <div class="mb-3">
                                    <label for="dprt-name" class="form-label">Employee Status</label>
                                    <div class="controls">
                                        <select id="employee_status" name="employee_status" class="form-control">
                                            <option value="1">Select Employee Stutus</option>
                                            <option value="1">Active</option>
                                            <option value="0">In Active </option>
                                        </select>
                                        @error('employee_status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="mother-name" class="form-label">Employee Mother Name</label>
                                    <div class="controls">
                                        <input type="text" id="employee_mother_name" placeholder=" Mother Name"  name="employee_mother_name" class="form-control" >
                                        @error('employee_mother_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label for="humanfd-datepicker" class="form-label">Employee Joining Date</label>
                                    <div class="controls">
                                        <input type="date" value="2018-05-10 00:00:00" class="form-control" name="employee_joing_date"value="{{old('dob')}}" id="employee_joing_date" placeholder="Enter Your Date Of Birth">

                                        @error('employee_joing_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label for="p-address" class="form-label">Employee Permanent Address</label>
                                    <div class="controls">
                                        <textarea  id="employee_permanent_address" class="form-control" name="employee_permanent_address" rows="4" placeholder="Permanent Address"  cols="70"></textarea>

                                        @error('employee_permanent_address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit">Add Employee</button>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

</div> <!-- container -->
@endsection

