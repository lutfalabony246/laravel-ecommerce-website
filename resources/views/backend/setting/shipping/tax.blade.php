

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


<br>
<div class="aiz-main-content">
    <div class="px-15px px-lg-25px">
        
<div class="row" style="margin:10px 20px" >
<div class="col-lg-6">
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Taxes</h4>
    </div>
    <div class="card-body">
       

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                   <th>SI</th>
                   <th>Name</th>
                   <th>Status</th>
                   <th>Options</th>
                </tr>
            </thead>
            <tbody>            
               <tr>

                  <td style="color: #8a99b5;">1</td>
                  <td style="color: #8a99b5;">Tax</td>
                  <td style="color: #8a99b5;">
                
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                      </label> 
                
                </td>

                  <td>                 
                    <button class="btn btn-success btn-md rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-md rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                  </td>
                 
               </tr>
              
            </tbody>
          </table>
    </div>
</div>
</div>

<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Add New Tax</h5>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="" method="POST">
                <input type="hidden" name="_token" value="">                        

            <div class="form-group row">
                <input type="hidden" name="types[]" value="">
                <div class="col-md-3">
                    <label class="col-from-label">Name</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="MAIL_HOST" value="" placeholder="Name">
                </div>
            </div>

                     <div class="col-lg-3" style="margin-left: 600px" >
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>

            </form>
        </div>
    </div>
    </div>
</div>

</div>

    </div>
    
</div>

@endsection


