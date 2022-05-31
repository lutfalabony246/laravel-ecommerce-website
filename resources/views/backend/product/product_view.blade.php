@extends('admin.admin_master')
@section('css')

{{-- ager --}}

<!-- Plugins css -->
<link href="{{ asset('backend/assets') }}/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets') }}/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />

<link href="{{ asset('backend/assets') }}/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets') }}/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets') }}/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets') }}/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('backend/assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('backend/assets') }}/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"
    type="text/css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    rel="stylesheet" />
<style>
    .toggle {
        margin: 0 0 0 2rem;
        position: relative;
        display: inline-block;
        width: 6rem;
        height: 2.4rem;
    }

    .toggle input {
        display: none;
    }

    .roundbutton {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        background-color: #dae0eb;
        display: block;
        transition: all 0.3s;
        border-radius: 3.4rem;
        cursor: pointer;
    }

    .roundbutton:before {
        position: absolute;
        content: "";
        height: 1.4rem;
        width: 1.5rem;
        border-radius: 100%;
        display: block;
        left: 0.5rem;
        bottom: 0.5rem;
        background-color: white;
        transition: all 0.3s;
    }

    input:checked+.roundbutton {
        background-color: #7a88e6;
    }

    input:checked+.roundbutton:before {
        transform: translate(2.6rem, 0);
    }

    .bootstrap-tagsinput {
        background: #272e48;
        width: 100%;
        border: 1px solid rgba(255, 255, 255, 0.12);
        font: #ffffff;
    }

    .modal_scroll {
        height: 80vh;
        overflow-y: auto;
    }

    /* .ckchange{
        min-height: 50px !important;

        } */
    textarea.form-control {
        min-height: 50px !important;
    }




    /* new add for image */

    body {
        font-family: sans-serif;
        background-color: #eeeeee;
    }

    .file-upload {
        background-color: #ffffff;
        width: 250px;
        height: 198px;
        margin: 0 auto;
        padding: 10px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #ffffff;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        /* border: 4px dashed #1FB264; */
        position: relative;
    }

    /* .image-dropping,
.image-upload-wrap:hover {
  background-color: #ffffff;
  border: 4px dashed #ffffff;
} */

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 120px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    /* 2060 */
    .remove-image {
        /* width: 200px; */
        /* height: 45px; */
        /* margin: 0; */
        color: rgb(255, 0, 0);
        /* background: #b70000; */
        border: none;
        padding: 5px;
        border-radius: 4px;
        transition: all .2s ease;
        /* outline: none; */
        /* text-transform: uppercase; */
        font-size: 11px;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }

    .design {
        background-color: #f3f7f9;
        /* margin-bottom: 50px; */

        padding-left: 50px;
        padding-right: 50px;
    }

    .hr {
        /* margin: 1.5rem 0; */
        color: #e5e8eb;
        background-color: #e5e8eb !important;
        border: 0;
        opacity: 1;
        padding: 0px !important;
        margin: 0px !important;

    }
</style>




@endsection
@section('main-content')

<div class="content mt-2">
    <!-- Start Content-->
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="add-brand-container d-flex justify-content-between mb-2">
                            <p style="font-size: 24px;"></p>
                            <button data-bs-toggle="modal" data-bs-target="#addProductModal" type="button"
                                class="btn btn-success waves-effect waves-light mb-2 me-2"><i
                                    class="fas fa-plus pe-2"></i> Add Product</button>
                        </div>


                        <div class="mb-3">
                            <p class="header-title" style="font-size: 24px;">All Product List</p>

                        </div>

                        <table id="datatable-buttons" class="table table-striped nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Code </th>
                                    <th>Supplier Name </th>
                                    <th>Supplier Product Code </th>
                                    <th>Brand Name </th>
                                    <th>Category </th>
                                    <th> Sub Category </th>
                                    <th>Product Name</th>
                                    <th>Weight (gm / ml)</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Purchase QTY</th>
                                    <th>Available Stock QTY</th>
                                    <th>Buying Price</th>
                                    <th>Selling Price</th>
                                    <th>Discount Price</th>
                                    <th>Discount Start date</th>
                                    <th>Discount Close Date</th>
                                    <th>Product Expire date</th>
                                    <th>Purches Date</th>
                                    <th>QR Code</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $item)

                                @php

                                $alertStatus = 0;
                                $quantityStatus = 0;
                                $start= \Carbon\Carbon::today();
                                $end = \Carbon\Carbon::parse($item->product_expire_date);
                                $difference = $end->diffInDays($start);
                                if($start->lte($end) && ($difference <= optional($item)->product_expire_alert_date))
                                    {

                                    $alertStatus = 1;
                                    }

                                    if($item->product_stock_alert >= $item->product_qty)
                                    {
                                    $quantityStatus = 1;
                                    }



                                    if(!\Carbon\Carbon::now()->between(\Carbon\Carbon::parse($item->start_date),\Carbon\Carbon::parse($item->end_date)))
                                    {
                                    $item->discount_price = 0;
                                    $item->save();
                                    }




                                    @endphp


                                    <tr>
                                        <td> <img src="{{ asset($item->product_thambnail) }}"
                                                style="width: 60px; height: 50px;"> </td>
                                        <td>{{ $item->product_code }}</td>


                                        <td>{{ optional($item->supplier)->supplyer_name }}
                                        </td> 
                                        
                                        
                                           <td>{{ optional($item)->supplier_product_code }} </td>

                                        <td>{{ optional($item['brand'])['brand_name_cats_eye'] }}
                                        </td>
                                        <td>{{ optional($item['category'])['category_name'] }}
                                        </td>
                                        <td>{{ optional($item['subcategory'])['sub_category_name'] }}
                                        </td>



                                        <td>{{ optional($item)->product_name }}</td>
                                        <td>{{ optional($item)->unit }}</td>

                                        <td>{{ optional($item)->product_color }}</td>
                                        <td>{{ optional($item)->product_size }}</td>

                                        <td>{{ optional($item)->purchase_qty }}</td>

                                        <td class="{{ $quantityStatus? 'text-danger' : '' }}">{{
                                            optional($item)->product_qty }}</td>


                                        <td>{{ optional($item)->purchase_price }}</td>
                                        <td>{{ optional($item)->selling_price }}</td>
                                        <td>{{ optional($item)->discount_price }}</td>
                                        <td>{{ optional($item)->start_date }}</td>
                                        <td>{{ optional($item)->end_date }}</td>
                                        <td class="{{ $alertStatus? 'text-danger' : '' }} ">{{
                                            $item->product_expire_date }}</td>
                                        <td>{{ $item->purchase_date }}</td>
                                        <td> <a href="#" class="btn btn-success barcode"
                                                data-id="{{ $item->id }}">Generate</a></td>
                                        <td>
                                            @if($item->status == 1)
                                            <a href="{{ route('role.product.deactive', [config('fortify.guard'), $item->id]) }}"
                                                class="btn btn-success" title="Product Deactive Now">Active </a>
                                            @else
                                            <a href="{{ route('role.product.active', [config('fortify.guard'), $item->id]) }}"
                                                class="btn btn-danger" title="Product Active Now">Deactive </a>
                                            @endif
                                        </td>

                                        <td>
                                            <button class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#addProductModal" title="Add Product"><i
                                                    class="fa fa-plus-circle"></i></button>
                                                    
                                          
                                            <a href="{{ route('role.product.edit', [config('fortify.guard'), $item->id]) }}"
                                                class="btn btn-info" title="Edit Data"><i
                                                    class="mdi mdi-square-edit-outline"></i> </a>
                                                    
                                                    
                                            <a href="{{ route('role.product.delete', [config('fortify.guard'), $item->id]) }}"
                                                class="btn btn-danger" title="Delete Data" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <button class="btn btn-blue viewBtn" title="Edit Product" productview_id={{
                                                $item->id }}><i class="fas fa-eye"></i></button>
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

