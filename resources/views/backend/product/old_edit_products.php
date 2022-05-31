@extends('admin.admin_master')
@section('css')
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets') }}/images/favicon.ico">

    <!-- Plugins css -->
    <link href="{{ asset('backend/assets') }}/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/assets') }}/libs/mohithg-switchery/switchery.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('backend/assets') }}/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ asset('backend/assets') }}/css/config/default/app.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <!-- icons -->
    <link href="{{ asset('backend/assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/css/product.css">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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

    </style>
@endsection
@section('main-content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- form start -->
            <form action="{{ route('role.product_update', config('fortify.guard')) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $products->id }}">
                <input type="hidden" name="old_image1" value="{{ $products->product_gallery_image }}">
                <input type="hidden" name="old_image2" value="{{ $products->product_thambnail }}">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <p><strong>Opps Something went wrong</strong></p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="row">
                    <div class="col-xl-8 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label" name="tags">Product
                                        Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="product_name"
                                            value={{ $products->product_name }}>
                                        @error('product_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-7">
                                        <select id="product" class="category_id form-select form-control"
                                            name="category_id">
                                            <option value="" selected="" disabled="">Select Category Name
                                            </option>
                                            @foreach ($category as $categorys)
                                                <option value="{{ $categorys->id }}"
                                                    {{ $categorys->id == $products->category_id ? 'selected' : '' }}>
                                                    {{ $categorys->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label"> Sub Category</label>
                                    <div class="col-sm-7">
                                        <select id="product" class="category_id form-select form-control"
                                            name="subcategory_id">
                                            <option value="" selected="" disabled="">Select Sub Category Name
                                            </option>
                                            @foreach ($subcategory as $subcategorys)
                                                <option value="{{ $subcategorys->id }}"
                                                    {{ $subcategorys->id == $products->subcategory_id ? 'selected' : '' }}>
                                                    {{ $subcategorys->sub_category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label"> Sub Sub Category</label>
                                    <div class="col-sm-7">
                                        <select id="product" class="category_id form-select form-control"
                                            name="subsubcategory_id">
                                            <option value="" selected="" disabled="">Select Sub Sub Category Name
                                            </option>
                                            @foreach ($subsubcategory as $subsubcategorys)
                                                <option value="{{ $subsubcategorys->id }}"
                                                    {{ $subsubcategorys->id == $products->subsubcategory_id ? 'selected' : '' }}>
                                                    {{ $subsubcategorys->subsubcategory_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('subsubcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <input type="hidden" name="product_name" id="product_n"> --}}
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Brand</label>
                                    <div class="col-sm-7">
                                        <select name="brand_id" class="category_id form-select form-control">
                                            <option value="" selected="" disabled="">Select Brand Name
                                            </option>
                                            @foreach ($brands as $purchase_productt)
                                                <option value="{{ $purchase_productt->id }}"
                                                    {{ $purchase_productt->id == $products->brand_id ? 'selected' : '' }}>
                                                    {{ $purchase_productt->brand_name_cats_eye }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- check --}}
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label">Tags</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="selectize-close-btn form-control" name="product_tags"
                                            value={{ $products->product_tags }} />
                                        @error('product_tags')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Bar
                                        Code</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="barCode"
                                            value={{ $products->barCode }}>
                                    </div>
                                </div> --}}
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Refundable</label>
                                    <div class="col-sm-7">
                                        <label class="toggle">
                                            <input id="toggleswitch" type="checkbox" name="refundable"
                                                {{ $products->refundable == '1' ? 'checked' : '0' }}>
                                            <span class="roundbutton"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">
                                        Thumbnail Image<small style="color:#ced4da;"> (300*300)</small>
                                    </label>
                                    <div class="col-sm-7">
                                        <img src="{{ asset($products->product_thambnail) }}" class="card-img-top"
                                            style="height: 130px; width: 280px;">
                                        <input type="file" name="product_thambnail" class="form-control"
                                            onChange="mainThamUrl(this)">

                                        <p><small style="color:#ced4da;">Use 600*600 sizes images.Keep same blank
                                                images
                                                around main object of your image</small></p>
                                        <img src="" id="mainThmb">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Video Link</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="video_link"
                                            value={{ $products->video_link }}>
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label">Colors</label>
                                    <div class="col-sm-9">
                                        <select class="form-control chkddl select2" data-toggle="select2" data-width="100%"
                                            multiple="multiple" data-placeholder="Choose Color..." id="DDL"
                                            disabled="disabled" name="product_color"
                                            value={{ $products->product_color }}>
                                            <option>Red</option>
                                            <option>White</option>
                                            <option>Blue</option>
                                            <option>Yellow</option>
                                            <option>Green</option>
                                            <option>Black</option>
                                            <option>Purple</option>
                                            <option>Megenda</option>
                                            <option>Brown</option>
                                            <option>Blue Gray</option>
                                            <option>Mustard</option>
                                            <option>Violet</option>
                                            <option>Indigo</option>
                                        </select>

                                    </div>
                                    <div class="col-sm-1">
                                        <input class="form-check-input chkddl" type="checkbox" value=""
                                            id="flexCheckDefault" onclick="Enableddl(this)">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Check
                                        </label>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label">Product Size</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="selectize-close-btn form-control" name="product_tags"
                                            value={{ $products->product_size }} />
                                        @error('product_size')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- for unit --}}
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label">Product Unit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class=" form-control"
                                            placeholder="Please enter the quantity and unit (10 kg, 120grm, 5lb, ltr, 5pcs, each)"
                                            name="unit" value="{{ $products->unit }}" />
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label">Selling Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Selling Price"
                                            data-toggle="input-mask" data-mask-format="0000000000000" name="selling_price"
                                            value={{ $products->selling_price }} />
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label">Discount Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Discount Price"
                                            name="discount_price" value={{ $products->discount_price }}>

                                        @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Discount Start
                                        Date</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="basic-datepicker" class="form-control"
                                            placeholder="Discount start" name="start_date"
                                            value={{ $products->start_date }}>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Discount End
                                        Date</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="humanfd-datepicker" class="form-control"
                                            placeholder="Discount end" name="end_date" value={{ $products->end_date }}>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label">Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" placeholder="Quantity"
                                            name="product_qty" value={{ $products->product_qty }} />
                                        @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class=" form-control ckeditor"
                                            name="product_descp">{!! $products->product_descp !!}</textarea>
                                        @error('product_descp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Meta Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Meta Title"
                                            name="meta_title" value={{ $products->meta_title }}>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class=" form-control ckeditor" name="meta_desc"
                                            {!! $products->meta_desc !!}></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-->
                    <div class="col-xl-4 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Shipping Configuration</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3 switch">
                                    <label class="col-sm-6 col-form-label">Free Shipping</label>
                                    <div class="col-sm-6 switchery-demo">
                                        <label class="toggle">
                                            <input id="toggleswitch" type="checkbox" name="shipping"
                                                {{ $products->shipping == '1' ? 'checked' : '0' }}>
                                            <span class="roundbutton"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cash On Delivery</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3 switch">
                                    <label class="col-sm-6 col-form-label">Cash On Delivery Available</label>
                                    <div class="col-sm-6 switchery-demo">
                                        <label class="toggle">
                                            <input id="toggleswitch" type="checkbox" name="cash_on_delivery"
                                                {{ $products->cash_on_delivery == '1' ? 'checked' : '0' }}>
                                            <span class="roundbutton"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Deals</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3 switch">
                                    <label class="col-sm-6 col-form-label">Featured</label>
                                    <div class="col-sm-6 switchery-demo">

                                        <label class="toggle">
                                            <input id="toggleswitch" type="checkbox" name="featured"
                                                {{ $products->featured == '1' ? 'checked' : '0' }}>
                                            <span class="roundbutton"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-3 switch">
                                    <label class="col-sm-6 col-form-label">Hot Deals</label>
                                    <div class="col-sm-6 switchery-demo">

                                        <label class="toggle">
                                            <input id="toggleswitch" type="checkbox" name="hot_deals"
                                                {{ $products->hot_deals == '1' ? 'checked' : '0' }}>
                                            <span class="roundbutton"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-3 switch">
                                    <label class="col-sm-6 col-form-label">Special Offer</label>
                                    <div class="col-sm-6 switchery-demo">

                                        <label class="toggle">
                                            <input id="toggleswitch" type="checkbox" name="special_offer"
                                                {{ $products->special_offer == '1' ? 'checked' : '0' }}>
                                            <span class="roundbutton"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-3 switch">
                                    <label class="col-sm-6 col-form-label">Special Deals</label>
                                    <div class="col-sm-6 switchery-demo">

                                        <label class="toggle">
                                            <input id="toggleswitch" type="checkbox" name="special_deals"
                                                {{ $products->special_deals == '1' ? 'checked' : '0' }}>
                                            <span class="roundbutton"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Vat & Tax</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Vat %</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Vat"
                                            data-toggle="input-mask" data-mask-format="000" name="vat"
                                            value={{ $products->vat }} />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <input type="submit" class="btn btn-rounded btn-info mb-5 " value="Update Product">
            </form>
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

                                <div class="row row-sm">


                                    @foreach ($multiimgs as $img)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="{{ asset($img->photo_name) }}" class="card-img-top"
                                                    style="height: 130px; width: 280px;">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <a href="{{ route('role.product.multiimg.delete', [config('fortify.guard'), $img->id]) }}"
                                                            class="btn btn-sm btn-danger" id="#" title="Delete Data"><i
                                                                class="fa fa-trash"></i> </a>
                                                    </h5>
                                                    <p class="card-text">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Change Image <span
                                                                class="tx-danger">*</span></label>
                                                        <input class="form-control" type="file"
                                                            name="multi_img[{{ $img->id }}]">
                                                    </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div><!--  end col md 3 -->
                                    @endforeach

                                    <div class="mb-3 row">
                                        <div class="col-md-10">
                                            <div class="card">
                                                <div class="card-body">

                                                    <label class="col-sm-2 col-form-label">
                                                        <h3>Multi Image</h3><small style="color: #5a789b;">(600*600)</small>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <input type="file" name="multi_img[new][]" multiple="" id="MultiImg"
                                                            class="form-control">
                                                        <p><small style="color: #5a789b;">Use 600*600 sizes images</small>
                                                        </p>
                                                        <div class="row" id="preview_img"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" name="product_id" hidden value="{{ $products->id }}">
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                                </div>
                                <br>
                                <br>
                                {{-- @endif --}}
                            </form>
                        </div>
                    </div>
                </div> <!-- // end row  -->
            </section>

            <!-- ///////////////// End Multiple Image Update Area ///////// -->
            {{-- for check end --}}
            {{-- <input type="submit" class="btn btn-rounded btn-info mb-5 " value="Add Product">
            </form> --}}
            <!-- form end -->
        </div> <!-- container -->

    </div> <!-- content -->
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('meta_desc');
    </script>
    <script>
        CKEDITOR.replace('product_descp');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        var input = document.getElementById('toggleswitch');
        var outputtext = document.getElementById('status');

        input.addEventListener('change', function() {
            if (this.checked) {
                outputtext.innerHTML = "1";
            } else {
                outputtext.innerHTML = "0";
            }
        });
    </script>

    <script>
        function Enableddl(chkddl) {
            var ddl = document.getElementById("DDL");
            ddl.disabled = chkddl.checked ? false : true;
            if (!ddl.disabled) {
                ddl.focus();
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#product").on('change', function(e) {
                let purchase_id = this.value;
                console.log(purchase_id);
                const product_n = document.getElementById('product_n');
                const category_id = document.getElementById('category_id');
                const subcategory_id = document.getElementById('subcategory_id');
                const subsubcategory_id = document.getElementById('subsubcategory_id');
                const product_qty = document.getElementById('product_qty');

                axios.get(`/{{ config('fortify.guard') }}/product/purshase-list/${purchase_id}`)
                    .then(response => {
                        console.log(response);
                        product_n.value = response.data.purchase.new_product;
                        category_id.value = response.data.purchase.category_id;
                        subcategory_id.value = response.data.purchase.sub_category_id;
                        subsubcategory_id.value = response.data.purchase.sub_sub_category_id;
                        product_qty.value = response.data.purchase.product_qty;
                    })
                    .catch(error => {

                    })
            });
        });
    </script>

    {{-- // Img Tham script --}}

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
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
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

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Vendor js -->

    <script src="{{ asset('backend/assets') }}/js/vendor.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/devbridge-autocomplete/jquery.autocomplete.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

    <!-- Plugins js -->
    <script src="{{ asset('backend/assets') }}/libs/dropzone/min/dropzone.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/parsleyjs/parsley.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


    <!-- Init js-->
    <script src="{{ asset('backend/assets') }}/js/pages/form-fileuploads.init.js"></script>
    <script src="{{ asset('backend/assets') }}/js/pages/form-advanced.init.js"></script>
    <script src="{{ asset('backend/assets') }}/js/pages/form-masks.init.js"></script>
    <script src="{{ asset('backend/assets') }}/js/pages/form-pickers.init.js"></script>

    <!-- Validation init js-->
    {{-- <script src="{{ asset('backend/assets') }}/js/pages/form-validation.init.js"></script> --}}
    <!-- Quill js -->
    <script src="{{ asset('backend/assets') }}/libs/quill/quill.min.js"></script>
    <!-- Init js -->
    <script src="{{ asset('backend/assets') }}/js/pages/add-product.init.js"></script>

    <!-- App js -->
    {{-- <script src="{{ asset('backend/assets') }}/js/app.min.js"></script> --}}
    <script src="{{ asset('backend/assets') }}/js/product.js"></script>
    {{-- <script src="{{ asset('backend/assets') }}/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/select2/js/select2.min.js"></script> --}}
@endsection
