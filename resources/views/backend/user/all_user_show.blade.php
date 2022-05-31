@extends('admin.admin_master')


@section('main-content')

@php
 $total_confirm_order = App\Models\Order::where('status','confirm')->get();
 $orders = App\Models\Order::where('status','pending')->orderBy('id','DESC')->get();
 $total_picked_order = App\Models\Order::where('status','picked')->get();
 $total_shipped_order = App\Models\Order::where('status','shipped')->get();
 $total_cancel_order = App\Models\Order::where('status','cancel')->get();
 $asset = App\Models\Asset::all();
 $orders = App\Models\Order::where('status','pending')->orderBy('id','DESC')->get();
@endphp

<a style="margin-top:10px;font-size:20px;margin-left:10px;" href="{{ route('role.all-users',config('fortify.guard'))}}" class="btn btn-primary"><i>Back</i></a>

<div class="row">
    <div class="col-lg-6">
        <div class="">
            <div class="">
                <h3 class=" ">Customer Info</h3>
            </div>

                <table  class="table table-striped">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> Customer Profile Picture:  </td>
                            <td>
                                <img style="height: 70px;width: 70px;" src="{{asset('upload/users_images/'.$show->profile_photo_path)}}" alt="">
                            </td>
                        </tr>

                        <tr>
                            <td> Customer Id: </td>
                            <td >{{ $show->id }}</td>
                        </tr>

                        <tr>
                            <td> Customer Name: </td>
                            <td>{{ $show->name }}</td>
                        </tr>

                        <tr>
                            <td> Customer Email: </td>
                            <td>{{ $show->email }}</td>
                        </tr>

                        <tr>
                            <td> Customer Last Seen: </td>
                            <td>{{ $show->last_seen }}</td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="">
            <div class="">
                <h3 class="">Orders Info</h3>
            </div>

            <table class="table table-striped">
                <tr>
                    <th>Order Items</th>
                    <th>Info</th>
                </tr>
                <tr>
                    <td>Total Confirm Order:</td>
                    <td style=" background-color: rgb(14, 170, 109);  ">{{ count($total_confirm_order) }}</td>
                </tr>
                <tr>
                    <td>Total Panding Order:</td>
                    <td style="  background-color: rgb(113, 14, 170); ">{{ count($orders) }}</td>
                </tr>
                <tr>
                    <td>Total Picked Order:</td>
                    <td style="background-color: rgb(146, 165, 41);  ">{{ count($total_picked_order) }}</td>
                </tr>
                <tr>
                    <td>Total shipped Order:</td>
                    <td style=" background-color: rgb(68, 28, 18);  ">{{ count($total_shipped_order) }}</td>
                </tr>
                <tr>
                    <td>Total Cancel Order:</td>
                    <td style=" background-color: rgb(3, 18, 65); ">{{ count($total_cancel_order) }}</td>
                </tr>
                <tr>
                    <td>Debit:</td>
                    <td style=" background-color: rgb(238, 116, 136); ">=${{ $asset[0]->debit }}</td>
                </tr>
                <tr>
                    <td>Credit:</td>
                    <td style="background-color: rgb(167, 189, 236);  ">=${{ $asset[0]->credit }}</td>
                </tr>
                <tr>
                    <td>Total Asset:</td>
                    <td style="background-color: rgb(22, 1, 1); ">= ${{ $asset[0]->credit-$asset[0]->debit }}</td>
                </tr>
            </table>
         </div>
    </div>
</div>

{{-- ////////////////////////////////////// --}}
<div class="container-fluid">

    <div class="col-lg-12">

        <div class="">
            <div class="">
                <h3 class="">Order History</h3>
            </div>
            <!-- /.box-header -->
                <table class="table table-striped" >
                    <thead >
                        <tr>
                            <th>Invoice ID</th>
                            <th>Amount</th>
                            <th>Items</th>
                            <th>Payment Method</th>
                            <th>Order Date</th>
                            <th>Order Month</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $item)
                        <tr>
                            <td>{{ $item->invoice_no }}</td>
                            <td >${{ $item->amount }}</td>
                            <td>{{ $item->name }}</td>
                            <td >{{ $item->payment_method }}</td>
                            <td >{{ $item->order_date }}</td>
                            <td >{{ $item->order_month }}</td>
                            <td >{{ $item->status }}</td>
                            <td>
                                <div>
                                    <a  href="http://127.0.0.1:8000/admin/login" class="btn btn-danger"><i>Details</i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div><!-- box end -->
    </div> <!-- col end -->

</div>

@endsection

@section('css')
    <style>
        table,tr,td{
         border:.1px solid rgb(18, 59, 97);
            text-align: center;
            font-size:15px;
            padding: 5px;


        }

    </style>
@endsection