{{-- start add product --}}
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Add New Product</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="add_product_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4 bg-light">
                    <input id="new_purchase_qty" type="hidden" name="purchase_qty" value="">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="" class="mb-2">Thumbnail Image </label>
                            {{-- 2023 --}}
                            <div class="file-upload">

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' name="product_thambnail"
                                        onchange="readURL(this);" accept="image/*" height="200px" />
                                    <div class="drag-text mt-4">
                                        <i class="fas fa-image" style="font-size:35px;color:darkgray"></i>
                                        <p style="font-family: ubuntu; color:red">Add Image <br> <b class="text-danger; text:bold">Size: 400px *
                                            400px</b></p>
                                    </div>
                                </div>

                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <a type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                                class="image-title">Uploaded Image</span>

                                        </a>
                                    </div>
                                </div>
                            </div>
                            <span id="error_thambnail_image" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname" class="mb-2" style="font-size: 13px">Multiple Image Add <span style="color:red; font-weight:bold; font-size: 16">(1024px * 1024px)</span> </label>
                            <input type="file" data-plugins="dropify" name="multi_img[]" multiple="" id="MultiImg"
                                class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <label for="fname">View Multiple Image </label>
                            <div class="row" id="preview_img"></div>
                        </div>
                    </div>
                    {{-- end image --}}
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Product Code (Auto Generate) </label>

                            <input class="form-control" type="text" disabled="" placeholder="#D3VQYK">
                            <span id="error_supplier_name" class="errorColor"></span>
                        </div>

                        <div class="col-lg-3">
                            <label for="fname">Supplier Name </label>
                            <select name="supplier_id" class=" form-select form-control ">
                                <option value="" selected="" disabled="">Select Supplier Name
                                </option>

                                @foreach($supplier as $sup)
                                <option value="{{ $sup->id }}">
                                    {{ $sup->supplyer_name }}
                                </option>
                                @endforeach
                            </select>
                            <span id="error_supplier_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Brand Name </label>
                            <select name="brand_id" class=" form-select form-control ">
                                <option value="" selected="" disabled="">Select Brand Name
                                </option>

                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">
                                    {{ $brand->brand_name_cats_eye }}</option>
                                @endforeach
                            </select>
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Category </label>
                            <select name="category_id" class=" form-select form-control ">
                                <option value="" selected="" disabled="">Select Category Name
                                </option>

                                @foreach($category as $cat)
                                <option value="{{ $cat->id }}">
                                    {{ $cat->category_name }}</option>
                                @endforeach
                            </select>
                            <span id="error_category" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Sub Category </label>
                            <select name="sub_category_id" class=" form-select form-control ">
                                <option value="" selected="" disabled="">Select Sub Category Name
                                </option>

                                @foreach($subcategory as $subcat)
                                <option value="{{ $subcat->id }}">
                                    {{ $subcat->sub_category_name }}</option>
                                @endforeach
                            </select>
                            <span id="error_subcategory" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Sub Sub Category </label>
                            <select name="sub_sub_category_id" class=" form-select form-control ">
                                <option value="" selected="" disabled="">Select Sub Sub Category Name
                                </option>

                                @foreach($subsubcategory as $subsubcat)
                                <option value="{{ $subsubcat->id }}">
                                    {{ $subsubcat->subsubcategory_name }}</option>
                                @endforeach
                            </select>
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Product Name <b class="text-danger">*</b> </label>
                            <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                            <span id="error_productname" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Weight (gm / ml)
                            </label>
                            <input type="text" name="unit" class="form-control" placeholder="120gm / 1ml">
                            <span id="error_weight" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="row my-3">

                        <div class="col-lg-3">
                            <label for="fname">Quantity</label>
                            <input type="text" name="product_qty" class="form-control" placeholder="0" id='qty'>
                            <span id="error_name" class="errorColor"></span>
                        </div>

                        <div class="col-lg-3">
                            <label for="fname">Unit Price </label>
                            <input type="text" class="form-control check" name="unit_price" placeholder="0.00tk"
                                id='unit_price'>
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Purchase Date </label>
                            <input type="date" name="purchase_date" class="form-control">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Buying Price </label>
                            <input type="text" name="purchase_price" class="form-control totalprice"
                                placeholder="Buying Price">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Selling Price</label>
                            <input type="text" id="selling" name="selling_price" class="form-control"
                                placeholder="0.00TK">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Discount Price </label>
                            <input type="text" name="discount_price" class="form-control" placeholder="0.00TK"
                                id="myTextBox" onKeyUp="checkInput()">
                            <div id="invalid" style="color: red;">
                            </div>
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Discount Start Date </label>
                            <input type="date" name="start_date" class="form-control">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Discount Close Date </label>
                            <input type="date" name="end_date" class="form-control" placeholder="Discount Close Date">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Product Expire Date</label>
                            <input type="date" id="basic-datepicker" class="form-control"
                                placeholder="Product Expire Date" name="product_expire_date">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Color </label>


                            <select class="form-control select2" style="background-color: #1FB264"
                                id="select2insidemodal" data-toggle="select2" data-width="100%" multiple="multiple"
                                data-placeholder="Choose Color..." name="product_color[]">
                                <option value="Red" id="red">Red</option>
                                <option value="Pink" id="pink">Pink</option>
                                <option value="White" id="white">White</option>
                                <option value="Blue" id="blue">Blue</option>
                                <option value="Yellow" id="yellow">Yellow</option>
                                <option value="Green" id="green">Green</option>
                                <option value="Black" id="black">Black</option>
                                
                                  <option value="Brown" id="Brown">Brown</option>
                                <option value="Purple" id="Purple">Purple</option>
                                <option value="Dark Blue" id="Dark Blue">Dark Blue</option>
                                <option value="Off white" id="Off white">Off white</option>
                                <option value="Dark Coffee" id="Dark Coffee">Dark Coffee</option>
                                <option value="Dark Green" id="Dark Green">Dark Green</option>
                                <option value="Dark Red" id="Dark Red">Dark Red</option>
                                    <option value="Dark Marron" id="Dark Marron">Dark Marron</option>
                                
                                












                                <option value="Gray" id="Gray">Gray</option>
                                <option value="Olive" id="Olive">Olive</option>
                                <option value="Maroon" id="Maroon">Maroon</option>
                                <option value="Violet" id="Violet">Violet</option>
                                <option value="Charcoal" id="Charcoal">Charcoal</option>

                                <option value="Magenta" id="Magenta">Magenta</option>
                                <option value="Bronze" id="Bronze">Bronze</option>
                                <option value="Cream" id="Cream">Cream</option>
                                <option value="Ten" id="Ten">Ten</option>
                                <option value="Teal" id="Teal">Teal</option>

                                <option value="Mustard" id="Mustard">Mustard</option>
                                <option value="Navy Blue" id="Navy Blue">Navy Blue</option>
                                <option value="Coral" id="Coral">Coral</option>
                                <option value="Burgundy" id="Burgundy">Burgundy</option>
                                <option value="Lavender" id="Lavender">Lavender</option>

                                <option value="Mauve" id="Mauve">Mauve</option>
                                <option value="Peach" id="Peach">Peach</option>
                                <option value="Rust" id="Rust">Rust</option>
                                <option value="Gold" id="Gold">Gold</option>
                                <option value="Silver" id="Silver">Silver</option>
                                <option value="Cyan" id="Cyan">Cyan</option>




                            </select>




                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Size </label>
                            <select class="form-control select2" id="select23insidemodal" data-toggle="select2"
                                data-width="100%" multiple="multiple" data-placeholder="Choose Color..."
                                name="product_size[]">

                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>X</option>
                                <option>XXL</option>
                                <option>XXXL</option>
                                <option>20</option>
                                <option>22</option>
                                <option>24</option>
                                <option>26</option>
                                <option>28</option>
                                <option>30</option>
                                <option>32</option>
                                <option>34</option>
                                <option>36</option>
                                <option>38</option>
                                <option>40</option>
                                <option>42</option>
                                <option>44</option>
                                <option>46</option>
                                <option>48</option>
                                <option>50</option>


                            </select>

                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Video </label>
                            <input type="text" name="video_link" class="form-control" placeholder="Video Link">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Product Stock Alert </label>
                            <input type="text" name="product_stock_alert" class="form-control"
                                placeholder="Product Stock Alert">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">

                            <label for="fname">Product Expire Date Alert</label>

                            <select class="form-control" name="product_expire_alert_date">
                                <option value="" selected="" disabled="">Select Expire Date
                                </option>
                                <option value="1" id="red">1day</option>
                                <option value="2" id="pink">2day</option>
                                <option value="3" id="white">3day</option>
                                <option value="4" id="blue">4day</option>
                                <option value="5" id="yellow">5day</option>
                                <option value="6" id="green">6day</option>
                                <option value="7" id="pink">1week</option>
                                <option value="14" id="white">2week</option>
                                <option value="21" id="blue">3week</option>
                                <option value="28" id="yellow">4week</option>
                                <option value="30" id="green">1month</option>
                                <option value="60" id="black">2month</option>
                                <option value="90" id="black">3month</option>
                                <option value="120" id="black">4month</option>
                                <option value="150" id="black">5month</option>
                                <option value="180" id="black">6month</option>

                            </select>

                            <span id="error_name" class="errorColor"></span>



                        </div>

                        <div class="col-lg-3">
                            <label for="fname">Vat% </label>
                            <input type="text" class=" form-control" value="" name="vat" placeholder="50%">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">SKU Code </label>
                            <input type="text" class=" form-control" value="" name="sku_code"
                                placeholder="184421965_BD-1129385135">
                            <span id="error_name" class="errorColor"></span>
                        </div> 

                    </div>
                    
                    
                    <div class="row">
                             <div class="col-lg-3">
                            <label for="fname">Supplier Product Code </label>
                            <input type="text" class=" form-control" value="" name="supplier_product_code"
                                placeholder="#________">
                            <span id="error_name" class="errorColor"></span>
                        </div> 
                        
                        
                         <div class="col-lg-3">
                          
                        </div> 
                        
                         <div class="col-lg-3">
                           
                        </div> 
                          <div class="col-lg-3">
                           
                        </div> 
                        
                    </div>
                    
                    
                    <div class="row my-3">
                        <div class="col-lg-7">
                            <label for="fname">Add Description</label>
                            <textarea class=" form-control ckeditor " name="product_descp"></textarea>
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-5 mb-5" style="margin-top:-25px">
                            <div class="row my-3 ">
                                <div class="col-lg-12 ">
                                    <label for="fname">Tags </label>
                                    <input type="text" class="selectize-close-btn form-control" value=""
                                        name="product_tags">
                                    <span id="error_name" class="errorColor"></span>
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-lg-12">
                                    <label for="fname">Meta Title </label>
                                    <input type="text" name="meta_title" class="form-control" placeholder="Meta Title ">
                                    <span id="error_name" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-lg-12">
                                    <label for="fname">Add Meta Description </label>
                                    <textarea type="text" name="meta_desc" class="form-control" rows="2"
                                        cols="2"> </textarea>
                                    <span id="error_name" class="errorColor"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-1"></div>

                        <div class="col-lg-10">

                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 style="text-align: center;">All Deals</h3>
                                    <div class="row" style="text-align: center;">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">Featured </label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="toggle">
                                                                        <input id="toggleswitch" type="checkbox"
                                                                            name="featured">
                                                                        <span class="roundbutton"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">Hot Deals </label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="toggle">
                                                                        <input id="toggleswitch" type="checkbox"
                                                                            name="hot_deals">
                                                                        <span class="roundbutton"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            {{-- jcjdscj --}}
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">Special Offer </label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="toggle">
                                                                        <input id="toggleswitch" type="checkbox"
                                                                            name="special_offer">
                                                                        <span class="roundbutton"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">Special Deal </label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="toggle">
                                                                        <input id="toggleswitch" type="checkbox"
                                                                            name="special_deals">
                                                                        <span class="roundbutton"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3" style="text-align: center;">
                                    <h3>Shipping</h3>
                                    <div class="row">
                                        <div class="col-lg-4" id="labony">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="fname">Free Delivery </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="toggle">
                                                        <input id="toggleswitch" type="checkbox" name="shipping"
                                                            onclick=check()>
                                                        <span class="roundbutton"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3" style="text-align: center;">
                                    <h3>Delivery Details</h3>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="fname">Cash On Delivery</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="toggle">
                                                        <input id="toggleswitch" type="checkbox"
                                                            name="cash_on_delivery">
                                                        <span class="roundbutton"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="fname" class="pe-3">Refundable</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="toggle">
                                                        <input type="checkbox" name="refundable">
                                                        <span class="roundbutton ms-3"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="add_product_btn" class="btn btn-success">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end add product --}}

