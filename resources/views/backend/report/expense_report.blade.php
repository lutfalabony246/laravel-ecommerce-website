@extends('backend.report.report_templete')

@section('main')
<h3>Expense report</h3>
  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">

        <th>EXpense Type</th>
        <th>Expense payment type</th>
        <th>Description</th>
        <th>ammount</th>

      </tr>
    </thead>
    <tbody>



        @foreach($expens as $exp)
        <tr class="font">


          <td align="center"> {{$exp->expense_type_name->expense_type}}</td>
          <td align="center">{{$exp->expense_payment_type}}</td>
          <td align="center">{{ $exp->description }}</td>
          <td align="center">{{$exp->expense_amount}}</td>

        </tr>
        @endforeach

    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;">Subtotal:</span>{{ "demu"}} Taka</h2>
            <h2><span style="color: green;">Total:</span>{{ "demu"}} Taka</h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
@endsection
