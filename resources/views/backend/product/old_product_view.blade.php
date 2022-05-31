@extends('admin.admin_master')
@section('main-content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <h4 class="header-title" style="font-size: 24px;">All Product List</h4>
                            </div>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Image </th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Brand</th>
                                        <th>Category </th>
                                        {{-- <th> Sub Category </th>
                                        <th>Sub Sub Category </th> --}}
                                        {{-- <th>Product Description </th> --}}
                                        <th>QrCode</th>
                                        <th>Status </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($product as $item)
                                        <tr>
                                            <td> <img src="{{ asset($item->product_thambnail) }}"
                                                    style="width: 60px; height: 50px;"> </td>
                                            <td>{{ $item->product_name }}</td>
                                            {{-- <td>{{ $item['purchase']['new_product'] }}</td> --}}
                                            <td>{{ $item->product_code }}$</td>
                                            <td>{{ $item['brand']['brand_name_cats_eye'] }}</td>
                                            <td>{{ $item['category']['category_name'] }}</td>
                                            {{-- <td>{{ $item['subcategory']['sub_category_name'] }}</td> --}}
                                            {{-- <td>{{ $item['subsubcategory']['subsubcategory_name'] }}</td> --}}
                                            {{-- <td>{!! $item->product_descp !!}</td> --}}
                                            <td> <a href="#" class="btn btn-success barcode"
                                                    data-id="{{ $item->id }}">Generate</a></td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge badge-pill bg-success"
                                                        style="color: black;">Active</span>
                                                @else
                                                    <span class="badge badge-pill bg-danger"
                                                        style="color: black;">Deactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('role.product.all_info_view', [config('fortify.guard'), $item->id]) }}"
                                                    class="btn btn-primary" title="Product View Data"><i
                                                        class="fa fa-eye"></i> </a>
                                                <a href="{{ route('role.product.edit', [config('fortify.guard'), $item->id]) }}"
                                                    class="btn btn-info" title="Edit Data"><i
                                                        class="mdi mdi-square-edit-outline"></i></i>
                                                </a>
                                                <a href="{{ route('role.product.delete', [config('fortify.guard'), $item->id]) }}"
                                                    class="btn btn-danger" title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                @if ($item->status == 1)
                                                    <a href="{{ route('role.product.deactive', [config('fortify.guard'), $item->id]) }}"
                                                        class="btn btn-danger" title="Product Deactive Now"><i
                                                            class="fa fa-arrow-down"></i> </a>
                                                @else
                                                    <a href="{{ route('role.product.active', [config('fortify.guard'), $item->id]) }}"
                                                        class="btn btn-success" title="Product Active Now"><i
                                                            class="fa fa-arrow-up"></i> </a>
                                                @endif
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
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentname"></h5>
                    <a href="#"><i id="closemodal" class="fas fa-window-close"></i></a>
                    </button>
                </div>
                <div class="modal-body" style="background-color: white">
                    <div class="form-group mx-sm-1 mb-1">
                        <label for="">Print Quantity</label>
                        <input id="submit_id" type="hidden">
                        <input id="print_quantity" class="form-control-sm" type="text">
                        <button id="submit" data-dismiss="modal" class="btn btn-success mb-2">Print</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $('.barcode').click(function() {
                let product_id = $(this).data('id');
                $('#submit_id').val(product_id);
                //alert("hello");
                $('#mymodal').modal('show');
                // $('#print_quantity').val('show');
                $('#closemodal').click(function() {
                    $('#mymodal').modal('hide');
                });
                $('#submit').click(function() {

                    let print_quantity = $('#print_quantity').val();
                    let product_id = $('#submit_id').val();
                    // alert(product_id);
                    // alert(print_quantity);
                    $('#mymodal').modal('hide');
                    url =
                        `/{{ config('fortify.guard') }}/product/get/barcode/${product_id}/${print_quantity}`;
                    let w = window.open(url);
                    w.print();
                });
            });
        });
    </script>
@endsection
