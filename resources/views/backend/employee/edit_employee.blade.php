@extends('admin.admin_master')

@section('main-content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid pt-4">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Edit Employee</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="employee-container-wrapper">
        <div class="card">
            <div class="card-body">
                <form action="{{route('role.employee.update',config('fortify.guard'))}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $employee->id }}">
                    <input type="hidden" name="old_img" value="{{ $employee->employee_img}}">

                    <div class="employee-container">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Employee name</label>
                                    <div class="controls">
                                        <input type="text" id="employee_name" name="employee_name" value="{{ $employee->employee_name}}" class="form-control" required>
                                        @error('employee_name')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Employee Profile Image</label>
                                    <div class="controls">
                                        <input type="file" id="employee_photo" name="employee_photo" class="form-control"  >
                                        @error('employee_photo')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Employee Phone</label>
                                    <div class="controls">
                                        <input type="number" id="employee_phone"value="{{ $employee->employee_phone}}" name="employee_phone" class="form-control" >
                                        @error('employee_phone')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="salary" class="form-label">Employee Salary</label>
                                    <div class="controls">
                                        <input type="number" id="employee_salary" value="{{ $employee->employee_salary}}" name="employee_salary" class="form-control" >
                                        @error('employee_salary')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="dprt-name" class="form-label">Department Name</label>
                                    <div class="controls">
                                        <select id="department_id" name="department_id" class="form-select" >
                                            <option value=" ">Select Department Name</option>
                                            @foreach ($departments as $department)
                                                @if ($employee->department_id==$department->id)
                                                <option value="{{$department->id}}" selected>{{$department->department_name}}</option>
                                                @else
                                                <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="employee-id" class="form-label">Employee Email Id</label>
                                    <div class="controls">
                                        <input type="email" id="email_id" name="email_id"value="{{ $employee->email_id}}"  class="form-control" >
                                        @error('email_id')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                   </div>
                                </div>

                                <div class="mb-3">
                                    <label for="father-name" class="form-label">Employee Father Name</label>
                                    <div class="controls">
                                        <input type="text" id="employee_fathers_name"value="{{ $employee->employee_fathers_name}}" name="employee_fathers_name" class="form-control" >
                                        @error('employee_fathers_name')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="birth-day" class="form-label">Date Of Birth</label>
                                    <div class="controls">
                                        <input type="date" value="{{ $employee->employee_date_of_birth}}" class="form-control" name="employee_date_of_birth"value="{{old('dob')}}" id="employee_date_of_birth" placeholder="Enter Your Date Of Birth">
                                        @error('employee_date_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="office-id" class="form-label">Employee Office Id</label>
                                    <div class="controls">
                                        <input type="text" id="employee_office_id" value="{{ $employee->employee_office_id}}" name="employee_office_id" class="form-control" >
                                        @error('employee_office_id')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="dprt-name" class="form-label">Employee Status</label>
                                    <div class="controls">
                                        <select id="employee_status" name="employee_status" class="form-control">
                                                <option value="1">Select Employee Stutus</option>
                                                <option {{($employee->employee_status==1? 'selected':'') }} value="1">Active</option>
                                                <option {{($employee->employee_status==0? 'selected':'') }}  value="0">In Active </option>
                                        </select>
                                        @error('employee_status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="mother-name" class="form-label">Employee Mother Name</label>
                                    <div class="controls">
                                        <input type="text" id="employee_mother_name" value="{{ $employee->employee_mother_name}}" name="employee_mother_name" class="form-control" >
                                        @error('employee_mother_name')
                                        <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="humanfd-datepicker" class="form-label">Employee Joining Date</label>
                                    <div class="controls">
                                        <input type="date" value="{{ $employee->employee_joing_date}}"class="form-control" name="employee_joing_date"value="{{old('dob')}}" id="employee_joing_date" placeholder="Enter Your Date Of Birth">
                                        @error('employee_date_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="p-address" class="form-label">Employee Present Address</label>
                                    <textarea  id="employee_present_address" class="form-control"name="employee_present_address" rows="4"  cols="70">
                                        {{$employee->employee_present_address}}
                                    </textarea>
                                    @error('employee_present_address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="p-address" class="form-label">Employee Permanent Address</label>
                                    <textarea  id="employee_permanent_address" class="form-control"name="employee_permanent_address" rows="4"  cols="70">
                                        {{$employee->employee_permanent_address}}
                                    </textarea>
                                    @error('employee_permanent_address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit">Update Employee</button>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

</div> <!-- container -->

@endsection
