@extends('admin.admin_master')
@section('main-content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex justify-content-lg-between mb-2">
                            <div class="col-lg-6">
                                <h4 class="header-title">Return Product</h4>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-lg-center">
                                <div class="col-lg-7 justify-content-lg-center" style="display: contents">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#return-product-modal"><button
                                            type="button" class="btn btn-success waves-effect waves-light mb-2 me-2">Add
                                            Returnable Product</button></a>
                                </div>
                            </div>
                        </div>
                        <table id="datatable-buttons" class="table table-striped nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Brand Name</th>
                                    <th style="width: 25%;">
                                        <div class="qty">
                                            <p class="line">QTY of Size</p>
                                            <p><i class="fas fa-angle-right right-arrow"></i></p>
                                            <p><i class="fas fa-angle-left left-arrow"></i></p>
                                        </div>
                                        <table class="text-center d-flex">
                                            <thead>
                                                <tr>
                                                    <th class="px-3">M</th>
                                                    <th class="px-3">L</th>
                                                    <th class="px-3">X</th>
                                                    <th class="px-3">XL</th>
                                                    <th class="px-3">XXL</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </th>
                                    <th>Return Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td># WBH 5484</td>
                                    <td>P47 - Wireless Bluetooth
                                        Headphone WBH</td>
                                    <td>Brand Name</td>
                                    <td>
                                        <table class="text-center d-flex">
                                            <tbody>
                                                <tr>
                                                    <td class="px-3">0</td>
                                                    <td class="px-3">0</td>
                                                    <td class="px-3">2</td>
                                                    <td class="px-4">0</td>
                                                    <td class="px-3">0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>৳ 500</td>
                                </tr>
                                <tr>
                                    <td># WBH 5484</td>
                                    <td>P47 - Wireless Bluetooth
                                        Headphone WBH</td>
                                    <td>Brand Name</td>
                                    <td>
                                        <table class="text-center d-flex">
                                            <tbody>
                                                <tr>
                                                    <td class="px-3">0</td>
                                                    <td class="px-3">0</td>
                                                    <td class="px-3">0</td>
                                                    <td class="px-4">0</td>
                                                    <td class="px-3">0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>৳ 500</td>
                                </tr>
                                <tr>
                                    <td># WBH 5484</td>
                                    <td>P47 - Wireless Bluetooth
                                        Headphone WBH</td>
                                    <td>Brand Name</td>
                                    <td>
                                        <table class="text-center d-flex">
                                            <tbody>
                                                <tr>
                                                    <td class="px-3">0</td>
                                                    <td class="px-3">0</td>
                                                    <td class="px-3">0</td>
                                                    <td class="px-4">0</td>
                                                    <td class="px-3">0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>৳ 500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div> <!-- container -->
    <!-- return product modal -->
    <div class="return-product-modal">
        <div class="modal fade" tabindex="-1" id="return-product-modal">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Submit SKU Code</h5> <button type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3"> <label for="name" class="form-label">SKU Code</label> <input
                                class="form-control" type="text" id="name"> </div>
                    </div>
                    <div class="modal-footer"> <button type="button"
                            class="btn btn-light waves-effect waves-light mb-2 me-2" data-bs-dismiss="modal">Close</button>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#return-product-submit-modal"><button
                                type="button" class="btn btn-success waves-effect waves-light mb-2 me-2">Submit</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- return product submit modal -->
@endsection
