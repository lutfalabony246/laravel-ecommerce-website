



@extends('admin.admin_master')

@section('main-content') 

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="d-lg-flex justify-content-lg-between mb-2">
                <div class="col-lg-6 col-12 paymentInfo">
                  <h4 class="header-title">Payment History</h4>
                  <p><b>Supplier Name :</b> Rahim Febrics</p>
                  <p><b>Supplier ID :</b> RF 123456</p>
                  <p><b>Contact No :</b> +8801 XXXX XXXXX</p>
                  <p><b>Address :</b> 1219 Dhaka, Bangladesh · 3</p>
                </div>
                <div class="col-lg-6 col-12 d-lg-flex justify-content-lg-end">
                </div>
              </div>
              <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                  <div class="row">
                      <div class="col-sm-12 col-md-6">
                          <div class="dataTables_length" id="datatable-buttons_length">
                              <label class="form-label">Show <select name="datatable-buttons_length" aria-controls="datatable-buttons" class="form-select form-select-sm">
                                  <option value="10">10</option><option value="25">25</option>
                                  <option value="50">50</option><option value="100">100</option>
                                </select> entries</label>
                            </div>
                        </div>                      
                            </div>
                            <div class="row">
                                <div class="col-sm-12" style="overflow-x: auto;">
                                    <table id="datatable-buttons" class="table table-striped nowrap w-100 dataTable no-footer" role="grid" aria-describedby="datatable-buttons_info">
                <thead>
                  <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Date: activate to sort column descending" style="width: 89.2188px;">Date</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Product ID: activate to sort column ascending" style="width: 89.5625px;">Product ID</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Brand Name: activate to sort column ascending" style="width: 103.688px;">Brand Name</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Product Name: activate to sort column ascending" style="width: 373.656px;">Product Name</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Product Price: activate to sort column ascending" style="width: 115.125px;">Product Price</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Product Return Price : activate to sort column ascending" style="width: 174.859px;">Product Return Price </th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Withdrawal Amount: activate to sort column ascending" style="width: 168.75px;">Withdrawal Amount</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Total Balance: activate to sort column ascending" style="width: 114.391px;">Total Balance</th></tr>
                </thead>
                <tbody>
                  
                  
                  
                  
                  
                  
                <tr class="odd">
                    <td class="sorting_1">10 Feb, 2022</td>
                    <td># WBH 5484</td>
                    <td>Brand Name</td>
                    <td>P47 - Wireless Bluetooth
                      Headphone WBH 5484</td>
                    <td>৳ 1,00,000</td>
                    <td>-</td>
                    <td>-</td>
                    <td>৳ 1,00,000</td>
                  </tr><tr class="even">
                    <td class="sorting_1">10 Feb, 2022</td>
                    <td># WBH 5484</td>
                    <td>Brand Name</td>
                    <td>P47 - Wireless Bluetooth
                      Headphone WBH 5484</td>
                    <td>৳ 1,00,000</td>
                    <td>-</td>
                    <td>-</td>
                    <td>৳ 1,00,000</td>
                  </tr><tr class="odd">
                    <td class="sorting_1">10 Feb, 2022</td>
                    <td># WBH 5484</td>
                    <td>Brand Name</td>
                    <td>P47 - Wireless Bluetooth
                      Headphone WBH 5484</td>
                    <td>৳ 1,00,000</td>
                    <td>-</td>
                    <td>-</td>
                    <td>৳ 1,00,000</td>
                  </tr><tr class="even">
                    <td class="sorting_1">10 Feb, 2022</td>
                    <td># WBH 5484</td>
                    <td>Brand Name</td>
                    <td>P47 - Wireless Bluetooth
                      Headphone WBH 5484</td>
                    <td>৳ 1,00,000</td>
                    <td>-</td>
                    <td>-</td>
                    <td>৳ 1,00,000</td>
                  </tr><tr class="odd">
                    <td class="sorting_1">10 Feb, 2022</td>
                    <td># WBH 5484</td>
                    <td>Brand Name</td>
                    <td>P47 - Wireless Bluetooth
                      Headphone WBH 5484</td>
                    <td>৳ 1,00,000</td>
                    <td>-</td>
                    <td>-</td>
                    <td>৳ 1,00,000</td>
                  </tr></tbody>
              </table>
            </div>
        </div>
      
</div>

            </div> <!-- end card body-->
          </div> <!-- end card -->
        </div><!-- end col-->
      </div>
      <!-- end row-->

    </div> <!-- container -->

  </div>



@endsection