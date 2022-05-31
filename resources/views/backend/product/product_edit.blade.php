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

    body {
        font-family: sans-serif;
        background-color: #f3f7f9;
    }

    .cc {
        padding: 0px;

    }

    .allimg {
        padding-right: 0 !important;
    }
</style>
@endsection
@section('main-content')
<div class="content"></div>

<!-- Start Content-->
<div class="container-fluid">
    <!-- multiple image form start -->

    <!-- ///////////////// Start Multiple Image Update Area ///////// -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                    </div>
                    <form method="post" action="{{ route('role.update_product_img', config('fortify.guard')) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm m-0 p-0">
                            <div class="col-lg-3 p-0">
                                {{-- <div class="mb-3 row m-0 p-0">
                                    <div class="col-md-10 m-0 p-0"> --}}
                                        <div class="card p-0 cc">
                                            <div class="card-body">
                                                <div class="row m-0 p-0">
                                                    <label class="col-lg-12 col-form-label">
                                                        <h4>Multi Image(1024px * 1024px)</h4>
                                                    </label>
                                                </div>
                                                <div class="row m-0 p-0">
                                                    <div class="col-lg-12">
                                                        <input type="file" name="multi_img[new][]" multiple=""
                                                            id="MultiImg" class="form-control">
                                                        <p>
                                                        </p>
                                                        <div class="row mb-1" id="preview_img"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <div class="col-lg-9 m-0  p-0" style="margin-left: 25px;">
                                <div class="row  p-0 allimg">
                                    @foreach ($multiimgs as $img)
                                    <div class="col-lg-2">
                                        <div class="card">

                                            <div class="img row " style="text-align: center;">
                                                <div class="col-12">
                                                    <img src="{{ asset($img->photo_name) }}" class="card-img-top"
                                                        style="height: 150px; width: 100%;">
                                                </div>
                                            </div>

                                            <div class="row" style="margin-top: 5px">
                                                <div class="col-8">
                                                    <input class="form-control" type="file" style="width: 100%"
                                                        name="multi_img[{{ $img->id }}]">
                                                </div>
                                                <div class="col-4">
                                                    <a href="{{ route('role.product.multiimg.delete', [config('fortify.guard'), $img->id]) }}"
                                                        style="width: 100%; margin-left :" class="btn btn-sm btn-danger"
                                                        id="#" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div><!--  end col md 3 -->
                            <input type="text" name="product_id" hidden value="{{ $products->id }}">
                        </div>
                        <br>
                        <br>
                        {{-- @endif --}}
                        <div class="text-xs-right" style="margin-bottom: -60px;margin-top: -50px;margin-left: 10px;">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- // end row  -->
    </section>
    {{-- multiple img form end --}}

