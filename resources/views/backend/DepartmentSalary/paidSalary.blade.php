@extends('admin.admin_master')

@section('main-content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="employee-title" style="margin-left: 27px;">Salary Details</h4>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Date</th>
                                    <th>Office ID</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Total Salary</th>
                                    <th>Paid Salary</th>
                                    <th>Due Salary</th>
                                    <th>Bonus Salary</th>
                                    <th>Advance Salary</th>
                                    <th>Added By</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $sn=1;
                                // dd($paidEmployes)
                            @endphp
                                @foreach ($paidEmployes as $employee)

                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ $employee->salary_date }}</td>
                                       <td>{{ $employee->employee_office_id }}</td>
                                        <td>{{ $employee->employee_name }}</td>
                                        <td>{{ $employee->designation }}</td>
                                        <td>{{ $employee->employee_salary }}</td>
                                        <td>{{ $employee->paid_salary }}</td>
                                        <td>{{ $employee->due_salary }}</td>
                                        <td>{{ $employee->bonus }}</td>
                                        <td>{{ $employee->advance_salary }} </td>
                                        <td>{{ $employee->added_by }} </td>
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
