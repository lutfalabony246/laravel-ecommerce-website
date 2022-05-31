@extends('admin.admin_master')

@section('main-content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h4 class="header-title">Total Employee Information</h4>
                        </div>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <td>Employee Phone</td>
                                    <td>Employee Profile Image</td>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->employee_office_id }}</td>
                                    <td>{{ $employee->employee_name }}</td>
                                    <td>{{ $employee->employee_phone }}</td>
                                    <td>
                                      <img src="{{ asset($employee->employee_img) }}" style="height:70px; width:70px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('role.employee.details',[config('fortify.guard'), $employee->id] )}}" class="action-icon"><i class="fas fa-eye"></i></a>

                                        <a href="{{ route('role.employee.edit', [config('fortify.guard'), $employee->id] ) }}" class="action-icon edit-icon"><i class="mdi mdi-square-edit-outline"></i></a>

                                        <a href="{{ route('role.employee.delete', [config('fortify.guard'), $employee->id] ) }}" class="action-icon delete-icon" id="#"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div> <!-- container -->
</div> <!-- content -->
@endsection