{{-- start edit product --}}
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl modal_scroll">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Product View</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="design">
                <form method="POST" action="{{ route('role.update_product_img',config('fortify.guard')) }}"
                    enctype="multipart/form-data" class='formulti' style="">
                    @csrf
                    <div class="container">
                        <div class="row m-4">
                            <div class="col-lg-2">
                                <div class="image_upload_wrapper">
                                    <div class="multiImageAdd" style="height: 10px; width: 100px; margin: 0px">
                                        <label for="fname" class="mb-2">Multi Img Add </label>
                                        <input type="file" data-plugins="dropify" name="multi_img[new][]" multiple=""
                                            id="MultiImg1" class="form-control">
                                    </div>

                                </div>
                            </div>
                            {{-- 2222 --}}
                            <div class="col-lg-10">
                                <div class="viewMultiImage">
                                    <label for="fname">View Multiple Image </label>
                                    <div class="row" id="multiimageContainer">

                                    </div>
                                    <div class="row" id="preview_img1"></div>

                                </div>
                                <div class="text-center">
                                    <input type="text" id="product_id_for_edit_multi_image" name="product_id" hidden>

                                    <button type="submit" class="btn btn-success mt-2"
                                        style="text-align: center;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <hr class="hr">
            <form action="#" method="POST" id="Updateproduct" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="edit_products" name="edit_products">
                <input type="hidden" id="old_image" name="old_image">

                <div class="modal-body p-2 bg-light " style="margin-to: -37px">
                    <div class="row">
                        <div class="col-lg-2">
                            <label for="" class="mb-2">Thumbnail Image </label>
                            <div class="file-upload" style="height: 80px; width: 80px">
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' name="product_thambnail"
                                        onchange="readURL(this);" accept="image/*" height="80px" width="80px" />
                                    <img id="thumbnail_image" src="#" height="170px" alt="your image"
                                        style="height: 80px; width: 80px; margin-left: -10px; margin-top: -28px;" />
                                </div>

                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <a type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                                class="image-title">Uploaded Image</span>

                                        </a>
                                    </div>
                                </div>
                            </div>
                            <span id="error_thambnail_image" class="errorColor"></span>
                        </div>

                        <div class="col-lg-5"></div>
                        <div class="col-lg-5"></div>
                    </div>

                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Product Code </label>
                            <input type="text" name="product_stock_alert" class="form-control"
                                placeholder="Example:45,02456" id="product_code_edit" disabled="">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Supplier Name </label>
                            <select name="supplier_id" id="edit_supplier" class=" form-select form-control ">
                                <option value="" selected="" disabled="">Select Supplier Name
                                </option>
                                @foreach($supplier as $sup)
                                <option value="{{ $sup->id }}">
                                    {{ $sup->supplyer_name }}</option>
                                @endforeach
                            </select>
                            <span id="error_supplier_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Brand Name </label>
                            <select name="brand_id" id="edit_brand_name" class=" form-select form-control ">
                                <option value="" selected="" disabled="">Select Supplier Name
                                </option>

                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">
                                    {{ $brand->brand_name_cats_eye }}</option>
                                @endforeach
                            </select>
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Category </label>
                            <select name="category_id" id="edit_category" class=" form-select form-control ">
                                <option value="" selected="" disabled="">Select Category Name
                                </option>

                                @foreach($category as $cat)
                                <option value="{{ $cat->id }}">
                                    {{ $cat->category_name }}</option>
                                @endforeach
                            </select>
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>


                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Sub Category</label>
                            <select name="sub_category_id" id="edit_subcategory" class=" form-select form-control ">

                                <option value="" selected="" disabled="">Select Category Name
                                </option>

                                @foreach($subcategory as $subcat)
                                <option value="{{ $subcat->id }}">
                                    {{ $subcat->sub_category_name }}</option>
                                @endforeach
                            </select>
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Sub Sub Category </label>
                            <select name="sub_sub_category_id" id="edit_subsubcategory"
                                class=" form-select form-control ">
                                <option value="" selected="" disabled="">Select Category Name
                                </option>

                                @foreach($subsubcategory as $subsubcat)
                                <option value="{{ $subsubcat->id }}">
                                    {{ $subsubcat->subsubcategory_name }}</option>
                                @endforeach
                            </select>
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Product Name </label>
                            <input type="text" name="product_name" id="edit_product_name" class="form-control"
                                placeholder="Category Name">
                            <span id="product_error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Weight (gm / ml)<small
                                    style="color:#c2bebe; padding-left:10px;">(gm/ml)</small>
                            </label>
                            <input type="text" name="unit" id="edit_unit" class="form-control"
                                placeholder="Category Name">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Quantity</label>
                            <input type="text" name="product_qty" id="edit_product_qty" class="form-control qty1"
                                placeholder="Category Name">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Unit Price </label>
                            <input type="text" class="form-control unit_price1 check1" name="unit_price"
                                id="edit_unit_price" placeholder="product price per unit">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Purchase Date </label>
                            <input type="date" name="purchase_date" id="edit_purchase_date" class="form-control"
                                placeholder="Category Name">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Buying Price</label>
                            <input type="text" name="purchase_price" id="edit_purchase_price"
                                class="form-control totalprice1" placeholder="Example:45,02456">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Selling Price</label>
                            <input type="text" name="selling_price" id="edit_selling_price" class="form-control"
                                placeholder="Example:45,02456">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Discount Price </label>
                            <input type="text" name="discount_price" id="edit_discount_price" class="form-control"
                                placeholder="Example:45,02456">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Discount Start Date </label>
                            <input type="date" name="start_date" id="edit_start_date" class="form-control">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Discount Close Date </label>
                            <input type="date" name="end_date" id="edit_end_date" class="form-control"
                                placeholder="Example:45,02456">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Product Expire Date</label>
                            <input type="date" id="edit_basic-datepicker" class="form-control"
                                placeholder="Discount start" name="product_expire_date">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Color </label>

                            <select class="form-control select2" style="background-color: #1FB264"
                                id="select22insidemodal" data-toggle="select2" data-width="100%" multiple="multiple"
                                data-placeholder="Choose Color..." name="product_color[]">

                                <option value="Red" id="edit_color_red">Red</option>
                                <option value="Pink" id="edit_color_pink">Pink</option>
                                <option value="White" id="edit_color_white">White</option>
                                <option value="Blue" id="edit_color_blue">Blue</option>
                                <option value="Yellow" id="edit_color_yellow">Yellow</option>
                                <option value="Green" id="edit_color_green">Green</option>
                                <option value="Black" id="edit_color_black">Black</option>
                                <option value="Gray" id="Gray">Gray</option>
                                <option value="Olive" id="Olive">Olive</option>
                                <option value="Maroon" id="Maroon">Maroon</option>
                                <option value="Violet" id="Violet">Violet</option>
                                <option value="Charcoal" id="Charcoal">Charcoal</option>
                                <option value="Magenta" id="Magenta">Magenta</option>
                                <option value="Bronze" id="Bronze">Bronze</option>
                                <option value="Cream" id="Cream">Cream</option>
                                <option value="Ten" id="Ten">Ten</option>
                                <option value="Teal" id="Teal">Teal</option>

                                <option value="Mustard" id="Mustard">Mustard</option>
                                <option value="Navy Blue" id="Navy Blue">Navy Blue</option>
                                <option value="Coral" id="Coral">Coral</option>
                                <option value="Burgundy" id="Burgundy">Burgundy</option>
                                <option value="Lavender" id="Lavender">Lavender</option>

                                <option value="Mauve" id="Mauve">Mauve</option>
                                <option value="Peach" id="Peach">Peach</option>
                                <option value="Rust" id="Rust">Rust</option>
                                <option value="Gold" id="Gold">Gold</option>
                                <option value="Silver" id="Silver">Silver</option>
                                <option value="Cyan" id="Cyan">Cyan</option>
                            </select>


                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Size </label>
                            <select class="form-control select2" id="select232insidemodal" data-toggle="select2"
                                data-width="100%" multiple="multiple" data-placeholder="Choose Color..."
                                name="product_size[]">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="X">X</option>
                                <option value="XXL">XXL</option>
                                <option value="XXXL">XXXL</option>

                                <option>20</option>
                                <option>22</option>
                                <option>24</option>
                                <option>26</option>
                                <option>28</option>
                                <option>30</option>
                                <option>32</option>
                                <option>34</option>
                                <option>36</option>
                                <option>38</option>
                                <option>40</option>
                                <option>42</option>
                                <option>44</option>
                                <option>46</option>
                                <option>48</option>
                                <option>50</option>
                            </select>

                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Video </label>
                            <input type="text" name="video_link" id="edit_video_link" class="form-control"
                                placeholder="Example:45,02456">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Product Stock Alert </label>
                            <input type="text" name="product_stock_alert" id="product_stock_alert" class="form-control"
                                placeholder="Example:45,02456">
                            <span id="error_name" class="errorColor"></span>

                        </div>
                        <div class="col-lg-3">

                            <label for="fname">Product Expire Date Alert</label>

                            <select class="form-control" name="product_expire_alert_date"
                                id="product_expire_date_alert">
                                <option value="" selected="" disabled="">Select Expire Date
                                </option>
                                <option value="1" id="red">1day</option>
                                <option value="2" id="pink">2day</option>
                                <option value="3" id="white">3day</option>
                                <option value="4" id="blue">4day</option>
                                <option value="5" id="yellow">5day</option>
                                <option value="6" id="green">6day</option>
                                <option value="7" id="pink">1week</option>
                                <option value="14" id="white">2week</option>
                                <option value="21" id="blue">3week</option>
                                <option value="28" id="yellow">4week</option>
                                <option value="30" id="green">1month</option>
                                <option value="60" id="black">2month</option>
                                <option value="90" id="black">3month</option>
                                <option value="120" id="black">4month</option>
                                <option value="150" id="black">5month</option>
                                <option value="180" id="black">6month</option>

                            </select>

                            <span id="error_name" class="errorColor"></span>



                        </div>

                        <div class="col-lg-3">
                            <label for="fname">Vat</label>
                            <input type="text" id="vat" class="form-control" placeholder="Discount start" name="vat">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">SKU Code</label>
                            <input type="text" id="basic2-datepicker" class="form-control" placeholder="Discount start"
                                name="sku_code">
                            <span id="error_name" class="errorColor"></span>
                        </div>

                    </div>
                    
                    
                    
                         <div class="row">
                             <div class="col-lg-3">
                            <label for="fname">Supplier Product Code </label>
                            <input type="text" id="spc" class=" form-control" value="" name="supplier_product_code"
                                placeholder="#">
                            <span id="error_name" class="errorColor"></span>
                        </div> 
                        
                        
                         <div class="col-lg-3">
                          
                        </div> 
                        
                         <div class="col-lg-3">
                           
                        </div> 
                          <div class="col-lg-3">
                           
                        </div> 
                        
                    </div>
                    
                    
                    <div class="row my-3">
                        <div class="col-lg-7 forck">
                            <label for="fname">Add Description</label>
                            <textarea class=" form-control ckeditor ck" id="edit_product_descp"
                                name="product_descp"></textarea>
                            <span id="error_name" class="errorColor"></span>
                        </div>
                        <div class="col-lg-5">
                            <div class="row ">
                                <div class="col-lg-12">
                                    <label for="fname">Tag </label>
                                    <input type="text" class="selectize-close-btn form-control" id="edit_product_tags"
                                        value="" name="product_tags">
                                    <span id="error_name" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-lg-12">
                                    <label for="fname">Meta Title </label>
                                    <input type="text" name="meta_title" id="edit_meta_title" class="form-control"
                                        placeholder="Example:45,02456">
                                    <span id="error_name" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-lg-12">
                                    <label for="fname">Add Meta Description </label>
                                    <input type="text" name="meta_desc" id="edit_meta_desc" class="form-control"
                                        placeholder="Example:45,02456">
                                    <span id="error_name" class="errorColor"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">

                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 style="text-align: center;">All Deals</h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">Featured </label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="toggle">
                                                                        <input type="checkbox" id="edit_featured"
                                                                            name="featured">
                                                                        <span class="roundbutton"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">Hot Deals </label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="toggle">
                                                                        <input type="checkbox" id="edit_hot_deals"
                                                                            name="hot_deals">
                                                                        <span class="roundbutton"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">Special Offer </label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="toggle">
                                                                        <input type="checkbox" id="edit_special_offer"
                                                                            name="special_offer">
                                                                        <span class="roundbutton"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">Special Deal </label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="toggle">
                                                                        <input type="checkbox" id="edit_special_deals"
                                                                            name="special_deals">
                                                                        <span class="roundbutton"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <h3>Shipping</h3>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="fname">Free Shipping </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="toggle">
                                                        <input type="checkbox" id="edit_shipping" name="shipping">
                                                        <span class="roundbutton"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <h3>Delivery Details</h3>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="fname">Cash On Delivery</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="toggle">
                                                        <input type="checkbox" id="edit_cash_on_del"
                                                            name="cash_on_delivery">
                                                        <span class="roundbutton"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="fname"> Refundable </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="toggle">
                                                        <input type="checkbox" id="edit_refundable" name="refundable">
                                                        <span class="roundbutton"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- view start --}}
{{-- 2040 --}}


