@extends('backend.report.report_templete')
@section('main')
<h3>Expense report</h3>
  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">

        <th>Department_id</th>
        <th>Employee_name</th>
        <th>Employee_salary</th>
        <th>Paid_salary</th>
        <th>Due_salary</th>
        <th>Bonus</th>
        <th>Total_salary</th>

      </tr>
    </thead>
    <tbody>



        @foreach($paidEmployes as $emp)
        <tr class="font">


          <td align="center"> {{$emp->department_id}}</td>
          <td align="center">{{$emp->employee_name}}</td>
          <td align="center">{{ $emp->employee_salary }}</td>
          <td align="center">{{$emp->paid_salary}}</td>
          <td align="center">{{$emp->due_salary}}</td>
          <td align="center">{{ $emp->bonus}}</td>
          <td align="center">{{$emp->total_salary}}</td>

        </tr>
        @endforeach

    </tbody>
  </table>
  <br>

@endsection
