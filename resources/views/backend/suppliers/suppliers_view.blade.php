@extends('admin.admin_master')
{{-- section id is yeild name --}}
@section('main-content')
    <div class="container-full">
        <section class="content">
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-end">
                                    <button data-bs-toggle="modal" data-bs-target="#addSupplierModal" type="button"
                                        class="btn btn-success waves-effect waves-light mb-2 me-2"><i
                                            class="fas fa-plus pe-2"></i> Add Suppliers</button>
                                </div>
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Suppliers List</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="datatable-buttons"
                                                class="table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Suppliers ID</th>
                                                        <th>Suppliers Name</th>
                                                        <th>Organization Name</th>
                                                        <th>supplier email</th>
                                                        <th>supplier phone</th>
                                                        <th>supplier phone2</th>
                                                        <th>supplier bank_info</th>
                                                        <th>supplier mobile_bank_info</th>
                                                        <th>supplier address</th>
                                                        <th>Status</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="supplierDataShow">
                                                </tbody>
                                            </table>
                                        </div> <!-- table res.. end -->
                                    </div> <!-- box body end -->
                                </div> <!-- box end -->
                            </div> <!-- col end -->
                        </div>
                    </div>
                </div> <!--  row end-->
            </div>
        </section>
    </div>
    {{-- ----------------Add Supplier modal start ----------------- --}}
    <div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl  ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black text-center" id="exampleModalLabel">Add suppliers</h5>
                    <button type="button" id="clickData" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="add_supplier_form">

                    <div class="modal-body p-4 bg-light ">
                        <div class="row p-2">
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_name">Supplier Name</label>
                                    <input type="text" name="supplyer_name" id="supplyer_name" class="form-control">
                                    <span id="supplyer_name" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="company_name">Organization Name</label>
                                    <input type="text" name="company_name" class="form-control" id="company_name">
                                    <span id="company_name" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_email">Supplier Email</label>
                                    <input type="email" name="supplyer_email" id="supplyer_email" class="form-control">
                                    <span id="supplyer_email" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_phone">Mobile Number</label>
                                    <input type="text" name="supplyer_phone" id="supplyer_phone" class="form-control">
                                    <span id="supplyer_phone" class="errorColor"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_phone2">Mobile Number2</label>
                                    <input type="text" name="supplyer_phone2" id="supplyer_phone2" class="form-control">
                                    <span id="supplyer_phone2" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_bank_info">Bank Details</label>
                                    <textarea class="form-control" name="supplyer_bank_info" id="supplyer_bank_info" rows="5"></textarea>
                                    <span id="supplyer_bank_info" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_mobile_bank_info">Mobile Banking Details</label>
                                    <textarea class="form-control" name="supplyer_mobile_bank_info" id="supplyer_mobile_bank_info" rows="5"></textarea>
                                    <span id="supplyer_mobile_bank_info" class="errorColor"></span>

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_address">Supplier Address</label>
                                    <textarea class="form-control"  name="supplyer_address" id="supplyer_address" rows="5"></textarea>
                                    <span id="supplyer_mobile_bank_info" class="errorColor"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="padding: 12px;width:90px;"data-bs-dismiss="modal">Close</button>
                        <button type="submit" style="padding: 12px; width:90px;" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ----------------Add Supplier modal end ----------------- --}}
    {{-- ----------------Edit Supplier modal start ----------------- --}}
    <div class="modal fade" id="editSupplierModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl  ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update suppliers</h5>
                    <button type="button" id="clickDatas" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit_supplier_form">
                    <div class="modal-body p-4 bg-light ">
                        <div class="row p-2">
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_name">Supplier Name</label>
                                    <input type="text" name="supplyer_name" id="edit_supplyer_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="company_name">Organization Name</label>
                                    <input type="text" name="company_name" class="form-control" id="edit_company_name">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_email">Supplier Email</label>
                                    <input type="email" name="supplyer_email" id="edit_supplyer_email"class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_phone">Mobile Number</label>
                                    <input type="text" name="supplyer_phone" id="edit_supplyer_phone" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_phone2">Mobile Number2</label>
                                    <input type="text" name="supplyer_phone2" id="edit_supplyer_phone2" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_bank_info">Bank Details</label>
                                    <textarea class="form-control" name="supplyer_bank_info" id="edit_supplyer_bank_info"  rows="5"></textarea>
                                    <span id="edit_supplyer_bank_info" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_mobile_bank_info">Mobile Banking Details</label>
                                    <textarea class="form-control" name="supplyer_mobile_bank_info" id="edit_supplyer_mobile_bank_info"  rows="5"></textarea>
                                    <span id="edit_supplyer_mobile_bank_info" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_address">Supplier Address</label>
                                    <textarea class="form-control" name="supplyer_address" id="edit_supplyer_address" rows="5"></textarea>
                                    <span id="edit_supplyer_address" class="errorColor"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="padding: 12px;width:90px;"data-bs-dismiss="modal">Close</button>
                        <button type="submit" style="padding: 12px; width:90px;" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    {{-- ----------------Edit Supplier modal end ----------------- --}}
