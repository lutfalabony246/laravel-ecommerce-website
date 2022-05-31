




@extends('admin.admin_master')
@section('admin')




<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
    }
    
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 16px;
      width: 16px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    input:checked + .slider {
      background-color: #2196F3;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
    </style>



<div class="aiz-main-content">
    <div class="px-15px px-lg-25px">
        
<div class="row" style="margin:20px 20px" >
<div class="col-lg-6">
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">Google Login Credential</h5>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="" method="POST">
            <input type="hidden" name="_token" value="">  


            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_HOST">
                <div class="col-md-3">
                    <label class="col-from-label">Activation </label>
                </div>
                <div class="col-md-7">
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                      </label>                            
                    </div>
            </div>





            <div class="form-group row">
                <input type="hidden" name="types[]" value="">
                <div class="col-md-3">
                    <label class="col-from-label">Client ID</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="MAIL_HOST" value="" placeholder="Client ID">
                </div>
            </div>


            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_HOST">
                <div class="col-md-3">
                    <label class="col-from-label">Client Secret </label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="MAIL_HOST" value="" placeholder="Client Secret">
                </div>
            </div>


        </form>
    </div>
</div>
</div>


<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Facebook Login Credential</h5>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="" method="POST">
                <input type="hidden" name="_token" value="">  


                <div class="form-group row">
                    <input type="hidden" name="types[]" value="MAIL_HOST">
                    <div class="col-md-3">
                        <label class="col-from-label">Activation</label>
                    </div>
                    <div class="col-md-7">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                          </label>                            
                        </div>
                </div>



                <div class="form-group row">
                    <input type="hidden" name="types[]" value="MAIL_HOST">
                    <div class="col-md-3">
                        <label class="col-from-label">App ID</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="MAIL_HOST" placeholder="App ID">
                    </div>
                </div>


                <div class="form-group row">
                    <input type="hidden" name="types[]" value="MAIL_HOST">
                    <div class="col-md-3">
                        <label class="col-from-label">App Secret</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="MAIL_HOST" placeholder="App Secret">
                    </div>
                </div>


            </form>
        </div>
    </div>
    </div>
</div>


    <div class="container-full ">
        <section class="content ">
       <div class="row mb-19">
           <div class="col-md-6">
    
              <div class="box ">
                <div class="box-header with-border">
                  <h3 class="box-title">Twitter Login Credential</h3> <br><br>
                </div>
    
               
                <!-- /.box-header -->
                <div class="box-body">

                    <form class="form-horizontal" action="" method="POST">
                        <input type="hidden" name="_token" value="">  


                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="">
                            <div class="col-md-3">
                                <label class="col-from-label">Activation</label>
                            </div>
                            <div class="col-md-7">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                  </label>                            
                                </div>
                        </div>





                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_HOST">
                            <div class="col-md-3">
                                <label class="col-from-label">Client ID</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="MAIL_HOST" value="" placeholder="Client ID">
                            </div>
                        </div>


                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_HOST">
                            <div class="col-md-3">
                                <label class="col-from-label">Client Secret</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="MAIL_HOST" value="" placeholder="Client Secret">
                            </div>
                        </div>


                    </form>


                      
                    </div>  <!-- box body end -->
                 </div>      <!-- box end -->
            </div> <!-- col end -->
       </div> <!--  row end-->
       </section> <!--  content end-->
       </div> <!--  row end-->


</div>

    </div>
    
</div>
  
@endsection


