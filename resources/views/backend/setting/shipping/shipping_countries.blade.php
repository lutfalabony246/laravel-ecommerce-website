{{-- <table class="table table-striped table-bordered" cellspacing="0" width="100%"> --}}

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

    .top_right{

        margin-left: 900px;
        display:flex;
    }

    </style>
  


<div class="container-full ">
    <section class="content ">
        

   <div class="row mb-19">
       <div class="col-md-12">

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Shipping Countries</h3> 


              <div class="top_right" >

                <div class="col-md-4">
                    <input type="text" class="form-control" id="sort_country" name="sort_country" placeholder="Type country name">
                </div>
            
                <div class="col-md-1">
                    <button class="btn btn-primary" type="submit">Filter</button>
                </div>
            
            </div>
            </div>


           
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                           <th>SI</th>
                           <th>Name</th>
                           <th>Code</th>
                           <th>Show/Hide</th>
                           <th>Action</th>
                          
                        </tr>
                    </thead>
                    <tbody>

                      
                       <tr>

                          <td style="color: #8a99b5;">English</td>
                          <td style="color: #8a99b5;">en</td>
                          <td style="color: #8a99b5;">W</td>
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

                       <tr>

                        <td style="color: #8a99b5;">Bangla</td>
                        <td style="color: #8a99b5;">bn</td>
                        <td style="color: #8a99b5;">R</td>
                        <td>
                            
                            
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
                  </div> <!-- table res.. end -->
                </div>  <!-- box body end -->
             </div>      <!-- box end -->
        </div> <!-- col end -->
   </div> <!--  row end-->
   </section> <!--  content end-->
   </div> <!--  row end-->



  @endsection
