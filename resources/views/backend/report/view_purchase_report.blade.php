      @extends('admin.admin_master')
      @section('main-content')
          <!-- Start Content-->
          <div class="container-fluid">
              {{-- for table --}}
              <div class="row mt-3">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">
                              <div class="mb-3">
                                  {{-- <h4 class="header-title" style="font-size: 24px;">All Product List</h4> --}}
                              </div>
                              <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                  <thead>
                                      <tr>
                                          <th>Sl No</th>
                                          <th>Date </th>
                                          <th>Supplier Name </th>
                                          <th>Product Name </th>
                                          <th>Product Qty. </th>
                                          <th>Unit Price</th>
                                          <th>Total Amount </th>
                                          <th>Due Amount </th>
                                          <th>Payment Method </th>
                                          <th>Purchaed By</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                      @foreach ($report as $item)
                                          <tr>
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $item->purchase_date }}</td>
                                              <td>{{ $item['supplier']['supplyer_name'] }}</td>
                                              @if ($item->product_id)
                                                  <td>{{ $item['productName']['product_name'] }}</td>
                                              @else
                                                  <td>{{ $item->new_product }}</td>
                                              @endif
                                              <td>{{ $item->product_qty }} </td>
                                              <td>{{ $item->unit_price }}</td>
                                              <td>{{ $item->total_price }}</td>
                                              <td>{{ $item->due_amount }}</td>
                                              <td>{{ $item->payment_method }}</td>
                                              <td>{{ Auth::guard('admin')->user()->name }}</td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div> <!-- end card body-->
                      </div> <!-- end card -->
                  </div><!-- end col-->
              </div>
              {{-- end table --}}
          </div>
      @endsection