<div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true" style="padding: 50px;">
    <div class="modal-dialog modal-xl modal_scroll">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">View Product Details</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>



            <div class="modal-body p-2 bg-light " style="margin-to: -37px">
                <div class="design">
                    <div class="container">
                        <div class="row m-4">
                            <div class="col-lg-3">
                                <div class="viewMultiImage">
                                    <label for="fname">View Thumbnail Image </label>

                                    <div class="row" id="preview_img1"></div>

                                </div>
                                <div class="">
                                    <img id="thumbnail_image1" src="#" alt="your image" style=" width: 108px;" />
                                </div>
                            </div>
                            <div class="col-lg-9">

                                <div class="viewMultiImage">
                                    <label for="fname">View Multiple Image </label>
                                    <div class="row" id="multiimageContainer2" class="p-3">

                                    </div>
                                    <div class="row" id="preview_img1"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr class="hr">

                    <div class="row ">
                        <div class="col-lg-3">
                            <label for="fname">Product Code </label>
                            <p id="product_code_edit1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Supplier Name </label>
                            <p id="edit_supplier1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Brand Name </label>
                            <p id="edit_brand_name1"></p>

                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Category </label>
                            <p id="edit_category1"></p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Sub Category</label>
                            <p id="edit_subcategory1"></p>

                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Sub Sub Category </label>
                            <p id="edit_subsubcategory1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Product Name </label>
                            <p id="edit_product_name1"></p>

                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Weight (gm / ml)<small
                                    style="color:#c2bebe; padding-left:10px;">(gm/ml)</small>
                            </label>
                            <p id="edit_unit1"></p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Quantity</label>
                            <p id="edit_product_qty1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Unit Price </label>
                            <p id="edit_unit_price1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Purchase Date </label>
                            <p id="edit_purchase_date1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Buying Price</label>
                            <p id="edit_purchase_price1"></p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Selling Price</label>
                            <p id="edit_selling_price1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Discount Price </label>
                            <p id="edit_discount_price1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Discount Start Date </label>
                            <p id="edit_start_date1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Discount Close Date </label>
                            <p id="edit_end_date1"></p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Product Expire Date</label>
                            <p id="edit_basic-datepicker1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Color </label>
                            <p id="edit_product_color1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Size </label>
                            <p id="edit_product_size1"></p>

                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Video </label>
                            <p id="edit_video_link1"></p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3">
                            <label for="fname">Product Stock Alert </label>
                            <p id="product_stock_alert1"></p>

                        </div>
                        <div class="col-lg-3">

                            <label for="fname">Product Expire Date Alert</label>
                            <p id="product_expire_date_alert1"></p>

                        </div>

                        <div class="col-lg-3">
                            <label for="fname">Vat</label>
                            <p id="vat1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">SKU Code</label>
                            <p id="edit_sku_code1"></p>
                        </div>

                    </div>
                    <div class="row my-3">
                        <div class="col-lg-3 forck">
                            <label for="fname">Add Description</label>
                            <p id="edit_product_descp1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Tag </label>
                            <p id="edit_product_tags1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Meta Title </label>
                            <p id="edit_meta_title1"></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="fname">Add Meta Description </label>
                            <p id="edit_meta_desc1"></p>
                        </div>
                    </div>
                    {{-- <div class="row my-3">

                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 style="text-align: center;">All Deals</h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">Featured </label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="toggle">
                                                                        <input type="checkbox" id="edit_featured"
                                                                            name="featured">
                                                                        <span class="roundbutton"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">Hot Deals </label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="toggle">
                                                                        <input type="checkbox" id="edit_hot_deals"
                                                                            name="hot_deals">
                                                                        <span class="roundbutton"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">Special Offer </label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="toggle">
                                                                        <input type="checkbox" id="edit_special_offer"
                                                                            name="special_offer">
                                                                        <span class="roundbutton"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">Special Deal </label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label class="toggle">
                                                                        <input type="checkbox" id="edit_special_deals"
                                                                            name="special_deals">
                                                                        <span class="roundbutton"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <h3>Shipping</h3>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="fname">Free Shipping </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="toggle">
                                                        <input type="checkbox" id="edit_shipping" name="shipping">
                                                        <span class="roundbutton"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <h3>Delivery Details</h3>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="fname">Cash On Delivery</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="toggle">
                                                        <input type="checkbox" id="edit_cash_on_del"
                                                            name="cash_on_delivery">
                                                        <span class="roundbutton"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="fname"> Refundable </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="toggle">
                                                        <input type="checkbox" id="edit_refundable" name="refundable">
                                                        <span class="roundbutton"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div> --}}

                </div>


            </div>
        </div>
    </div>
    {{-- view end --}}
    {{-- end edit product --}}
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

    {{-- for auto subcategory start --}}
    <script>
        $(document).ready(function() {

        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: `/{{ config('fortify.guard') }}/product/subcategory/ajax/${category_id}`,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // sub sub category bug fix
                        //$('select[name="subsubcategory_id"]').html('');
                        var d = $('select[name="sub_category_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="sub_category_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .sub_category_name + '</option>');
                            // showSubSubCategory(value.id);
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

        // for sub sub category auto
        $('select[name="sub_category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: `/{{ config('fortify.guard') }}/product/subsubcategory/ajax/${category_id}`,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // sub sub category bug fix
                        //$('select[name="subsubcategory_id"]').html('');
                        var d = $('select[name="sub_sub_category_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="sub_sub_category_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subsubcategory_name + '</option>');
                            // showSubSubCategory(value.id);
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

    });

    </script>


    {{-- 2323 --}}
    <script>
        $("#qty").on('keyup', function() {

        var qty = $("#qty").val();
        console.log(qty);
        $("#new_purchase_qty").val(qty);
    });


    </script>


    <script>
        $(document).ready(function() {
        $("#select2insidemodal").select2({
            dropdownParent: $("#addProductModal")
        });
    });


    $(document).ready(function() {
        $("#select23insidemodal").select2({
            dropdownParent: $("#addProductModal")
        });
    });
     $(document).ready(function() {
        $("#select231insidemodal").select2({
            dropdownParent: $("#addProductModal")
        });
    });

    function productSize()
    {
        $("#select232insidemodal").select2({
            dropdownParent: $("#Updateproduct")
            // 2035
        });
    }

    function productColor()
    {
        $("#select22insidemodal").select2({
            dropdownParent: $("#Updateproduct")
            // 2035
        });

    }


    </script>

    {{-- for shipping start --}}
    <script>
        //         $('#ytube').click(function() {
    // 	var isSomethingTrue = true;

    //     if(isSomethingTrue){
    //     	  $("#labony").hide() ;
    //     }else{
    //     	 $("#labony").show() ;
    //     }
    // });

    </script>
    {{-- for shipping end --}}
    <script>
        //    for calculation
    $(".check").on('keyup', function() {
        var total = 0;
        var qty = $("#qty").val();
        var unit = $("#unit_price").val();
        var total = parseFloat(qty) * parseFloat(unit);
        $(".totalprice").val(total);
    });

    </script>



    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('product_descp', {
        height: '120px'
    });
    CKEDITOR.replaceClass('ck', {
        height: '120px'
    });
    //     $('.forck').each(function()
    //     {
    //          var __editorName = $(this).children('.ck').attr('id');
    //           CKEDITOR.replace( __editorName, { height: '120px' } );
    //    });

    </script>


    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // / for editing data using ajax
    $(document).on('click', '.editBtn', function() {
        console.log("worki");
        var product_id = $(this).attr('product_id');
        $('#editProductModal').modal('show');
        formData = [];

        $.ajax({
            type: "GET"
            , url: `/{{ config('fortify.guard') }}/product/edit/${product_id}`
            , success: function(response) {
                console.log(response);
                $('#edit_products').val(response.product_edit.id);
                $('#old_image').val(response.product_edit.product_thambnail);
                $('#edit_supplier').val(response.product_edit.supplier_id);
                $('#edit_brand_name').val(response.product_edit.brand_id);
                $('#edit_category').val(response.product_edit.category_id);
                $('#edit_subcategory').val(response.product_edit.sub_category_id);
                $('#edit_subsubcategory').val(response.product_edit.sub_sub_category_id);
                $('#edit_product_name').val(response.product_edit.product_name);
                $('#edit_unit').val(response.product_edit.unit);
                $('#edit_product_qty').val(response.product_edit.product_qty);
                $('#edit_unit_price').val(response.product_edit.unit_price);
                $('#edit_purchase_date').val(response.product_edit.purchase_date);
                $('#edit_purchase_price').val(response.product_edit.purchase_price);
                $('#edit_selling_price').val(response.product_edit.selling_price);
                $('#edit_discount_price').val(response.product_edit.discount_price);
                $('#edit_start_date').val(response.product_edit.start_date);
                $('#edit_end_date').val(response.product_edit.end_date);
                $('#edit_basic-datepicker').val(response.product_edit.product_expire_date);
                $('#edit_product_color').val(response.product_edit.product_color);
                $('#edit_product_size').val(response.product_edit.product_size);
                $('#product_stock_alert').val(response.product_edit.product_stock_alert);
                $('#product_expire_date_alert').val(response.product_edit.product_expire_alert_date);
                $('#vat').val(response.product_edit.vat);

                $('#edit_video_link').val(response.product_edit.video_link);
                $('#edit_product_stock_alert').val(response.product_edit.product_stock_alert);
                CKEDITOR.instances['edit_product_descp'].setData(response.product_edit.product_descp);
                $('#edit_product_tags').val(response.product_edit.product_tags);

                $('#product_code_edit').val(response.product_edit.product_code);
                $('#edit_meta_title').val(response.product_edit.meta_title);
                $('#edit_meta_desc').val(response.product_edit.meta_desc);

                $('#spc').val(response.product_edit.supplier_product_code);
                
                // $('#edit_hot_deals').val(response.product_edit.hot_deals);
                // $('#edit_special_offer').val(response.product_edit.special_offer);
                // $('#edit_special_deals').val(response.product_edit.special_deals);
                $('#edit_shipping_fee').val(response.product_edit.shipping_fee);
                $('#thumbnail_image').attr('src', `/${response.product_edit.product_thambnail}`);
                setToggleValue(response.product_edit.cash_on_delivery, 'edit_cash_on_del');
                setToggleValue(response.product_edit.special_deals, 'edit_special_deals');
                setToggleValue(response.product_edit.special_offer, 'edit_special_offer');
                setToggleValue(response.product_edit.hot_deals, 'edit_hot_deals');
                setToggleValue(response.product_edit.featured, 'edit_featured');
                setToggleValue(response.product_edit.shipping, 'edit_shipping');
                setToggleValue(response.product_edit.refundable, 'edit_refundable');

                var colorArray;

                if(response.product_edit.product_color != null)
                {
                    colorArray = response.product_edit.product_color.split(',');
                    colorSelect = document.getElementById('select22insidemodal').children;

                    for(let i=0; i<colorSelect.length; i++){

                        colorSelect[i].selected = false;

                    }


                    for(let i=0; i<colorSelect.length; i++){
                        // console.log('here');
                        colorArray.forEach(element => {
                            if(element === colorSelect[i].value){
                                colorSelect[i].selected = true;
                                console.log(colorSelect[i]);
                            }

                        })

                    }
                }

                // console.log(response.product_edit.product_color);
                // console.log(colorArray);


                var sizeArray;

                if(response.product_edit.product_size != null)
                {
                    sizeArray = response.product_edit.product_size.split(',');
                    tagSelect = document.getElementById('select232insidemodal').children;

                    for(let i=0; i<tagSelect.length; i++){

                        tagSelect[i].selected = false;

                    }


                    for(let i=0; i<tagSelect.length; i++){
                        // console.log('here');
                        sizeArray.forEach(element => {
                            if(element === tagSelect[i].value){
                                tagSelect[i].selected = true;
                                console.log(tagSelect[i]);
                            }

                        })

                    }

                }
                // console.log(response.product_edit.product_color);
                // console.log(sizeArray);
                productSize();
                productColor();
                console.log(response.multiimgs);
                $('#product_id_for_edit_multi_image').val(response.product_edit.id);
// 1111
                $('#multiimageContainer').empty();
                // console.log(response.multiimgs);
                $.each( response.multiimgs, function( key, value ) {
                    console.log('here in multiimage');
                    var s =`<div class="col-lg-3" style=" margin-right:-42px; padding-left:18px">
                            <img src="/${value.photo_name}" alt="" id="image${value.id}"  style="width: 108px">

                                <div class="row">

                                    <div class="col-lg-6 m-0 p-0">

                                        <input type="file" onchange="readURLImage(this);" data-image="${value.id}" class="form-control"
                                        style="margin-left: 11px; height: 22px;width: 65px  !important;padding: 0px;font-size: 12px; margin-top: 2px;"" name="multi_img[${value.id }]"/>
                                    </div>

                                    <div class="col-lg-6 m-0 p-0">
                                            <a href="/{{ config('fortify.guard') }}/product/multiimg/delete/${value.id}"
                                            class="btn btn-danger" style="height: 20px;width: 40px;padding: 0px;font-size: 12px;margin-left:-4px;">Delete</a>
                                    </div>
                                </div>
                        </div>
                        `;
                    $('#multiimageContainer').append(s);

                });


            }
        })
    });
// 2060


    function readURLImage(input) {

        var id =$(input).attr("data-image");

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(`#image${id}`).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function setToggleValue(value, id) {
        if (value == 1) {
            var element = document.getElementById(id);
            element.setAttribute("checked", true);
        }
    }


    // product update
    // for update
    $(document).on('submit', '#Updateproduct', function(e) {
        e.preventDefault();
        let formData = new FormData($('#Updateproduct')[0]);
        console.log('hjhnfdvvvdfvf');
        $.ajax({
            type: "POST"
            , url: `/{{ config('fortify.guard') }}/product/update`
            , data: formData
            , contentType: false
            , processData: false
            , success: function(response) {
                if (response.status == 400) {
                    // $('#error_weight').text(response.errors.unit);
                    // $('#error_category').text(response.errors.category_id);
                    // $('#error_thambnail_image').text(response.errors.product_thambnail);
                    // $('#error_subcategory').text(response.errors.subcategory_id);
                    $('#product_error_name').text(response.errors.product_name);
                    // 2025

                } else if (response.status == 200) {
                    $('#editProductModal').modal('hide');
                    location.reload();
                    toastr.success(response.message);
                }
            }
        });
    });

    </script>
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // for adding data using ajax

    $(document).on('submit', '#add_product_form', function(e) {
        e.preventDefault();
        let formData = new FormData($('#add_product_form')[0]);

        $.ajax({
            type: "POST"
            , url: `/{{ config('fortify.guard') }}/product/store`
            , data: formData
            , contentType: false
            , processData: false
            , success: function(response) {
                console.log(response);
                if (response.status == 400) {
                    // $('#error_weight').text(response.errors.unit);
                    // $('#error_category').text(response.errors.category_id);
                    // $('#error_thambnail_image').text(response.errors.product_thambnail);
                    // $('#error_subcategory').text(response.errors.sub_category_id);
                    $('#error_productname').text(response.errors.product_name);
                    // 2025

                } else if (response.status == 200) {
                    console.log('okkkkkkkkkkkkkkkkkk');
                    $('#addProductModal').modal('hide');
                    location.reload();
                    toastr.success(response.message);
                }
            }
        });
    });
// 2030
    // for product details view
       $(document).on('click', '.viewBtn', function() {
        //   e.preventDefault();
        var productview_id = $(this).attr('productview_id');
        console.log(productview_id);
        $('#viewProductModal').modal('show');
        $('#multiimageContainer2').html("");
        $('#thumbnail_image1').attr('src', `./`);
        $('#edit_product_qty1').text('');
        // baki ache

        $.ajax({
            type: "GET"
            , url: `/{{ config('fortify.guard') }}/product/details/view/${productview_id}`
            , success: function(response) {
                console.log(response);
                console.log(response.product_edit.product_name);
                $('#edit_products').val(response.product_edit.id);
                $('#old_image').val(response.product_edit.product_thambnail);
                $('#edit_subsubcategory1').text(response.product_edit.subsubcategory.subsubcategory_name);
                $('#edit_product_name1').text(response.product_edit.product_name);
                $('#edit_unit1').text(response.product_edit.unit);
                $('#edit_product_qty1').text(response.product_edit.product_qty);
                $('#edit_unit_price1').text(response.product_edit.unit_price);
                $('#edit_purchase_date1').text(response.product_edit.purchase_date);
                $('#edit_purchase_price1').text(response.product_edit.purchase_price);
                $('#edit_selling_price1').text(response.product_edit.selling_price);
                $('#edit_discount_price1').text(response.product_edit.discount_price);
                $('#edit_start_date1').text(response.product_edit.start_date);
                $('#edit_end_date1').text(response.product_edit.end_date);
                $('#edit_basic-datepicker1').text(response.product_edit.product_expire_date);
                $('#edit_product_color1').text(response.product_edit.product_color);
                $('#edit_product_size1').text(response.product_edit.product_size);
                 $('#edit_sku_code1').text(response.product_edit.sku_code);
                $('#product_stock_alert1').text(response.product_edit.product_stock_alert);
                $('#product_expire_date_alert1').text(response.product_edit.product_expire_alert_date);
                $('#vat1').text(response.product_edit.vat);
                $('#edit_video_link1').text(response.product_edit.video_link);
                $('#edit_product_stock_alert1').text(response.product_edit.product_stock_alert);
                 $('#edit_product_descp1').html(response.product_edit.product_descp);
                // CKEDITOR.instances['edit_product_descp'].setData(response.product_edit.product_descp);
                $('#edit_product_tags1').text(response.product_edit.product_tags);
                // console.log(response.product_edit.product_tags);
                $('#product_code_edit1').text(response.product_edit.product_code);
                $('#edit_meta_title1').text(response.product_edit.meta_title);
                $('#edit_meta_desc1').text(response.product_edit.meta_desc);
                $('#edit_featured').val(response.product_edit.featured);
                $('#edit_hot_deals').val(response.product_edit.hot_deals);
                $('#edit_special_offer').val(response.product_edit.special_offer);
                $('#edit_special_deals').val(response.product_edit.special_deals);
                $('#edit_shipping_fee').val(response.product_edit.shipping_fee);
                $('#thumbnail_image1').attr('src', `/${response.product_edit.product_thambnail}`);
                // $('#edit_supplier1').text(response.product_edit.supplier.supplyer_name? response.product_edit.supplier.supplyer_name:'');
                // $('#edit_brand_name1').text(response.product_edit.brand.brand_name_cats_eye?response.product_edit.brand.brand_name_cats_eye:'');
                // $('#edit_category1').text(response.product_edit.category.category_name?response.product_edit.category.category_name:'');
                // $('#edit_subcategory1').text(response.product_edit.subcategory.sub_category_name?response.product_edit.subcategory.sub_category_name:'');
                $('#edit_supplier1').text(response?.product_edit?.supplier?.supplyer_name);
                $('#edit_brand_name1').text(response?.product_edit?.brand?.brand_name_cats_eye);
                $('#edit_category1').text(response?.product_edit?.category?.category_name);
                $('#edit_subcategory1').text(response?.product_edit?.subcategory?.sub_category_name);
// 1111
               // multi img
                // console.log(response.multiimgs);
                $.each( response.multiimgs, function( key, value ) {
                    console.log('here in multiimage');
                    var s =`
                    <div class="col-lg-3" style=" margin-right:-80px;margin-bottom:5px;">
                            <img src="/${value.photo_name}" alt="" id="image${value.id}"  style="width:80px;margin-right:60px !important;">
                        </div>
                        `;
                    $('#multiimageContainer2').append(s);
                });

            }

        })
    });

    </script>

    {{-- selling discount price start --}}
    <script>
        var myTextBox = document.getElementById('myTextBox').val();

    function checkInput() {
        var myTextBox = document.getElementById("myTextBox").value;
        var value = document.getElementById('selling').value;
        if (parseFloat(myTextBox) >= parseFloat(value)) {
            document.getElementById("invalid").innerHTML = 'discount price can not be bigger or equal than selling price';
        } else {
            document.getElementById("invalid").innerHTML = '';
        }
    }

    </script>
    {{-- selling discount price end --}}

    {{-- barcode start --}}
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
    {{-- // Img Tham script --}}
    <script type="text/javascript">
        function mainThamUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.mainThmb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    </script>
    {{-- ---------------------------Show Multi Image JavaScript Code ------------------------ --}}
    <script>
        $(document).ready(function() {
        $('#MultiImg').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window
                .Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src'
                                        , e.target.result).width(80)
                                    .height(80); //create image element
                                $('#preview_img').append(
                                    img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });

    </script>
    {{-- ---------------------------Show Multi Image JavaScript Code For Edit------------------------ --}}
    <script>
        $(document).ready(function() {
        $('#MultiImg1').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window
                .Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src'
                                        , e.target.result).width(80)
                                    .height(80); //create image element
                                $('#preview_img1').append(
                                    img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });

    </script>

    {{-- for toggle switch start --}}
    <script>
        var input = document.getElementById('toggleswitch');
    var outputtext = document.getElementById('status');
    input.addEventListener('change', function() {
        if (this.checked) {
            input.innerHTML = "1";
        } else {
            input.innerHTML = "0";
        }
    });

    </script>


    <script>
        function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });

    </script>
    <script>
        //    for calculation edit 2080
        $(".check1").on('keyup', function() {
            var unit1="";
            var qty1="";
            var total1 = 0;
            var qty1 = $(".qty1").val();
            var unit1= $(".unit_price1").val();
            var total1 = parseFloat(qty1) * parseFloat(unit1);
            $(".totalprice1").val(total1);
        });
    </script>



    {{-- <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> --}}



    <script src="{{ asset('backend/assets') }}/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/multiselect/js/jquery.multi-select.js"></script>

    <script src="{{ asset('backend/assets') }}/libs/select2/js/select2.min.js"></script>

    <script src="{{ asset('backend/assets') }}/libs/dropzone/min/dropzone.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/dropify/js/dropify.min.js"></script>
    <script src="{{ asset('backend/assets') }}/js/pages/form-fileuploads.init.js"></script>

    <script src="{{ asset('backend/assets') }}/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <!-- Init js-->
    <script src="{{ asset('backend/assets') }}/js/pages/form-advanced.init.js"></script>
    <script src="{{ asset('backend/assets') }}/js/pages/form-masks.init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>

    {{-- ager --}}



    @endsection
