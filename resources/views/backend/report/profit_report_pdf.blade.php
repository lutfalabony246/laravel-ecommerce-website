@extends('admin.admin_master')
@section('main-content')

<div class="content">
<!-- Start Content-->
<div class="container-fluid">
  <div class="row mt-4">
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <div class="mb-2">
            <h4 class="header-title">Order List</h4>
            </div>

            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
            <thead>
                <tr>
                        <th>Total Income</th>
                        <th>Employee Salary</th>
                        <th>Expense Cost</th>
                        <th>Return Amount</th>
                        <th>Total Profit</th>
                </tr>
            </thead>
            <tbody>
                <td>{{$totalincome}} tk  </td>
                <td> {{$salarypay}} tk </td>
                <td>{{$expancepay}} tk </td>
                <td>{{$returnamount}} tk </td>
                <td> {{ $profit }} tk  </td>
            </tbody>
            </table>
        </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
  </div>
</div> <!-- container -->

</div>


@endsection
