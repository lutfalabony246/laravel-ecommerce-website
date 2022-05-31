





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


<div class="aiz-main-content za">
    <div class="px-15px px-lg-25px">
        <div class="row">
<div class="col-md-6">
<div class="card mt-30 ml-20">
<div class="card-header">
    <h5 class="mb-0 h6">Facebook Chat</h5>
</div>
<div class="card-body">
    <form class="form-horizontal" action="" method="POST">
       
        <input type="hidden" name="_token" value="">  


        <div class="form-group row">
            <input type="hidden" name="types[]" value="">
            <div class="col-md-3">
                <label class="col-from-label">Facebook Chat</label>
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
                <label class="col-from-label">Facebook Page ID</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="MAIL_HOST" value="" placeholder="Facebook Page ID">
            </div>
        </div>
   
        <div class="col-lg-3" style="margin-left: 650px" >
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>
</div>

</div>
</div>

<div class="col-md-6 sk" style="margin-left:-15px">
<div class="card bg-gray-light" style="margin: 30px 10px">
<div class="card-header">
    <h5 class="mb-0 h6">Please be carefull when you are configuring Facebook chat. 
        For incorrect configuration you will not get messenger icon on your user-end site.</h5>
</div>
<div class="card-body ">
    
    <br>
    <ul class="list-group mar-no">
        <li class="list-group-item text-white">Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver</li>
        <li class="list-group-item text-white">Set Mail Host according to your server Mail Client Manual Settings</li>
        <li class="list-group-item text-white">Set Mail port as 465</li>
        <li class="list-group-item text-white">Set Mail Encryption as ssl</li>
    </ul>
</div>
</div>

</div>
</div>
    </div>
    
</div>


<div class="aiz-main-content za">
    <div class="px-15px px-lg-25px">
        <div class="row">
<div class="col-md-6">
<div class="card mt-30 ml-20">
<div class="card-header">
    <h5 class="mb-0 h6">Facebook Pixel Setting</h5>
</div>
<div class="card-body">
    <form class="form-horizontal" action="" method="POST">
       
        <input type="hidden" name="_token" value="">  


        <div class="form-group row">
            <input type="hidden" name="types[]" value="">
            <div class="col-md-3">
                <label class="col-from-label">Facebook Pixel</label>
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
                <label class="col-from-label">Facebook Pixel ID</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="MAIL_HOST" value="" placeholder="Facebook Page ID">
            </div>
        </div>
   
        <div class="col-lg-3" style="margin-left: 650px" >
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>
</div>

</div>
</div>

<div class="col-md-6 sk" style="margin-left:-15px">

<div class="card bg-gray-light" style="margin: 30px 10px">
<div class="card-header">
    <h5 class="mb-0 h6">Please be carefull when you are configuring Facebook pixel.</h5>
</div>
<div class="card-body ">
    
    <br>

    <ul class="list-group mar-no">
        <li class="list-group-item text-white">Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver</li>
        <li class="list-group-item text-white">Set Mail Host according to your server Mail Client Manual Settings</li>
        <li class="list-group-item text-white">Set Mail port as 465</li>
        <li class="list-group-item text-white">Set Mail Encryption as ssl</li>
    </ul>
</div>
</div>

</div>
</div>
    </div>
    
</div>


<div class="aiz-main-content za">
    <div class="px-15px px-lg-25px">
        <div class="row">
<div class="col-md-6">
<div class="card mt-30 ml-20">
<div class="card-header">
    <h5 class="mb-0 h6">Google Analytics Setting</h5>
</div>
<div class="card-body">
    <form class="form-horizontal" action="" method="POST">
       
        <input type="hidden" name="_token" value="">  


        <div class="form-group row">
            <input type="hidden" name="types[]" value="">
            <div class="col-md-3">
                <label class="col-from-label">Google Analytics</label>
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
                <label class="col-from-label">Tracking ID</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="MAIL_HOST" value="" placeholder="Facebook Page ID">
            </div>
        </div>
   
        <div class="col-lg-3" style="margin-left: 650px" >
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>
</div>

</div>
</div>


</div>
    </div>

@endsection
