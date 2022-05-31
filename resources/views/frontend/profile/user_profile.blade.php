@extends('frontend.main_master')

@section('islamic')
@include('frontend.body.mobile_sidbar_menu')

<style>
    .select_address{
        cursor: pointer;
        margin-bottom: 5px;
    }
    .select_address:hover
    {
        background-color: transparent !important;
        transition: 0.3s ease-in-out;
    }
.jfss-ver-btn{
    z-index:999;
}
</style>

<div id="standard-modal" style="z-index: 84348394" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <form id="addAddress">
            <div class="modal-content">
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
                                <div class="card" style="height:150px ; width:400px; border:0px ; border-radius:20px;">
                                    <div class="card-body">
                                        <div id="gmaps-markers" class="gmaps">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9767668285313!2d90.40056561536268!3d23.748207894776133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b926c620f459%3A0xf0b4514991e507c8!2sExcel%20IT%20AI!5e0!3m2!1sen!2sbd!4v1648959967100!5m2!1sen!2sbd"
                                            width="430" height="150" style="border:0; border-radius:20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   <div class="btn">
                    <button type="submit"  class="saveBtn btn2 btn add_btn btn btn-warning"> SAVE ADDRESS </button>
                   </div>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<section class="profile main-content">
<section class="user-profile-section px-4 py-5">      
            <div class="row">
            <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data" >
                        @csrf
               <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="profile-header">
                     <h2>Your Profile </h2>
                  </div>
                  <!-- end profile-header  -->
                   <div class="profile-wrapper mb-4">
                        <div class="brise-input">
                        <input type="text" class="" name="name" id="Name" placeholder="" value="{{ $user->name }}">
                           <label>Name <b class="text-danger">*</b> </label>
                           <span class="line"></span>
                        </div>
                        <div class="brise-input">
                        <input type="text" class="" name="email" id="email" placeholder="" value="{{ $user->email }}">
                           <label>Email Address</label>
                           <span class="line"></span>
                          <a href="{{route('verification.notice')}}" class="btn jfss-ver-btn">Verify</a>
                        </div>
                        
                        <div class="brise-input">
                          <input type="text" class="" name="phone"name="phone"  id="phone" placeholder="" value="{{ $user->mobile }}" value="{{ $user->phone }}">
                           <label>Phone Number </label>
                           
                        </div>
                       
                        <div class="brise-input">
                             <h6 class="gen-hed">Select Gender <b class="text-danger">*</b> </h6>
                           <select class="form-select input-style" name="gender" aria-label="Default select example">
                              <option selected>{{ $user->gender }}</option>
                              <option value="Female">Female</option>
                              <option value="Male">Male</option>
                              <option value="Other">Other</option>
                           </select>
                       
                           <span class="line"></span>
                        </div>
                        <div class="brise-input">
                            <input type="file"  class="" name="profile_photo_path" id="profile_photo_path"  >
                            <label>Upload image <b class="text-danger"></b></label>
                           <span class="line"></span>
                        </div>
                        
                        <div class="brise-input">
                        <input type="date" name="date_of_birth"  value="{{ $user->date_of_birth }}">
                         <label>Date Of Birth  <b class="text-danger">*</b></label>
                        </div>
                    
                  </div>
                  <!-- end profile-wrapper  -->
                  <div class="profile-del-card-wrapper">
                     <div class="card">
                        <div class="card-header p-3">
                           <div class="card-top-innr">
                              <h4> <i class="fa-solid fa-location-dot"></i> Select a Deliver Address</h4>
                               
                           </div>
                           <!-- end card-top-innr  -->
                        </div>
                        <!-- end card-header  -->
                        <div class="card-body">
                           <div class="jfss-address-btn-innr">
                             
                            <button type="button" class="btn jfss-address-btn" data-bs-toggle="modal" data-bs-target="#standard-modal"> + Add Address </button>
                          
                           </div>
                           <!-- end jfss-address-btn  -->
                         <div id="address_container">


                           </div>
                           <!-- end location-del-wrap  -->
                        </div>
                        <!-- end card-body  -->
                     </div>
                     <!-- end card  -->
                  </div>
                  <!-- end profile-del-card-wrapper  -->
                    <br>
                  <button type="submit" class="btn btn-warning">Update Profile</button>
                
               </div>
            </form>
               <!-- end col  -->
            </div>      
          
            <!-- end row  -->
         </section>
         </section>

@endsection

@section('script')

    <script type="text/javascript">

        $(document).ready(function() {
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
        });

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
                url: '/checkout/info/all',
                success: function (response) {

                    //console.log(response);
                    $('#address_container').empty();

                    $.each( response, function( key, value ) {

                            s = `<div class="add_addres border border-1 ${value.status == 1 ?'border border-warning':''} row"  style="padding:5px;" >
                                <div class="p-1 d-flex  ${value.status == 1? 'col-12':'col-8'} justify-content-between select_address" data-address_id="${value.id}"  style="color:black;">
                                    <div>
                                        ${value.street_address} <br> <b>${value.district.name}</b>
                                    </div>

                                </div>
                                ${value.status == 1 ?'':`<a href="#" class="btn btn-outline-danger  btn-sm  delete_address ${value.status == 1 ? '':'col-4'}"  data-id="${value.id}"  style="margin-top: 4px;width: 66px; margin-bottom: 18px;" > Delete </a>`}
                            </div>`;
                        $('#address_container').append(s);
                    });
                },
            });
        }

        AddressInfo();


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


        $(document).on('click','.delete_address',function()
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
                    console.log(response);
                    AddressInfo();
                },
            });
        });


    </script>

@endsection
