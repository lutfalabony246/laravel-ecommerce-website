@extends('admin.admin_master')

@section('main-content')

<div class="content">
    <div class="container-fluid pt-5">
        <div class="employee-view-container">
            <div class="card">
                <div class="employee-title" style="font-family: Roborto; font-color:black bold; "> View Employee </div>
                <div class="card-body">
                    <div class="employee-image">
                        <img class="img-fluid" src="{{ asset($emp->employee_img) }}" style="height: 200px; width:200px; " alt="">
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <h4>Employee Name: <span class="employee-info">{{$emp->employee_name}}</span></h4>

                            <h4 class="pt-2">Employee Email Id: <span class="employee-info">{{ $emp->email_id}}</span></h4>

                            <h4 class="pt-2">Employee Fathers Name: <span class="employee-info">{{ $emp->employee_fathers_name}}</span></h4>

                            <h4 class="pt-2">Date Of Birth: <span class="employee-info">{{ $emp->employee_date_of_birth}}</span></h4>

                            <h4 class="pt-2">Employee Present Address: <span class="employee-info">{{$emp->employee_present_address}}</span></h4>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <h4>Department Name: <span class="employee-info"> {{$emp->department->department_name}}</span></h4>

                            <h4 class="pt-2">Employee Status:
                                <span class="employee-info">
                                    @if($emp->employee_status==1)
                                        Active
                                    @else
                                        In Active
                                    @endif
                                </span>
                            </h4>

                            <h4 class="pt-2">Employee Mothers Name: <span class="employee-info">{{ $emp->employee_mother_name}}</span></h4>

                            <h4 class="pt-2">Employee Joining Date: <span class="employee-info">{{ $emp->employee_joing_date}}</span></h4>

                            <h4 class="pt-2">Employee Permanent Address: <span class="employee-info">{{$emp->employee_permanent_address}}</span></h4>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <h4>Employee Office Id: <span class="employee-info">{{ $emp->employee_office_id}}</span></h4>

                            <h4 class="pt-2">Employee Phone: <span class="employee-info">{{ $emp->employee_phone}}</span></h4>

                            <h4 class="pt-2">Employee Salary: <span class="employee-info">{{ $emp->employee_salary}}</span></h4>

                            <h4 class="pt-2">Employee Designation: <span class="employee-info">{{ $emp->designation}}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->

</div> <!-- content -->


@endsection
