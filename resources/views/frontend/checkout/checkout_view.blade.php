@extends('frontend.main_master')

@section('islamic')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .bottom-border {
            border-bottom: 1px solid rgb(192, 188, 188);
        }

        .checkout-form-wrap .checkout-form-inner .checkout-product-inner-cont {
            border-bottom: none;
        }

        .deliver-add-wrapper {
            background: #FFFFFF;
            border: 1px solid #DEE2E6;
            box-sizing: border-box;
            border-radius: 5px;
            width: 100%
        }
        .deliver-add-wrapper .location_card {
            background: #F8F8F8;
            border-bottom: 1px solid #DEE2E6;
            box-sizing: border-box;
            border-radius: 5px;
            padding: 15px;
            font-family: 'Nunito';
            font-weight: 700;
            font-size: 16px;
            line-height: 22px;
            color: #4B4B4B;
        }
        .deliver-add-wrapper .add_addres {
            margin: 20px 30px;
        }
        .deliver-add-wrapper .add_addres button {
            width: 100%
        }

        .label_name {
            font-weight: bold  ;
            font-size: 14px;
        }
        .btn{

            padding-right: 6rem;
            padding-left: 5rem;

        }

        .btn button{
            text-align: center;
            color: #FFFFFF

        }

        .btn2 {
            background-color: #6ce65a;
        }

        /* new css start */

        .btn-container, .btn-container2 {
            margin-bottom: 20px;
            max-width: 175px;
        }
        .select-btn, .select-btn2{
            position: relative;
            background: none;
            border: none;
            outline: none;
            font-size: 16px;
            border: 2px solid #DEE2E6;
            padding: 12px;
            min-width: 157px;
            text-align: left;
            outline: none;
            cursor: pointer;
            z-index: 2;
        }
        .select-btn2{
            min-width: 215px;
        }
        .select-btn:after, .select-btn2::after {
            content: "\f107";
            font-family: FontAwesome;
            position: absolute;
            padding: 13px 0px;
            top: 0px;
            right: 0px;
            margin-top: 0px;
            color: #ababab;
            height: 100%;
            width: 30px;
            text-align: center;
        }
        .select-btn:hover, .select-btn2:hover{
            background-color: #fdd274;
        }
        .select-btn:hover:after, .select-btn2:hover:after{
            background-color: #e99f10;
            color: #fff;
            width: 30px;
        }
        .dropdown, .dropdown2 {
            position: relative;
        }
        .dropdown-options, .dropdown-options2 {
            list-style: none;
            margin: 0;
            padding: 0;
            background: #fff;
            box-shadow: 0 2px 4px #888888;
            display: inline-block;
            position: absolute;
            left: 0;
            bottom: -80px;
            display: none;
            transform: scale(0.8) translate3d(-20px, 0px, 0);
            transform-origin: 0 100%;
            z-index: 1;

        }
        .dropdown-options2{
            bottom: -243px;
        }
        .dropdown-options.open {
            display: block;
            transform: scale(1) translate3d(0, 0, 0);
            z-index: 5;
            display: inline-flex;
        }
        .dropdown-options2.open2{
            display: block;
            transform: scale(1) translate3d(0, 0, 0);
            z-index: 5;
            width: 300px;
        }
        .dropdown-options.open .option, .dropdown-options2.open2 .option2{
            width: 80px;
            height: 100%;
            text-align: center;
        }
        .dropdown-options2.open2 .option2{
            width: 150px;
        }
        .dropdown-options.open .option:hover, .dropdown-options2.open2 .option2:hover{
            background-color: #e99f10;
            color: #fff;
            /**/ 
        }
        .dropdown-options.open .option .link:active, .dropdown-options2.open2 .option2 .link2:active{
            color: #fff;
            background-color: ;
        }
        .dropdown-options li {
            display: inline-block;
        }
        .dropdown-options2 li{
            display: block;
        }
        .dropdown-options a, .dropdown-options2 a {
            text-decoration: none;
            display: inline-block;
            padding: 10px 7px;
            color: #000;
        }
        .dropdown-options2 a{
            display: flex;
            padding: 6px 7px;
        }
        .dropdown-options a:hover, .dropdown-options2 a:hover{
            color: #fff;
        }
        .dropdown-options a:active, .dropdown-options2 a:active{
            color: #4B4B4B;
            background-color: #ff686e;
        }
        .dropdown-options::after, .dropdown-options2::after{
            content: '';
            position: absolute;
            bottom: 100%;
            width: 0;
            height: 0;
            left: 40px;
            border-bottom: 5px solid #000;
            border-right: 5px solid transparent;
            border-left: 5px solid transparent;
        }
        .paymentoption-left{
            float: left;
        }
        .paymentoption-left h4{
            left: 0%;
            right: -9%;
            top: 0%;
            bottom: 75%;
            font-family: 'Nunito';
            font-style: normal;
            font-weight: 600;
            font-size: 23px;
            line-height: 34px;
            /* identical to box height */
            color: #6C757D;
            margin-top: 20px;

        }
        .paymentoption-left .form-check .form-check-label{
            left: 11%;
            right: 20%;
            top: 36%;
            bottom: 46%;
            font-family: 'Nunito';
            font-style: normal;
            font-weight: 400;
            font-size: 17px;
            line-height: 24px;
            /* identical to box height */
            color: #6C757D;
        }
        .btn-right{
            float: right;
            margin-top: 200px;
        }
        .btn-right .proceed{
            padding: 0;
            line-height: 50px;
            align-self: flex-start;
            margin-right: 5px;
            margin-bottom: 0px;
            margin-left: auto;
            width: 300px;
            background-color: #fc5f00c2;
            border: 0;
            border-radius: 0px;
        }
        .btn-right .proceed .text{
            float: left;
            height: 100%;
            width: 60%;
            text-align: center;
            padding-left: 30px;
        }
        .btn-right .proceed .price{
            background: #D66826;
            float: right;
            height: 100%;
            width: 40%;
            margin-right: -5px;
        }
        .btn-right a{
            color: #D66826;
            font-weight: 700;
        }
        .form-check-input:checked{
            background-color: #D66826;
            border-color: #D66826;
        }

        .select_address{
            cursor: pointer;
        }
        
        .this_btn{
                display: flex;
                justify-content: end;
        }



        .map_design{
            height:150px; 
            width:450px; 
            border:0px ; 
            border-radius:20px;
        }


        @media(max-width: 767px){
           .dropdown-options.open{
              display: inline-block;
              width: 167px;
           }
           .dropdown-options2.open2{
              width: 261px;
           }
           .dropdown-options{
              bottom: -196px;
           }
           .dropdown-options2{
              bottom: -243px;
           }
           .btn-container, .btn-container2{
              max-width: 232px;
           }
           .select-btn2{
              min-width: 183px;
           }
           .custext{
              display: inline;
           }
           .btn-right {
            float: right;
            margin-top: 18px;
        }
        .this_btn{
                display: flex;
                justify-content: start;
        }
        
        
        
          .btn-right .proceed{
            margin-left: 0px;
        }

        #change_address{
           
              margin:auto;
        }
        
        
        .btn {
            padding-right: 3rem;
            padding-left: 2rem;
        }
        
          .map_design{
          
            width:265px; 
         
        }

        }






    </style>

    <main class="main-body">
        @include('frontend.body.mobile_sidbar_menu')
        
                <!-- Modal -->
                <div class="modal fade"  style="z-index: 84348394" id="standard-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">

                    <div class="modal-content">
                        <form id="addAddress">
                        <div class="modal-header">
                            <h4 class="modal-title" id="standard-modalLabel">New Address</h4>
                            <button type="button" class="btn-close" id="modal_close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pt-0.5" style="">
                            <div class="checkout-form-inner">
                                   
                                <div class="row form-row ">
                                    <div class="col-sm-12 mt-0 ">
                                        <label class="label_name" for="">Street Address <b class="text-danger">*</b></label>
                                        <div>
                                            <textarea name="street_address" class="form-control" cols="10" rows="2" ></textarea>
                                        </div>
                                        <small style="color:#BD6310">76 New Gulbadan Super Mrket, 5 Moulvi Bazar, Dhaka</small><br>
                                        <small id="street_address" style="color:red"></small>
                                    </div>

                                    <div class="col-sm-12 mt-1" class="option_select" id="option_district_id">
                                        <label class="label_name" for="">District Select  <b class="text-danger">*</b> </label>
                                        <select name="district_id" id="cdistrict_id" class="form-control">
                                            <option value="" selected disabled>SELECT</option>
                                            @foreach ($district as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <small id="new_district_id" style="color:red"></small>
                                    </div>

                                    <div class="col-sm-12 col-md-12 mt-1">
                                        <label class="label_name" for=""> Area/Thana  <b class="text-danger">*</b> </label>
                                            <select name="thana_id" id="cstate_id" class="form-control" id="">
                                                <option value="" selected disabled>SELECT</option>

                                            </select>
                                            <small id="thana_id" style="color:red"></small>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <label class="label_name" for="">Floor No</label>
                                        <input type="text" class="form-control" name="floor_no"
                                            value="" placeholder="e.g 1,2">
                                            {{--  <small style="padding-bottom:10px;" >e.g "1", "2"</small>  --}}
                                    </div>
                                    <!-- end col  -->

                                    <div class="col-lg-6 col-md-12">
                                        <label class="label_name" for="">Apartment NO</label>
                                        <input type="text" name="appartment_no" class="form-control"
                                            value="" placeholder="example#2-A,3-B">
                                    </div>
                                    <!-- end col  -->

                                    <div class="col-lg-12 col-md-12 ">
                                        <label class="label_name" for="">Name  <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ Auth::user()->name }}" >
                                            <small id="name" style="color:red"></small>
                                    </div>
                                    <!-- end col  -->

                                    <div class="col-lg-12 col-md-12 ">
                                            <label for="validationCustomUsername" class="label_name">Phone Number  <b class="text-danger">*</b></label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text mb-2 bg-light" id="inputGroupPrepend">+88</span>
                                                <input   value="{{ Auth::user()->mobile }}" type="text" name="phone_no" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="e.g 01611815656">
                                                <div class="invalid-feedback">
                                                Please Enter Your Phone Number.
                                                </div>
                                            </div>
                                            <small id="phone_no" style="color:red"></small>
                                    </div>
                                    <!-- end col  -->

                                    <div class="col-md-12">
                                        <div class="card map_design">
                                            <div class="card-body">
                                                <div id="gmaps-markers" class="gmaps">
                                                    <iframe class="map_design" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9767668285313!2d90.40056561536268!3d23.748207894776133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b926c620f459%3A0xf0b4514991e507c8!2sExcel%20IT%20AI!5e0!3m2!1sen!2sbd!4v1648959967100!5m2!1sen!2sbd"
                                                     height="150" style="border:0; border-radius:20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                </div>
                                            </div>
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                           <div class="btn">
                            <button type="submit"  class="saveBtn btn2 btn add_btn" style="background-color:#fc5f00c2"> SAVE ADDRESS </button>
                           </div>
                        </div>
                        
                        </form>
                    </div><!-- /.modal-content -->
                  </div>
                </div>
        

        {{--  main-content start from here  --}}
        <section class="main-content" id="main-content">
            <div class="container profile mt-3 px-0" style="margin-left: 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 px-2">
                    <div class="checkout-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout-form-wrap">
                                     <div class="deliver-add-wrapper addForm">
                                        <div class="location_card">
                                            <h4><i class="fa-solid fa-location-dot pe-2"></i> Select a Deliver Address</h4>
                                        </div>

                                        <div class="add_addres d-none" id="add_addres">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#standard-modal"> + Add Address </button>
                                        </div>
                                        <form action="{{ route('checkout.process') }}" method="POST">
                                            @csrf
                                            <div id="newAddress">

                                            </div>
                                            {{--  new add  --}}
                                            <input type="hidden" id="deliveryDate" name="deliveryDate">
                                            <input type="hidden" id="deliveryTime" name="deliveryTime">
                                            <div class="deliver-add-wrapper mt-3" >
                                                <div class="location_card">
                                                    <h4><i class="fa-solid fa-clock pe-2"></i> Preferred Delivery Time</h4>
                                                </div>
                                                <div class="row d-flex justify-content-center m-5">
                                                <p style="display: flex; justify-content: center;"><i class="fas fa-shipping-fast" style="margin: 2px 13px;"></i>When would you like your <b> &nbsp; Express Delivery</b></p>
                                                <!-- first custom selector -->
                                                <div class="btn-container dropdown">
                                                    <button class="select-btn">Select</button>
                                                    <ul name="preferred_date" class="dropdown-options">
                                                        @foreach ($dates as $date)
                                                            @if($loop->first)
                                                                <li class="option">
                                                                    <a class="link DateField" href="#">Today <br> {{ \Carbon\Carbon::createFromFormat('m/d/Y', $date)->format('F d') }}</a>
                                                                </li>
                                                            @elseif($loop->iteration  == 2)
                                                                <li class="option">
                                                                    <a class="link DateField" href="#" >Tomorrow <br> {{ \Carbon\Carbon::createFromFormat('m/d/Y', $date)->format('F d') }} </a>
                                                                </li>
                                                            @else
                                                                <li class="option">
                                                                    <a class="link DateField" href="#" >{{ \Carbon\Carbon::createFromFormat('m/d/Y', $date)->format('l') }} <br> {{ \Carbon\Carbon::createFromFormat('m/d/Y', $date)->format('F d') }}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    @error('deliveryDate')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {{--  <a href="#"  class="btn DateField">fasdfasfsad</a>  --}}
                                                <!-- second custom selector -->
                                                <div class="btn-container2 dropdown2">
                                                    <button class="select-btn2">Select</button>
                                                    <ul name="preferred_time" class="dropdown-options2">
                                                        <div class="col-6 left" id="timeConatainer" style="float: left; border-right: 1px solid #DEE2E6;">
                                                            <li class="option2">
                                                                <a class="link2" href="#">8:00 AM - 9:00 AM</a>
                                                            </li>
                                                            <li class="option2">
                                                                <a class="link2" href="#">9:00 AM - 10:00 AM</a>
                                                            </li>
                                                            <li class="option2">
                                                                <a class="link2" href="#">10:00 AM - 11:00 AM</a>
                                                            </li>
                                                            <li class="option2">
                                                                <a class="link2" href="#">11:00 AM - 12:00 PM</a>
                                                            </li>
                                                            <li class="option2">
                                                                <a class="link2" href="#">12:00 PM - 1:00 PM</a>
                                                            </li>
                                                            <li class="option2">
                                                                <a class="link2" href="#">2:00 PM - 3:00 PM</a>
                                                            </li>
                                                            <li class="option2">
                                                                <a class="link2" href="#">3:00 PM - 4:00 PM</a>
                                                            </li>
                                                        </div>
                                                        <div class="col-6 right" style="float: right;">
                                                            <li class="option2">
                                                                <a class="link2" href="#">4:00 PM - 5:00 PM</a>
                                                            </li>
                                                            <li class="option2">
                                                                <a class="link2" href="#">5:00 PM - 6:00 PM</a>
                                                            </li>
                                                            <li class="option2">
                                                                <a class="link2" href="#">6:00 PM - 7:00 PM</a>
                                                            </li>
                                                            <li class="option2">
                                                                <a class="link2" href="#">7:00 PM - 8:00 PM</a>
                                                            </li>
                                                            <li class="option2">
                                                                <a class="link2" href="#">8:00 PM - 9:00 PM</a>
                                                            </li>
                                                            <li class="option2">
                                                                <a class="link2" href="#">9:00 PM - 10:00 PM</a>
                                                            </li>
                                                            <li class="option2">
                                                                <a class="link2" href="#">10:00 PM - 11:00 PM</a>
                                                            </li>
                                                        </div>
                                                    </ul>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="paymentoption-left">
                                                <h4>Payment Method</h4>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="radio" name="payment_method" value="cash" id="flexRadioDefault1" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Cash on Delivery
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment_method" value="card" id="flexRadioDefault2" >
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Bank / Card
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment_method" value="stripe" id="flexRadioDefault2" >
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Mobile Banking
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="btn-right" >
                                                <p class="this_btn" >৳ <span>0.00</span>Delivery charge included</p>
                                                <button type="submit" class="btn btn-primary btn-lg d-flex proceed">
                                                    <div class="text">Proceed</div><div class="price">৳ {{ $total_amount }}</div>
                                                </button>
                                                <p class="mt-2">By clicking/tapping proceed, I agree to BPP SHOPS Ecommerce <a href="{{ route('info.terms')}}">Terms of Services</a></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end checkout-form-wrap  -->
                            </div>
                            <!-- end col  -->
                            <!-- end checkout-product-info  -->
                        </div>
                        <!-- end checkout-form-inner  -->
                    </div>
                    <!-- end checkout-form-wrap  -->
                </div>
                <!-- end col  -->
            </div>
            <!-- end row  -->
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('select[name="cdivision_id"]').on('change', function() {
                    var division_id = $(this).val();
                    $c = $('select[id="cstate_id"]').empty();
                    $d = $('select[name="cdistrict_id"]').empty();
                    if (division_id) {
                        $.ajax({
                            url: "{{ url('/district/ajax') }}"+'/' + division_id,
                            type: "GET",
                            success: function(data) {
                                console.log('hrere');
                                $c = $('select[name="cstate_id"]').empty();
                                $d = $('select[name="cdistrict_id"]').empty();
                                console.log(data);
                                //
                                $.each(data, function(key, value) {
                                    let liItem = document.createElement('li');
                                    liItem.setAttribute('data-value', value.id);
                                    liItem.classList.add('option');
                                    liItem.innerHTML = value.district_name;
                                    // list.append(liItem);
                                    $('select[name="cdistrict_id"]').append(
                                        '<option value="' + value.id + '">' + value
                                        .name + '</option>');
                                });
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                        });
                    } else {
                        alert('danger');
                    }
                });
                $('select[name="cdistrict_id"]').on('change', function() {
                    var district_id = $(this).val();
                    $c = $('select[name="cstate_id"]').empty();
                    if (district_id) {
                        $.ajax({
                            url: "{{ url('/state/ajax') }}"+'/' + district_id,
                            type: "GET",
                            success: function(data) {
                                console.log(data);
                                var d = $('select[name="cstate_id"]').empty();
                                $.each(data, function(key, value) {
                                    let liItem = document.createElement('li');
                                    liItem.setAttribute('data-value', value.id);
                                    liItem.classList.add('option');
                                    liItem.innerHTML = value.name;
                                    // list.append(liItem);
                                    $('select[name="cstate_id"]').append('<option value="' +
                                        value.id + '">' + value.name + '</option>'
                                    );
                                });
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                        });
                    } else {
                        alert('danger');
                    }
                });
            });
        </script>


        <script>
            $(document).ready(function(){
                console.log("okk");
                $('#addAddress').on('submit', function (e) {
                    e.preventDefault();
                    $.ajax({
                      type: 'post',
                      url: '/checkout/store',
                      data: $('#addAddress').serialize(),
                      success: function (response) {
                        if (response.status == 400) {
                            $('#street_address').text(response.errors.street_address);
                            $('#new_district_id').text(response.errors.district_id);
                            $('#thana_id').text(response.errors.thana_id);
                            $('#name').text(response.errors.name);
                            $('#phone_no').text(response.errors.phone_no);

                        } else if (response.status == 200) {

                            toastr.success(response.message);
                            console.log(response.message);
                            $('#standard-modal').trigger("click");
                            AddressInfo();

                        }
                      }
                    });

                  });
            });


            function AddressInfo(){
                $.ajax({
                    type: 'get',
                    url: '/checkout/info',
                    success: function (response) {
                        console.log(response);
                        if (!$.trim(response)){
                            $('#add_addres').removeClass('d-none');
                        }
                        else{

                            $('#newAddress').empty();

                            $('#add_addres').addClass('d-none');


                            s = `<div class="add_addres border border-1 border-success">
                                    <div class="p-1 d-flex justify-content-between"  style="color:black;margin-left: 20px">
                                        <div>
                                            ${response.street_address} <br> <b >${response.district.name}</b>
                                        </div>
                                        <a href="#" class="btn btn-outline-danger btn-sm" id="change_address" style="padding-top: 10px;
                                        padding-right: 1.5rem; padding-left: 1rem" > Change </a>
                                    </div>
                                </div>`;
                            $('#newAddress').append(s);
                        }
                    },
                });
            }

            AddressInfo();

            //fetch all address function

            $(document).on('click','#change_address',function()
            {

                $.ajax({
                    type: 'get',
                    url: '/checkout/info/all',
                    success: function (response) {

                        //console.log(response);
                        $('#newAddress').empty();
                        $('#add_addres').removeClass('d-none');

                        $.each( response, function( key, value ) {

                            s = `<div class="add_addres border border-1 ${value.status == 1 ?'border-success':''} select_address"  data-address_id="${value.id}">
                                    <div class="p-1 d-flex justify-content-between"  style="color:black;margin-left: 20px">
                                        <div>
                                            ${value.street_address} <br> <b >${value.district.name}</b>
                                        </div>
                                        ${value.status == 1 ?'':`<a href="#" class="btn btn-outline-danger btn-sm delete_address"   id="delete_address" data-id="${value.id}" style="padding-top: 10px; padding-right: 1.5rem; padding-left: 1rem"> Delete </a>`}

                                    </div>
                                </div>`;
                            $('#newAddress').append(s);
                        });
                    },
                });
            });

            //select address



            $(document).on('click','.select_address',function()
            {
                $id = $(this).data('address_id');
                console.log($id,'from select gdfgdsfg gdsfg');
                $.ajax({
                    type: 'get',
                    url: '/checkout/info/select/check/'+$id,
                    success: function (response) {
                        AddressInfo();
                    },
                });
            });


            //delete address function
            $(document).on('click','#delete_address',function()
            {
                var button = $(this);
                var id = $(this).data(id);
                console.log(id,'delete');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/checkout/info/delete',
                    data:{
                         'id':id,
                    },
                    success: function (response) {
                       $(button).closest('.add_addres').remove();
                    },
                });
            });


            $('select[id="cdistrict_id"]').on('change', function() {
                var district_id = $(this).val();
                $c = $('select[id="cstate_id"]').empty();
                if (district_id) {
                    $.ajax({
                        url: "{{ url('/state/ajax') }}"+'/' + district_id,
                        type: "GET",
                        success: function(data) {
                            console.log(data);
                            var d = $('select[id="cstate_id"]').empty();
                            $.each(data, function(key, value) {
                                let liItem = document.createElement('li');
                                liItem.setAttribute('data-value', value.id);
                                liItem.classList.add('option');
                                liItem.innerHTML = value.name;
                                // list.append(liItem);
                                $('select[id="cstate_id"]').append('<option value="' +
                                    value.id + '">' + value.postOffice + '</option>'
                                );
                            });
                        },
                        error:function(e)
                        {
                            console.log(e);
                        }
                    });
                } else {
                    alert('danger');
                }
            });


            function checkoutDate(date){
                $("#deliveryDate").val(date);
            }
            function checkoutTime(time){
                $("#deliveryTime").val(time);
            }


        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#change').click(function()
                {
                    $(".deliveryForm").removeClass("d-none");
                    $(".addForm").addClass("d-none");
                });
            });
        </script>

        <script>
            // day button js
           (function(){
            var btn = document.querySelector(".select-btn");
            var dropdown = document.querySelector(".dropdown-options");
            var optionLinks = document.querySelectorAll(".link");
            console.log(optionLinks);

            btn.addEventListener("click", function(e) {
               e.preventDefault();
               dropdown.classList.toggle("open");
            });

            var clickFn = function(e) {
               e.preventDefault();
               dropdown.classList.remove("open");
               btn.innerHTML = this.text;
               checkoutDate(btn.innerText);
               var activeLink = document.querySelector(".option .active")
               if (activeLink) {
                  activeLink.classList.remove("active");
               }
               this.classList.add("active");
            }
            for (var i = 0; i < optionLinks.length; i++) {
               optionLinks[i].addEventListener("mousedown", clickFn, false);
            }
           })();

            //  time button js
           (function(){
            var btn = document.querySelector(".select-btn2");
            var dropdown = document.querySelector(".dropdown-options2");
            var optionLinks = document.querySelectorAll(".link2");
            console.log(optionLinks);
            btn.addEventListener("click", function(e) {
               e.preventDefault();
               // console.log("btn2");
               dropdown.classList.toggle("open2");
            });

            var clickFn = function(e) {
               e.preventDefault();
               dropdown.classList.remove("open2");
               btn.innerHTML = this.text;
               checkoutTime(btn.innerText);

               var activeLink = document.querySelector(".option2 .active")
               if (activeLink) {
                  activeLink.classList.remove("active");
               }
               this.classList.add("active");
            }
            for (var i = 0; i < optionLinks.length; i++) {
               optionLinks[i].addEventListener("mousedown", clickFn, false);
            }
           })();


        </script>

    @endsection



