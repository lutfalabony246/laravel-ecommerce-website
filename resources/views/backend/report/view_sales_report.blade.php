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

                                          <th>Sold By </th>
                                          <th>Product Name</th>
                                          <th>Quantity </th>
                                          <th>Tax </th>
                                          <th>Discount </th>
                                          <th>Total</th>
                                          <th>Invoice Id </th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($orders as $item)
                                          <tr>
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $item->order_date }}</td>
                                              <td>{{ Auth::guard('admin')->user()->name }}</td>
                                              <td>{{ $item->product_name }}</td>
                                              <td>{{ $item->qty }}</td>
                                              <td>{{ $item->vat }}%</td>
                                              <td>{{ $item->qty }}</td>
                                              <td>{{ $item->price }}</td>
                                              <td>{{ $item->invoice_no }}</td>
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