</div>
<hr class="hr">
<form action="{{ route('role.product_update', config('fortify.guard')) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $products->id }}">
    <input type="hidden" name="old_image1" value="{{ $products->product_gallery_image }}">
    <input type="hidden" name="old_image2" value="{{ $products->product_thambnail }}">

    <div class="container-fluid" style="margin-to: -37px">
        <div class="row" style="">
            <div class="col-lg-4">
                <label class=" col-form-label">
                    Thumbnail Image (400px * 400px)
                </label>
                <div class="col-sm-8">
                    <img src="{{ asset($products->product_thambnail) }}" class="card-img-top"
                        style="height: 80px; width: 110px;">
                    <div class="fdf" style="width: 110px">
                        <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)">
                    </div>
                </div>
            </div>
            <div class="col-lg-4" style="margin-top: 48px; margin-left: -350px">
                <img src="" id="mainThmb">
            </div>
        </div>

        <div class="row" style="">
            <div class="col-lg-3">
                <label for="fname">Product Code </label>
                <input type="text" class="form-control" placeholder="Example:45,02456" id="product_code_edit"
                    disabled="">
                <span id="error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Supplier Name </label>
                <select name="supplier_id" id="edit_supplier" class=" form-select form-control ">
                    <option value="" selected="" disabled="">Select Supplier Name
                    </option>
                    @foreach($supplier as $sup)
                    <option value="{{ $sup->id }}" {{ $sup->id == $products->supplier_id ? 'selected' :'' }}>
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
                    <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected' : '' }}>
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
                    @foreach ($category as $categorys)
                    <option value="{{ $categorys->id }}" {{ $categorys->id == $products->category_id ? 'selected' :
                        '' }}>
                        {{ $categorys->category_name }}</option>
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

                    @foreach ($subcategory as $subcategorys)
                    <option value="{{ $subcategorys->id }}" {{ $subcategorys->id == $products->sub_category_id ?
                        'selected' : '' }}>
                        {{ $subcategorys->sub_category_name }}</option>
                    @endforeach
                </select>
                <span id="error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Sub Sub Category </label>
                <select name="sub_sub_category_id" id="edit_subsubcategory" class=" form-select form-control ">
                    <option value="" selected="" disabled="">Select Category Name
                    </option>

                    @foreach($subsubcategory as $subsubcat)
                    <option value="{{ $subsubcat->id }}" {{ $subsubcat->id == $products->sub_sub_category_id ?
                        'selected' : '' }}>
                        {{ $subsubcat->subsubcategory_name }}</option>
                    @endforeach
                </select>
                <span id="error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Product Name </label>
                <input type="text" name="product_name" id="edit_product_name" class="form-control"
                    value="{{ $products->product_name }}" placeholder="Category Name">
                <span id="product_error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Weight (gm / ml)<small style="color:#c2bebe; padding-left:10px;">(gm/ml)</small>
                </label>
                <input type="text" name="unit" id="edit_unit" class="form-control" placeholder="Category Name"
                    value="{{ $products->unit }}">
                <span id=" error_name" class="errorColor"></span>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-3">
                <label for="fname">Quantity</label>
                <input type="text" name="product_qty" id="edit_product_qty" class="form-control qty1"
                    placeholder="Category Name" value="{{ $products->product_qty }}">
                <span id=" error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Unit Price </label>
                <input type="text" class="form-control unit_price1 check1" name="unit_price" id="edit_unit_price"
                    placeholder="product price per unit" value="{{ $products->unit_price }}">
                <span id=" error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Purchase Date </label>
                <input type="date" name="purchase_date" id="edit_purchase_date" class="form-control"
                    placeholder="Category Name" value="{{ $products->purchase_date }}">
                <span id=" error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Buying Price</label>
                <input type="text" name="purchase_price" id="edit_purchase_price" class="form-control totalprice1"
                    placeholder="0.00" value="{{ $products->purchase_price }}">
                <span id=" error_name" class="errorColor"></span>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-3">
                <label for="fname">Selling Price</label>
                <input type="text" name="selling_price"  class="form-control selling1"
                    placeholder="0.00" value="{{ $products->selling_price }}">
                <span id=" error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Discount Price </label>
                <input type="text" name="discount_price"  class="form-control myTextBox1"
                    placeholder="0.00" onKeyUp="checkInput1()" value="{{ $products->discount_price }}">
                <div id="invalid1" style="color: red;">
                </div>
                <span id="error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Discount Start Date </label>
                <input type="date" name="start_date" id="edit_start_date" class="form-control"
                    value="{{ $products->start_date }}">
                <span id=" error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Discount Close Date </label>
                <input type="date" name="end_date" id="edit_end_date" class="form-control"
                    placeholder="Example:45,02456" value="{{ $products->end_date }}">
                <span id=" error_name" class="errorColor"></span>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-3">
                <label for="fname">Product Expire Date</label>
                <input type="date" id="edit_basic-datepicker" class="form-control" placeholder="Discount start"
                    name="product_expire_date" value="{{ $products->product_expire_date }} ">
                <span id=" error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Color </label>

                @php
                $colorArray = explode(",",$products->product_color);
                @endphp

                {{-- <select class="form-control select2" style="background-color: #1FB264" id="select22insidemodal"
                    data-toggle="select2" data-width="100%" multiple="multiple" data-placeholder="Choose Color..."
                    name="product_color[]" value="{{ $products->product_color }}"> --}}
                    <select class="form-control select2" data-toggle="select2" data-width="100%" multiple="multiple"
                        data-placeholder="Choose Color..." name="product_color[]">

                        <option value="Red" {{ in_array('Red',$colorArray)? 'selected' :'' }} id="edit_color_red">
                            Red</option>
                        <option value="Pink" {{ in_array('Pink',$colorArray)? 'selected' :'' }} id="edit_color_pink">
                            Pink</option>
                        <option value="White" {{ in_array('White',$colorArray)? 'selected' :'' }} id="edit_color_white">
                            White</option>
                        <option value="Blue" {{ in_array('Blue',$colorArray)? 'selected' :'' }} id="edit_color_blue">
                            Blue</option>
                        <option value="Yellow" {{ in_array('Yellow',$colorArray)? 'selected' :'' }}
                            id="edit_color_yellow">Yellow</option>
                        <option value="Green" id="edit_color_green" {{ in_array('Green',$colorArray)? 'selected' :'' }}>
                            Green</option>
                        <option value="Black" id="edit_color_black" {{ in_array('Black',$colorArray)? 'selected' :'' }}>
                            Black</option>
                            
                            
                            
   <option value="Brown" id="edit_color_brown" {{ in_array('Brown',$colorArray)? 'selected' :'' }}>Brown</option>   
      <option value="Purple" id="edit_color_purple" {{ in_array('Purple',$colorArray)? 'selected' :'' }}>Purple</option>   
        <option value="Dark Blue" id="edit_color_dark_blue" {{ in_array('Dark Blue',$colorArray)? 'selected' :'' }}>Dark Blue</option>   
           <option value="Off white" id="edit_color_off_white" {{ in_array('Off white',$colorArray)? 'selected' :'' }}>Off white</option>   
              <option value="Dark Coffee" id="edit_color_dark_coffee" {{ in_array('Dark Coffee',$colorArray)? 'selected' :'' }}>Dark Coffee</option>   
                 <option value="Dark Green" id="edit_color_dark_green" {{ in_array('Dark Green',$colorArray)? 'selected' :'' }}>Dark Green</option>   
                    <option value="Dark Red" id="edit_color_dark_red" {{ in_array('Dark Red',$colorArray)? 'selected' :'' }}>Dark Red</option>   
                    <option value="Dark Marron" id="edit_color_dark_marron" {{ in_array('Dark Marron',$colorArray)? 'selected' :'' }}>Dark Marron</option>   
                            

                            
                        <option value="Gray" id="Gray" {{ in_array('Gray',$colorArray)? 'selected' :'' }}>Gray
                        </option>
                        <option value="Olive" id="Olive" {{ in_array('Olive',$colorArray)? 'selected' :'' }}>Olive
                        </option>
                        <option value="Maroon" id="Maroon" {{ in_array('Maroon',$colorArray)? 'selected' :'' }}>
                            Maroon</option>
                        <option value="Violet" id="Violet" {{ in_array('Violet',$colorArray)? 'selected' :'' }}>
                            Violet</option>
                        <option value="Charcoal" id="Charcoal" {{ in_array('Charcoal',$colorArray)? 'selected' :'' }}>
                            Charcoal</option>
                        <option value="Magenta" id="Magenta" {{ in_array('Magenta',$colorArray)? 'selected' :'' }}>
                            Magenta</option>
                        <option value="Bronze" id="Bronze" {{ in_array('Bronze',$colorArray)? 'selected' :'' }}>
                            Bronze</option>
                        <option value="Cream" id="Cream" {{ in_array('Cream',$colorArray)? 'selected' :'' }}>Cream
                        </option>
                        <option value="Ten" id="Ten" {{ in_array('Ten',$colorArray)? 'selected' :'' }}>Ten</option>
                        <option value="Teal" id="Teal" {{ in_array('Teal',$colorArray)? 'selected' :'' }}>Teal
                        </option>

                        <option value="Mustard" id="Mustard" {{ in_array('Mustard',$colorArray)? 'selected' :'' }}>
                            Mustard</option>
                        <option value="Navy Blue" id="Navy Blue" {{ in_array('Navy Blue',$colorArray)? 'selected' :''
                            }}>Navy Blue</option>
                        <option value="Coral" id="Coral" {{ in_array('Coral',$colorArray)? 'selected' :'' }}>Coral
                        </option>
                        <option value="Burgundy" id="Burgundy" {{ in_array('Burgundy',$colorArray)? 'selected' :'' }}>
                            Burgundy</option>
                        <option value="Lavender" id="Lavender" {{ in_array('Lavender',$colorArray)? 'selected' :'' }}>
                            Lavender</option>

                        <option value="Mauve" id="Mauve" {{ in_array('Mauve',$colorArray)? 'selected' :'' }}>Mauve
                        </option>
                        <option value="Peach" id="Peach" {{ in_array('Peach',$colorArray)? 'selected' :'' }}>Peach
                        </option>
                        <option value="Rust" id="Rust" {{ in_array('Rust',$colorArray)? 'selected' :'' }}>Rust
                        </option>
                        <option value="Gold" id="Gold" {{ in_array('Gold',$colorArray)? 'selected' :'' }}>Gold
                        </option>
                        <option value="Silver" id="Silver" {{ in_array('Silver',$colorArray)? 'selected' :'' }}>
                            Silver</option>
                        <option value="Cyan" id="Cyan" {{ in_array('Cyan',$colorArray)? 'selected' :'' }}>Cyan
                        </option>
                    </select>


                    <span id="error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Size </label>
                @php
                $sizeArray = explode(",",$products->product_size);
                @endphp
                <select class="form-control select2" id="select232insidemodal" data-toggle="select2" data-width="100%"
                    multiple="multiple" data-placeholder="Choose Color..." name="product_size[]">
                    <option value="S" {{ in_array('S',$sizeArray)? 'selected' :'' }}>S</option>
                    <option value="M" {{ in_array('M',$sizeArray)? 'selected' :'' }}>M</option>
                    <option value="L" {{ in_array('L',$sizeArray)? 'selected' :'' }}>L</option>
                    <option value="X" {{ in_array('X',$sizeArray)? 'selected' :'' }}>X</option>
                    <option value="XXL" {{ in_array('XXL',$sizeArray)? 'selected' :'' }}>XXL</option>
                    <option value="XXXL" {{ in_array('XXXL',$sizeArray)? 'selected' :'' }}>XXXL</option>

                    <option value="20" {{ in_array('20',$sizeArray)? 'selected' :'' }}>20</option>
                    <option value="22" {{ in_array('22',$sizeArray)? 'selected' :'' }}>22</option>
                    <option value="24" {{ in_array('24',$sizeArray)? 'selected' :'' }}>24</option>
                    <option value="26" {{ in_array('26',$sizeArray)? 'selected' :'' }}>26</option>
                    <option value="28" {{ in_array('28',$sizeArray)? 'selected' :'' }}>28</option>
                    <option value="30" {{ in_array('30',$sizeArray)? 'selected' :'' }}>30</option>
                    <option value="32" {{ in_array('32',$sizeArray)? 'selected' :'' }}>32</option>
                    <option value="34" {{ in_array('34',$sizeArray)? 'selected' :'' }}>34</option>
                    <option value="36" {{ in_array('36',$sizeArray)? 'selected' :'' }}> 36</option>
                    <option value="38" {{ in_array('38',$sizeArray)? 'selected' :'' }}>38</option>
                    <option value="40" {{ in_array('40',$sizeArray)? 'selected' :'' }}>40</option>
                    <option value="42" {{ in_array('42',$sizeArray)? 'selected' :'' }}>42</option>
                    <option value="44" {{ in_array('44',$sizeArray)? 'selected' :'' }}>44</option>
                    <option value="46" {{ in_array('46',$sizeArray)? 'selected' :'' }}>46</option>
                    <option value="48" {{ in_array('48',$sizeArray)? 'selected' :'' }}>48</option>
                    <option value="50" {{ in_array('50',$sizeArray)? 'selected' :'' }}>50</option>
                </select>

                <span id="error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">Video </label>
                <input type="text" name="video_link" id="edit_video_link" class="form-control"
                    placeholder="Example:45,02456" value="{{ $products->video_link }}">
                <span id="error_name" class="errorColor"></span>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-3">
                <label for="fname">Product Stock Alert </label>
                <input type="text" name="product_stock_alert" id="product_stock_alert" class="form-control"
                    placeholder="Example:45,02456" value="{{ $products->product_stock_alert }}">
                <span id="error_name" class="errorColor"></span>

            </div>
            <div class="col-lg-3">

                <label for="fname">Product Expire Date Alert</label>

                <select class="form-control" name="product_expire_alert_date" id="product_expire_date_alert">
                    <option value="" selected="" disabled="" value="{{ $products->product_expire_alert_date }}">
                        Select
                        Expire Date
                    </option>
                    <option value="1" {{ '1'==$products->product_expire_alert_date ?
                        'selected' : '' }} >1day</option>
                    <option value="2" {{ '2'==$products->product_expire_alert_date ?
                        'selected' : '' }} >2day</option>
                    <option value="3" {{ '3'==$products->product_expire_alert_date ?
                        'selected' : '' }}>3day</option>
                    <option value="4" {{ '4'==$products->product_expire_alert_date ?
                        'selected' : '' }}>4day</option>
                    <option value="5" {{ '5'==$products->product_expire_alert_date ?
                        'selected' : '' }}>5day</option>
                    <option value="6" {{ '6'==$products->product_expire_alert_date ?
                        'selected' : '' }}>6day</option>
                    <option value="7" {{ '7'==$products->product_expire_alert_date ?
                        'selected' : '' }}>1week</option>
                    <option value="14" {{ '14'==$products->product_expire_alert_date ?
                        'selected' : '' }}>2week</option>
                    <option value="21" {{ '21'==$products->product_expire_alert_date ?
                        'selected' : '' }}>3week</option>
                    <option value="28" {{ '28'==$products->product_expire_alert_date ?
                        'selected' : '' }}>4week</option>
                    <option value="30" {{ '30'==$products->product_expire_alert_date ?
                        'selected' : '' }}>1month</option>
                    <option value="60" {{ '60'==$products->product_expire_alert_date ?
                        'selected' : '' }}>2month</option>
                    <option value="90" {{ '90'==$products->product_expire_alert_date ?
                        'selected' : '' }}>3month</option>
                    <option value="120" {{ '120'==$products->product_expire_alert_date ?
                        'selected' : '' }}>4month</option>
                    <option value="150" {{ '150'==$products->product_expire_alert_date ?
                        'selected' : '' }}>5month</option>
                    <option value="180" {{ '180'==$products->product_expire_alert_date ?
                        'selected' : '' }}>6month</option>
                </select>

                <span id="error_name" class="errorColor"></span>
            </div>

            <div class="col-lg-3">
                <label for="fname">Vat</label>
                <input type="text" id="vat" class="form-control" placeholder="Discount start" name="vat"
                    value="{{ $products->vat }}">
                <span id="error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-3">
                <label for="fname">SKU Code</label>
                <input type="text" id="basic2-datepicker" class="form-control" placeholder="Discount start"
                    name="sku_code" value="{{ $products->sku_code }}">
                <span id="error_name" class="errorColor"></span>
            </div>

        </div>
        <div class="row my-3">
            <div class="col-lg-7 forck">
                <label for="fname">Add Description</label>
                <textarea class=" form-control ckeditor ck" id="edit_product_descp"
                    name="product_descp">{!! $products->product_descp !!}</textarea>
                <span id="error_name" class="errorColor"></span>
            </div>
            <div class="col-lg-5">
                <div class="row ">
                    <div class="col-lg-12">
                        <label for="fname">Tag </label>
                        <div class="col-sm-10">
                            <input type="text" class="selectize-close-btn form-control" name="product_tags" value={{
                                $products->product_tags }}
                            >
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-12">
                            <label for="fname">Meta Title </label>
                            <input type="text" name="meta_title" id="edit_meta_title" class="form-control"
                                placeholder="Example:45,02456" value="{{ $products->meta_title }}">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-12">
                            <label for="fname">Add Meta Description </label>
                            <input type="text" name="meta_desc" id="edit_meta_desc" class="form-control"
                                placeholder="Example:45,02456" value="{{$products->meta_desc }}">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-1"></div>

                <div class="col-lg-9">

                    <div class="row m-0 p-0">
                        <div class="col-lg-6">
                            <h3 style="text-align: center;">All Deals</h3>
                            <div class="row m-0 p-0">
                                <div class="col-lg-6">
                                    <div class="row m-0 p-0">
                                        <div class="col-lg-12">
                                            <div class="row m-0 p-0">
                                                <div class="col-lg-4">
                                                    <div class="row m-0 p-0">
                                                        <div class="col-lg-6">
                                                            <label for="fname">Featured </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="toggle">
                                                                <input type="checkbox" id="edit_featured"
                                                                    name="featured" {{ $products->featured == '1' ?
                                                                'checked' : '0' }}>
                                                                <span class="roundbutton"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row m-0 p-0">
                                        <div class="col-lg-12">
                                            <div class="row m-0 p-0">
                                                <div class="col-lg-4">
                                                    <div class="row m-0 p-0">
                                                        <div class="col-lg-6">
                                                            <label for="fname">Hot Deals
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="toggle">
                                                                <input type="checkbox" id="edit_hot_deals"
                                                                    name="hot_deals" {{ $products->special_offer ==
                                                                '1'
                                                                ? 'checked' : '0' }}>
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
                                    <div class="row m-0 p-0">
                                        <div class="col-lg-12">
                                            <div class="row m-0 p-0">
                                                <div class="col-lg-4">
                                                    <div class="row m-0 p-0">
                                                        <div class="col-lg-6">
                                                            <label for="fname">Special Offer
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="toggle">
                                                                <input type="checkbox" id="edit_special_offer"
                                                                    name="special_offer" {{ $products->special_offer
                                                                ==
                                                                '1'
                                                                ? 'checked' : '0' }}>
                                                                <span class="roundbutton"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row m-0 p-0">
                                        <div class="col-lg-12">
                                            <div class="row m-0 p-0">
                                                <div class="col-lg-4">
                                                    <div class="row m-0 p-0">
                                                        <div class="col-lg-6">
                                                            <label for="fname">Special Deal
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="toggle">
                                                                <input type="checkbox" id="edit_special_deals"
                                                                    name="special_deals" {{ $products->special_deals
                                                                ==
                                                                '1'
                                                                ? 'checked' : '0' }}>
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
                            <div class="row m-0 p-0">
                                <div class="col-lg-4">
                                    <div class="row m-0 p-0">
                                        <div class="col-lg-6">
                                            <label for="fname">Free Shipping </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="toggle">
                                                <input type="checkbox" id="edit_shipping" name="shipping" {{
                                                    $products->shipping == '1' ? 'checked' : '0' }}>
                                                <span class="roundbutton"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h3>Delivery Details</h3>
                            <div class="row m-0 p-0">
                                <div class="col-lg-4">
                                    <div class="row m-0 p-0">
                                        <div class="col-lg-6">
                                            <label for="fname">Cash On Delivery</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="toggle">
                                                <input type="checkbox" id="edit_cash_on_del" name="cash_on_delivery" {{
                                                    $products->cash_on_delivery == '1' ? 'checked' : '0' }}>
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
                                                <input type="checkbox" id="edit_refundable" name="refundable" {{
                                                    $products->refundable == '1' ? 'checked' : '0' }}>
                                                <span class="roundbutton"></span>
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
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
</form>
</div>
</div>
</div>
</div>
</form>
@endsection
@section('script')
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
{{-- thumnail image old --}}
<script type="text/javascript">
    function mainThamUrl(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
</script>
{{-- end --}}
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
                                    .height(60); //create image element
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
{{-- for thumbnail image --}}
{{-- <script>
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

</script> --}}
{{-- ---------------------------Show Multi Image JavaScript Code For Edit------------------------ --}}
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
@endsection