@endsection
@section('script')
    {{-- --------------formDataAdd modal start -------------------- --}}
    <script>
        $(document).on('submit', '#add_supplier_form', function(event) {
            event.preventDefault();
            let imagesData = new FormData($('#add_supplier_form')[0]);
            const role = "{{ config('fortify.guard') }}";
            console.log(imagesData);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: `/${role}/suppliers/supplier/insertData`,
                data: imagesData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // ClearFunction();
                    supplierDataShow();
                    // $("#clickData").trigger("click");
                    console.log(response);
                },
            });
        });

        // ---------------------supplier Data Show Start----------------------
        function supplierDataShow() {
            const role = "{{ config('fortify.guard') }}";
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/suppliers/supplier/all`,
                success: function(response) {
                    console.log(response);
                    $('#supplierDataShow').empty();
                    var data = '';
                    $.each(response, function(key, value) {

                        data += ` <tr>
                                    <td>${value.supplyer_id_code}</td>
                                    <td>${value.supplyer_name}</td>
                                    <td>${value.company_name}</td>
                                    <td>${value.supplyer_email}</td>
                                    <td>${value.supplyer_phone}</td>
                                    <td>${value.supplyer_phone2}</td>
                                    <td>${value.supplyer_bank_info}</td>
                                    <td>${value.supplyer_mobile_bank_info}</td>
                                    <td>${value.supplyer_address}</td>
                                    <td>`;
                                        if(value.supplyer_status == 1){
                                            data += ` <span class="btn btn-success">Active</span>`;
                                        }else{
                                            data += ` <span class="btn btn-success">Deactive</span>`;
                                        }
                                        if(value.supplyer_status == 1){
                                            data += ` <a href="{{ url('/${role}/suppliers/supplier/Deactive/all') }}/${value.id}"  class="btn btn-secondary">Inactive</a>`;
                                        }else{
                                            data += ` <a href="{{ url('/${role}/suppliers/supplier/Active/al') }}/${value.id}"class="btn btn-secondary">Active</a>`;
                                        }
                                    data +=`</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editSupplierModal" id="supplierEdit"
                                         onclick="supplierShowDataEdit(${value.id})"><i class="fas fa-edit fa-lg"></i></a>
                                         <a href="#" class="btn font-15 text-danger" onclick="supplierShowDataDelete(${value.id})">
                                            <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr> `;
                    });
                    $('#supplierDataShow').append(data);
                },
            });
        }
        supplierDataShow();
        // ---------------------supplier Data Show end----------------------

        // -----------------supplier Data Delete--------------------
        function supplierShowDataDelete(id) {
            const role = "{{ config('fortify.guard') }}";
            var data = id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/suppliers/supplier/delete/` + data,
                success: function(response) {
                    supplierDataShow();
                    console.log(response)

                },
            });
        }

        // ---------------------edit supplier------------------------
        function supplierShowDataEdit(id) {
            const role = "{{ config('fortify.guard') }}";
            var data = id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/suppliers/supplier/edit/` + data,
                success: function(response) {
                    $('#id').val(response.id);
                    $('#edit_supplyer_name').val(response.supplyer_name);
                    $('#edit_company_name').val(response.company_name);
                    $('#edit_supplyer_email').val(response.supplyer_email);
                    $('#edit_supplyer_phone').val(response.supplyer_phone);
                    $('#edit_supplyer_phone2').val(response.supplyer_phone2);
                    $('#edit_supplyer_bank_info').val(response.supplyer_bank_info);
                    $('#edit_supplyer_mobile_bank_info').val(response.supplyer_mobile_bank_info);
                    $('#edit_supplyer_address').val(response.supplyer_address);
                    supplierDataShow();

                    console.log(response)

                },
            });

        }

        $(document).on('submit', '#edit_supplier_form', function(event) {
            event.preventDefault();
            const role = "{{ config('fortify.guard') }}";
            let id = $('#id').val();
            let DataUpdate = new FormData($('#edit_supplier_form')[0]);
            console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: `/${role}/suppliers/supplier/updateData/` + id,
                data: DataUpdate,
                contentType: false,
                processData: false,
                success: function(response) {
                    supplierDataShow();
                    $("#clickDatas").trigger("click");
                    console.log(response);
                },
            });
        });

        // ----------------data clear function ---------------------------
        function ClearFunction() {
            $('#supplyer_name').val('');
            $('#company_name').val('');
            $('#supplyer_email').val('');
            $('#supplyer_phone').val('');
            $('#supplyer_phone2').val('');
            $('#supplyer_bank_info').val('');
            $('#supplyer_mobile_bank_info').val('');
            $('#supplyer_address').val('');
        }
    </script>
    {{-- --------------formDataAdd modal end -------------------- --}}
@endsection
