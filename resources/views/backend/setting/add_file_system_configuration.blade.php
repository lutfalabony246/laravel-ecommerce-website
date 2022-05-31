






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
    <h5 class="mb-0 h6">S3 File System Credentials</h5>
</div>
<div class="card-body">
    <form class="form-horizontal" action="" method="POST">
        <input type="hidden" name="_token" value="gf3zFR8lSS0WGfalPojeBoB2RCfN4WsKXPwpMk01">   

        <div id="smtp">
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_HOST">
                <div class="col-md-3">
                    <label class="col-from-label">AWS_ACCESS_KEY_ID
                    </label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="MAIL_HOST" value="smtp.gmail.com" placeholder="MAIL HOST">
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_PORT">
                <div class="col-md-3">
                    <label class="col-from-label">AWS_SECRET_ACCESS_KEY
                    </label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="MAIL_PORT" value="465" placeholder="MAIL PORT">
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_USERNAME">
                <div class="col-md-3">
                    <label class="col-from-label">AWS_DEFAULT_REGION
                    </label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="MAIL_USERNAME" value="admin@example.com" placeholder="MAIL USERNAME">
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                <div class="col-md-3">
                    <label class="col-from-label">AWS_BUCKET
                    </label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="MAIL_PASSWORD" value="123456" placeholder="MAIL PASSWORD">
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                <div class="col-md-3">
                    <label class="col-from-label">AWS_URL
                    </label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="ssl" placeholder="MAIL ENCRYPTION">
                </div>
            </div>
        </div>
       
        <div class="form-group mb-0" style="margin-left: 660px">
            <button type="submit" class="btn btn-md btn-primary">Save</button>
        </div>
    </form>
</div>

</div>
</div>

<div class="col-md-6 sk" style="margin-left:-15px">
<div class="card mt-20" style="margin-left:10px">
<div class="card-header">
    <h5 class="mb-0 h6">S3 File System Activation</h5>
</div>
<div class="card-body">
    <form action="" method="post">
        <input type="hidden" name="_token" value="gf3zFR8lSS0WGfalPojeBoB2RCfN4WsKXPwpMk01">                    
        
        <label class="switch">
            <input type="checkbox" checked>
            <span class="slider round"></span>
          </label>
          
    </form>
</div>
</div>


</div>
</div>
    </div>
    
</div>


@endsection
